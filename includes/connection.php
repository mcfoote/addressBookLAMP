<?php 
class connection{
    protected static $_instance = null;
    public static function instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new connection();
        }
        return self::$_instance;
    }
    public function getConnection() {
        $unix = "localhost";
        $socket = '';
        $db = "contactdb";
        $user = "onlineuser";
        $passwd = "testpass";
        $dsn = "mysql:host=$unix;unix_socket = $socket; dbname=$db";
        $conn = new PDO($dsn, "$user", "$passwd");
        return $conn;
    }
}
?>