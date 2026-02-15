<?php

class ProdutoFornecedor
{
    private $conn;
    private $table = "produto_fornecedor";

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

public function criar($produto_id, $fornecedor_id)
{
    $query = "SELECT status FROM fornecedores WHERE id = :id LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([':id' => $fornecedor_id]);

    $fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$fornecedor || $fornecedor['status'] !== 'ativo') {
        return false; // Bloqueia vínculo
    }

    // 2️⃣ Insere vínculo se estiver ativo
    $query = "INSERT INTO {$this->table}
              (produto_id, fornecedor_id)
              VALUES (:produto_id, :fornecedor_id)";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        ':produto_id' => $produto_id,
        ':fornecedor_id' => $fornecedor_id
    ]);
}

    public function listarFornecedoresPorProduto($produto_id)
    {
        $query = "SELECT f.id, f.nome, f.status
                  FROM {$this->table} pf
                  JOIN fornecedores f ON pf.fornecedor_id = f.id
                  WHERE pf.produto_id = :produto_id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([':produto_id' => $produto_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function remover($produto_id, $fornecedor_id)
    {
        $query = "DELETE FROM {$this->table}
                  WHERE produto_id = :produto_id
                  AND fornecedor_id = :fornecedor_id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':produto_id' => $produto_id,
            ':fornecedor_id' => $fornecedor_id
        ]);
    }
    public function removerEmMassa($produto_id, $fornecedores)
{
    if (empty($fornecedores)) {
        return false;
    }

    $placeholders = implode(',', array_fill(0, count($fornecedores), '?'));

    $query = "DELETE FROM {$this->table}
              WHERE produto_id = ?
              AND fornecedor_id IN ($placeholders)";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute(array_merge([$produto_id], $fornecedores));
}

}
