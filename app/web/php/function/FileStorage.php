<?php

enum FSResourceResult: int {
    case InvalidSize = 0;           // File size is too big
    case InvalidExt = 1;            // File size is too big
    case InvalidUploadFile = 2;     // Error from move_uploaded_file(...)
    case Valid = 3;
}

class FileStorage {
    public const PREVIEW_UPLOAD_DIR = "/files/images/";
    public const RESOURCE_UPLOAD_DIR = "../../../../files/resources/";
    public const PREVIEW_EXT_REGEX = "/(.png|.jpg|.webp)$/";
    public const RESOURCE_EXT_REGEX = "/(.pdf|.txt)$/";
    private const RESOURCE_PREFIX = "resource_";
    private const RESOURCE_MAX_SIZE = 10485760; // B === 10MB


    public static function resource_get_meta() {
    }

    // @return: resource path | error
    public static function resource_add(string $path, string $ext_regex, string $name, string $tmp_name, int $size): string|FSResourceResult {
        // Max size constraint
        if ($size > self::RESOURCE_MAX_SIZE) {
            return FSResourceResult::InvalidSize;
        }

        // Extension constraint
        if (!preg_match($ext_regex, $name)) {
            return FSResourceResult::InvalidExt;
        }

        // Get unique filename
        do {
            $target = $path . self::generate_unique_name() . "." .pathinfo($name, PATHINFO_EXTENSION);
        } while (file_exists($target));
        
        // Save the file
        if (move_uploaded_file($tmp_name, $target)) {
            return $target;
        }
        return FSResourceResult::InvalidUploadFile;
    }

    public static function resource_del() {
    }

    public static function resource_get() {
    }

    public static function resource_search() {
    }

    private static function generate_unique_name(): string {
        return uniqid(self::RESOURCE_PREFIX);
    }
}


?>
