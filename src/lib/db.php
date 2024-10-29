<?php

class DB {

    private static $_instance = null;
    private $connection;

    public function __construct() {

        try {
            $parse_env = parse_ini_file('.env');

            $driver = $parse_env['DB_DRIVER'] ?? 'mysql';
            $host = $parse_env['DB_HOST'] ?? 'localhost';
            $database = $parse_env['DB_DATABASE'] ?? '';
            $port = $parse_env['DB_PORT'] ?? '3306';
            $user = $parse_env['DB_USER'] ?? '';
            $password = $parse_env['DB_PASSWORD'] ?? '';

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            $dns = $driver . ':host=' . $host . ';port=' . $port . ';dbname=' . $database;
            $this->connection = new PDO($dns, $user, $password, $options);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Return the pdo connection
     */
    public static function pdo() {
        if (self::$_instance == null) {
            self::$_instance = new self;
        }
        return self::$_instance->connection;
    }

    /**
     * Singletons should not be cloneable.
     */
    protected function __clone() {
    }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }
}
