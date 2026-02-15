<?php

class Produto
{
    private $conn;
    private $table = "produtos";

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
                  (nome, descricao, codigo_interno, status)
                  VALUES (:nome, :descricao, :codigo_interno, :status)";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':nome' => $dados['nome'],
            ':descricao' => $dados['descricao'],
            ':codigo_interno' => $dados['codigo_interno'],
            ':status' => $dados['status']
        ]);
    }
    public function buscarPorId($id)
{
    $query = "SELECT * FROM {$this->table} WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function buscar($termo)
{
    $query = "SELECT * FROM {$this->table}
              WHERE nome LIKE :termo
              OR codigo_interno LIKE :termo";

    $stmt = $this->conn->prepare($query);
    $stmt->execute([
        ':termo' => "%{$termo}%"
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function listarComFornecedores()
{
    $query = "
        SELECT 
            p.id AS produto_id,
            p.nome AS produto_nome,
            p.codigo_interno,
            p.status AS produto_status,
            f.id AS fornecedor_id,
            f.nome AS fornecedor_nome
        FROM produtos p
        LEFT JOIN produto_fornecedor pf 
            ON p.id = pf.produto_id
        LEFT JOIN fornecedores f 
            ON pf.fornecedor_id = f.id
        ORDER BY p.id
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $produtos = [];

    foreach ($resultado as $row) {

        $id = $row['produto_id'];

        if (!isset($produtos[$id])) {
            $produtos[$id] = [
                'id' => $id,
                'nome' => $row['produto_nome'],
                'codigo_interno' => $row['codigo_interno'],
                'status' => $row['produto_status'],
                'fornecedores' => []
            ];
        }

        if ($row['fornecedor_id']) {
            $produtos[$id]['fornecedores'][] = [
                'id' => $row['fornecedor_id'],
                'nome' => $row['fornecedor_nome']
            ];
        }
    }

    return $produtos;
}


}
