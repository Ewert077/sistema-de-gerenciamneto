<?php

require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../models/ProdutoFornecedor.php';

class ProdutoController
{
    private $model;
    private $vinculoModel;

    public function __construct($conn)
    {
        $this->model = new Produto($conn);
        $this->vinculoModel = new ProdutoFornecedor($conn);
    }

public function index()
{
    $termo = $_GET['busca'] ?? null;

    if ($termo) {
        $produtos = $this->model->buscar($termo);
    } else {
        $produtos = $this->model->listarComFornecedores();
    }

    ob_start();
    require __DIR__ . '/../views/produtos/index.php';
    $conteudo = ob_get_clean();

    require __DIR__ . '/../views/layout.php';
}


    public function create()
    {
        require __DIR__ . '/../views/produtos/create.php';
    }

    public function store()
    {
        $dados = [
            'nome' => $_POST['nome'] ?? '',
            'descricao' => $_POST['descricao'] ?? '',
            'codigo_interno' => $_POST['codigo_interno'] ?? '',
            'status' => $_POST['status'] ?? 'ativo'
        ];

        $this->model->criar($dados);

        header("Location: ?rota=produtos");
        exit;
    }
}
