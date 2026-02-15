<?php

require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../models/Fornecedor.php';
require_once __DIR__ . '/../models/ProdutoFornecedor.php';

class ProdutoFornecedorController
{
    private $produtoModel;
    private $fornecedorModel;
    private $vinculoModel;

    public function __construct($conn)
    {
        $this->produtoModel = new Produto($conn);
        $this->fornecedorModel = new Fornecedor($conn);
        $this->vinculoModel = new ProdutoFornecedor($conn);
    }

    public function gerenciar()
    {
        $produto_id = $_GET['produto_id'];

        $produto = $this->produtoModel->buscarPorId($produto_id);
        $fornecedores = $this->fornecedorModel->listar();
        $vinculados = $this->vinculoModel->listarFornecedoresPorProduto($produto_id);

        require __DIR__ . '/../views/produto_fornecedores/index.php';
    }

    public function store()
    {
        $produto_id = $_POST['produto_id'];
        $fornecedor_id = $_POST['fornecedor_id'];

        $this->vinculoModel->criar($produto_id, $fornecedor_id);

        header("Location: ?rota=produto-fornecedores&produto_id={$produto_id}");
        exit;
    }

    public function remove()
    {
        $produto_id = $_GET['produto_id'];
        $fornecedor_id = $_GET['fornecedor_id'];

        $this->vinculoModel->remover($produto_id, $fornecedor_id);

        header("Location: ?rota=produto-fornecedores&produto_id={$produto_id}");
        exit;
    }
    public function removerMassa()
{
    $produto_id = $_POST['produto_id'];
    $fornecedores = $_POST['fornecedores'] ?? [];

    $this->vinculoModel->removerEmMassa($produto_id, $fornecedores);


    header("Location: ?rota=produto-fornecedores&produto_id=" . $produto_id);
    exit;
}
public function storeAjax()
{
    $produto_id = $_POST['produto_id'];
    $fornecedor_id = $_POST['fornecedor_id'];

    $sucesso = $this->vinculoModel->criar($produto_id, $fornecedor_id);

    echo json_encode([
        'success' => $sucesso
    ]);
}
public function removeAjax()
{
    $produto_id = $_POST['produto_id'];
    $fornecedor_id = $_POST['fornecedor_id'];

    $sucesso = $this->vinculoModel->remover($produto_id, $fornecedor_id);

    echo json_encode(['success' => $sucesso]);
}

public function removerMassaAjax()
{
    $produto_id = $_POST['produto_id'];
    $fornecedores = $_POST['fornecedores'] ?? [];

    $sucesso = $this->vinculoModel->removerEmMassa($produto_id, $fornecedores);

    echo json_encode(['success' => $sucesso]);
}


}
