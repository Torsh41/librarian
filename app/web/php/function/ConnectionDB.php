<?php

enum DBUserResult: int {
    case InvalidEmailRegex = 0;
    case InvalidEmailDatabase = 1;
    case InvalidEmailNonExistant = 2;
    case InvalidUsernameRegex = 3;
    case InvalidUsernameDatabase = 4;
    case Valid = 5;
}

class ConnectionDB extends PDO {
    private const DB_NAME = "dev_database";
    private const DB_USER = "dev_user";
    private const DB_PASSWORD = "dev_password";
    private const DB_HOST = "librarian-db";
    private const DB_PORT = 3306;

    private const DB_TABLE_USERS = "users";
    private const DB_TABLE_RESOURCES = "resources";
    private const DB_TABLE_REQUESTS = "requests";
    private const DB_TABLE_TAGS = "tags";
    private const DB_TABLE_STATUS = "status";
    private const DB_TABLE_ROLES = "roles";
    private const DB_TABLE_RESOURCE_TYPES = "resource_types";

    private const USERNAME_REGEX = "/^[A-Za-z0-9_]+$/";
    private const EMAIL_REGEX = <<<EOT
@^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")\@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$@i
EOT;

    public function __construct() {
        parent::__construct(
            "mysql:dbname=" . self::DB_NAME . ";host=" . self::DB_HOST,
            self::DB_USER,
            self::DB_PASSWORD
        );
    }
    public function getAllCategories() {
        $stmt = $this->query("SELECT * FROM tags");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTypes() {
        $stmt = $this->query("SELECT * FROM resource_types");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getResources($query, $filters, $sort, $order) {
        $sql = "SELECT 
                    r.resources_ID, 
                    r.title, 
                    r.author, 
                    r.publication_name, 
                    r.publisher, 
                    r.pages, 
                    r.description, 
                    r.tags, 
                    r.rating, 
                    r.file_path, 
                    r.icon_path, 
                    rt.type_name 
                FROM " . self::DB_TABLE_RESOURCES . " r
                JOIN " . self::DB_TABLE_RESOURCE_TYPES . " rt ON r.resource_type_ID = rt.type_ID";

        $conditions = [];
        $params = [];

        if (!empty($query)) {
            $conditions[] = "(r.title LIKE ? OR r.author LIKE ? OR r.description LIKE ?)";
            $params[] = "%$query%";
            $params[] = "%$query%";
            $params[] = "%$query%";
        }

        if (!empty($filters) && is_array($filters['category'])) {
            $filterConditions = [];
            if (!empty($filters['category'])) {
                $placeholders = implode(',', array_fill(0, count($filters['category']), '?'));
                $filterConditions[] = "r.tags IN ($placeholders)";
                $params = array_merge($params, $filters['category']);
            }
            if (!empty($filters['type'])) {
                $filterConditions[] = "rt.type_name = ?";
                $params[] = $filters['type'];
            }
            if ($filterConditions) {
                $conditions[] = implode(" AND ", $filterConditions);
            }
        }



        if ($conditions) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        if (!empty($sort)) {
            $sql .= " ORDER BY $sort";
            if (!empty($order)) {
                $sql .= " $order";
            }
        }

        $stmt = $this->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRandomBooks($limit = 8) {
        $sql = "SELECT * FROM " . self::DB_TABLE_RESOURCES . " ORDER BY RAND() LIMIT ?";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatestBooks($limit = 8) {
        $sql = "SELECT * FROM " . self::DB_TABLE_RESOURCES . " ORDER BY resources_ID DESC LIMIT ?";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRandomCategories($limit = 8) {
        $sql = "SELECT * FROM " . self::DB_TABLE_TAGS . " ORDER BY RAND() LIMIT ?";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function user_verify_password(string $email, #[\SensitiveParameter] string $password): int|false|null {
        $stmt = $this->prepare("SELECT user_ID, password_hash FROM " . self::DB_TABLE_USERS . " WHERE email = ?;");
        $stmt->execute([$email]);
        $stmt->bindColumn("user_ID", $id);
        $stmt->bindColumn("password_hash", $hash);
        if (!$stmt->fetch(PDO::FETCH_BOUND)) {
            return null;
        }

        if (!password_verify($password, $hash)) {
            return false;
        }

        return $id;
    }

    public function user_insert(string $username, string $email, #[\SensitiveParameter] string $password): DBUserResult {
        $res = $this->user_validate_username($username);
        if ($res != DBUserResult::Valid) {
            return $res;
        }

        $res = $this->user_validate_email($email);
        if ($res != DBUserResult::Valid) {
            return $res;
        }

        $hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->prepare("INSERT INTO " . self::DB_TABLE_USERS . " (username, password_hash, email) VALUES(?, ?, ?);");
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->bindParam(2, $hash, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->execute();

        return DBUserResult::Valid;
    }

    private function user_validate_username(string $username): DBUserResult {
        if (!preg_match(self::USERNAME_REGEX, $username)) {
            return DBUserResult::InvalidUsernameRegex;
        }

        $stmt = $this->prepare("SELECT * FROM " . self::DB_TABLE_USERS . " WHERE username = ?;");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            return DBUserResult::InvalidUsernameDatabase;
        }

        return DBUserResult::Valid;
    }

    private function user_validate_email(string $email): DBUserResult {
        if (!preg_match(self::EMAIL_REGEX, $email)) {
            return DBUserResult::InvalidEmailRegex;
        }

        $stmt = $this->prepare("SELECT * FROM " . self::DB_TABLE_USERS . " WHERE email = ?;");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return DBUserResult::InvalidEmailDatabase;
        }

        return DBUserResult::Valid;
    }
};

?>
