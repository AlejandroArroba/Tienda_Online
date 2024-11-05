<?php

class DB {

    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $db = "mi_tienda";
    private static $conn = null;

    public static function getConnection() {
        if (is_null(self::$conn)) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$conn;
    }

    public static function closeConnection() {
        self::$conn->close();
    }

}
