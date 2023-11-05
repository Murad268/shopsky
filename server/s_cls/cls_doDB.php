<?php
class DbClass {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "shopsky";
    private $conn;

    function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8";
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Veritabanımızda meydana gelen bir sorun yüzünden geçici bir süreliğine hizmet verememekteyiz");
        }
    }

    function query($sql) {
        return $this->conn->query($sql);
    }

    function fetch_array($result) {
        return $result->fetch(PDO::FETCH_BOTH);
    }

    function fetch_assoc($result) {
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    function fetch_object($result) {
        return $result->fetch(PDO::FETCH_OBJ);
    }

    function num_rows($result) {
        return $result->rowCount();
    }

    function affected_rows() {
        return $this->conn->lastInsertId();
    }

    function free_result($result) {
        // No need to explicitly free the result in PDO
    }

    function insert_id() {
        return $this->conn->lastInsertId();
    }

    function close() {
        $this->conn = null;
    }
}


$db = new DbClass();
$db->connect();
?>
