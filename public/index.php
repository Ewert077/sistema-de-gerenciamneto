
<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../config/database.php';

$database = new Database();
$conn = $database->connect();

$rota = $_GET['rota'] ?? 'home';

switch ($rota) {

    case 'fornecedores':
        require_once __DIR__ . '/../controllers/FornecedorController.php';
        $controller = new FornecedorController($conn);
        $controller->index();
        break;
        case 'fornecedores-create':
    require_once __DIR__ . '/../controllers/FornecedorController.php';
    $controller = new FornecedorController($conn);
    $controller->create();
    break;

    case 'fornecedores-store':
    require_once __DIR__ . '/../controllers/FornecedorController.php';
    $controller = new FornecedorController($conn);
    $controller->store();
    break;
    case 'produtos':
    require_once __DIR__ . '/../controllers/ProdutoController.php';
    $controller = new ProdutoController($conn);
    $controller->index();
    break;

case 'produtos-create':
    require_once __DIR__ . '/../controllers/ProdutoController.php';
    $controller = new ProdutoController($conn);
    $controller->create();
    break;

case 'produtos-store':
    require_once __DIR__ . '/../controllers/ProdutoController.php';
    $controller = new ProdutoController($conn);
    $controller->store();
    break;

    case 'produto-fornecedores':
    require_once __DIR__ . '/../controllers/ProdutoFornecedorController.php';
    $controller = new ProdutoFornecedorController($conn);
    $controller->gerenciar();
    break;

case 'produto-fornecedores-store':
    require_once __DIR__ . '/../controllers/ProdutoFornecedorController.php';
    $controller = new ProdutoFornecedorController($conn);
    $controller->store();
    break;

case 'produto-fornecedores-remove':
    require_once __DIR__ . '/../controllers/ProdutoFornecedorController.php';
    $controller = new ProdutoFornecedorController($conn);
    $controller->remove();
    break;

    case 'fornecedores-edit':
    require_once __DIR__ . '/../controllers/FornecedorController.php';
    $controller = new FornecedorController($conn);
    $controller->edit();
    break;

case 'fornecedores-update':
    require_once __DIR__ . '/../controllers/FornecedorController.php';
    $controller = new FornecedorController($conn);
    $controller->update();
    break;
    case 'produto-fornecedores-remover-massa':
    require_once __DIR__ . '/../controllers/ProdutoFornecedorController.php';
    $controller = new ProdutoFornecedorController($conn);
    $controller->removerMassa();
    break;
    case 'produto-fornecedores-store-ajax':
    require_once __DIR__ . '/../controllers/ProdutoFornecedorController.php';
    $controller = new ProdutoFornecedorController($conn);
    $controller->storeAjax();
    break;

    case 'produto-fornecedores-remove-ajax':
    require_once __DIR__ . '/../controllers/ProdutoFornecedorController.php';
    $controller = new ProdutoFornecedorController($conn);
    $controller->removeAjax();
    break;

 
case 'produto-fornecedores-remover-massa-ajax':
    require_once __DIR__ . '/../controllers/ProdutoFornecedorController.php';
    $controller = new ProdutoFornecedorController($conn);
    $controller->removerMassaAjax();
    break;








        

        
    default:
        echo "<h1>Sistema de Gerenciamento</h1>";
}


