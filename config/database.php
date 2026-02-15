<?php

class Database
{
    private $host = 'localhost';
    private $db_name = 'teste_backend_php';
    private $username = 'root';
    private $password = '';

    public function connect()
    {
        try {
            $conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;

        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
