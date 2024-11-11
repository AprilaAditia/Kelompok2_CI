<?php
class DBConnection {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "studi_badsmells";

    public function connect() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Memeriksa apakah koneksi berhasil
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>
