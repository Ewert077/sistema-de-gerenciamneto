<?php

require_once __DIR__ . '/../models/Fornecedor.php';

class FornecedorController
{
    private $model;

    public function __construct($conn)
    {
        $this->model = new Fornecedor($conn);
    }

    public function index()
    {
        $termo = $_GET['busca'] ?? null;

        if ($termo) {
            $fornecedores = $this->model->buscar($termo);
        } else {
            $fornecedores = $this->model->listar();
        }

        ob_start();
        require __DIR__ . '/../views/fornecedores/index.php';
        $conteudo = ob_get_clean();

        require __DIR__ . '/../views/layout.php';
    }

  public function create()
{
    ob_start();
    require __DIR__ . '/../views/produtos/create.php';
    $conteudo = ob_get_clean();

    require __DIR__ . '/../views/layout.php';
}

    public function edit()
    {
        $id = $_GET['id'];
        $fornecedor = $this->model->buscarPorId($id);

        ob_start();
        require __DIR__ . '/../views/fornecedores/edit.php';
        $conteudo = ob_get_clean();

        require __DIR__ . '/../views/layout.php';
    }

public function store()
{
    $nome = trim($_POST['nome']);
    $cnpj = trim($_POST['cnpj']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $status = $_POST['status'];

  if (!$nome || !$cnpj || !$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ?rota=fornecedores-create&erro=1");
    exit;
}


    $dados = compact('nome','cnpj','email','telefone','status');

    $this->model->criar($dados);

    header("Location: ?rota=fornecedores");
    exit;
}

    public function update()
    {
        $dados = [
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'cnpj' => $_POST['cnpj'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'status' => $_POST['status']
        ];

        $this->model->atualizar($dados);

        header("Location: ?rota=fornecedores");
        exit;
    }
}
