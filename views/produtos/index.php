


<br>

<div class="card">

    <div class="page-header">
        <h1>Lista de Produtos</h1>
       <a href="?rota=produtos-create" class="btn">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
        <path stroke-width="2" d="M12 5v14M5 12h14"/>
    </svg>
    Novo Produto
</a>

    </div>

    <!-- BUSCA -->
    <form method="GET" class="search-form">
        <input type="hidden" name="rota" value="produtos">

        <div class="search-group">
            <input type="text"
                   name="busca"
                   placeholder="Buscar por nome ou código..."
                   value="<?= $_GET['busca'] ?? '' ?>">

            <button type="submit">
                
            </button>
        </div>
    </form>

    <br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Código</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $produto['id'] ?></td>
                <td><?= htmlspecialchars($produto['nome']) ?></td>
                <td><?= htmlspecialchars($produto['codigo_interno']) ?></td>
                <td>
                    <span class="badge badge-<?= $produto['status'] ?>">
                        <?= $produto['status'] ?>
                    </span>
                </td>
                <td>
                    <a href="?rota=produto-fornecedores&produto_id=<?= $produto['id'] ?>"
                       class="btn-outline">
                        Gerenciar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
