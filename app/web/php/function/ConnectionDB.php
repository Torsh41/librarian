<?php

// TODO: Переделать переменную с паролем и пользователем
// TODO: Минимальная длина пароля
// TODO: Верификация EMail

// declare(strict_types=1);

enum DBUserResult: int {
    case InvalidEmailRegex = 0;         // Email contains illegal characters
    case InvalidEmailDatabase = 1;      // Email already exists in the database
    case InvalidEmailNonExistant = 2;   // Email does not exist in real world
    case InvalidUsernameRegex = 3;      // Username contains illegal characters
    case InvalidUsernameDatabase = 4;   // Username already exists in the database
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
@^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")\@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$@i
EOT; // @note: the '@' char in the middle of regex is escaped
    


    public function __construct() {
        parent::__construct(
            "mysql:dbname=" . self::DB_NAME . ";host=" . self::DB_HOST,
            self::DB_USER,
            self::DB_PASSWORD,
        );
    }

    // @return null - No user with such email
    //          true - Success; Password matches
    //          false - Failure; Password does not match
    public function user_verify_password(string $email, #[\SensitiveParameter] string $password): bool|null {
        $stmt = $this->prepare("SELECT password_hash FROM " . self::DB_TABLE_USERS . " WHERE email = ?;");
        $stmt->execute([$email]);
        $stmt->bindColumn("password_hash", $hash);
        if (!$stmt->fetch(PDO::FETCH_BOUND)) {
            return null;
        }
        return password_verify($password, $hash);
    }

    // @return DBUserResult enum values. They are self explanatory.
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
        // Check illegal characters
        if (!preg_match(self::USERNAME_REGEX, $username)) {
            return DBUserResult::InvalidUsernameRegex;
        }

        // Check unique username
        $stmt = $this->prepare("SELECT * FROM " . self::DB_TABLE_USERS . " WHERE username = ?;");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            return DBUserResult::InvalidUsernameDatabase;
        }

        return DBUserResult::Valid;
    }

    private function user_validate_email(string $email): DBUserResult {
        // Check illegal characters
        if (!preg_match(self::EMAIL_REGEX, $email)) {
            return DBUserResult::InvalidEmailRegex;
        }

        // Check unique email
        $stmt = $this->prepare("SELECT * FROM " . self::DB_TABLE_USERS . " WHERE email = ?;");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return DBUserResult::InvalidEmailDatabase;
        }

        // TODO: verify email exists

        return DBUserResult::Valid;
    }

};


function example() {
    echo "Creating a connection\n";
    $db = new ConnectionDB();

    echo "Test1:\n";
    if (true) {
        // Insert new user
        $res = $db->user_insert("n0iick", "s0ome@email.com", "and_a_password");
        echo $res->name;
    }

    echo "Test2:\n";
    if (false) {
        // Verify user password
        $res = $db->user_verify_password("s0ome@email.com", "and_a_password");
        echo $res;
    }

}

// example();

?>
