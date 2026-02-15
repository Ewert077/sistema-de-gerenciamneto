<?php

class Fornecedor
{
    private $conn;
    private $table = "fornecedores";

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function listar()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($dados)
    {
        $query = "INSERT INTO {$this->table}
                  (nome, cnpj, email, telefone, status)
                  VALUES (:nome, :cnpj, :email, :telefone, :status)";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':nome' => $dados['nome'],
            ':cnpj' => $dados['cnpj'],
            ':email' => $dados['email'],
            ':telefone' => $dados['telefone'],
            ':status' => $dados['status']
        ]);
        
    }
    public function buscarPorId($id)
{
    $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function atualizar($dados)
{
    $query = "UPDATE {$this->table}
              SET nome = :nome,
                  cnpj = :cnpj,
                  email = :email,
                  telefone = :telefone,
                  status = :status
              WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        ':id' => $dados['id'],
        ':nome' => $dados['nome'],
        ':cnpj' => $dados['cnpj'],
        ':email' => $dados['email'],
        ':telefone' => $dados['telefone'],
        ':status' => $dados['status']
    ]);
}
public function buscar($termo)
{
    $query = "SELECT * FROM {$this->table}
              WHERE nome LIKE :termo
              OR cnpj LIKE :termo
              OR email LIKE :termo";

    $stmt = $this->conn->prepare($query);
    $stmt->execute([
        ':termo' => "%{$termo}%"
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
