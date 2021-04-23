<?php
class Connection {

    private static $instance;

    public static function getConnection() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("pgsql:host=localhost;dbname=Helpdesk", "postgres", "post");
                self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("ERRO AO CONECTAR O BANCO " . $e->getMessage());
            }
        }
        return self::$instance;
    }

}
?>