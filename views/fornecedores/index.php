<div class="card">

    <div class="page-header">
        <div>
            <h1>Lista de Fornecedores</h1>
            <p class="subtitle">Gerencie seus parceiros comerciais</p>
        </div>

        <a href="?rota=fornecedores-create" class="btn">
            <svg width="16" height="16" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Novo Fornecedor
        </a>
    </div>

    <!-- BUSCA -->
    <form method="GET" class="search-form">
        <input type="hidden" name="rota" value="fornecedores">

        <div class="search-group">
            <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>

            <input type="text"
                   name="busca"
                   placeholder="Buscar por nome, CNPJ ou e-mail..."
                   value="<?= $_GET['busca'] ?? '' ?>">

           
        </div>
    </form>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th style="text-align:right;">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($fornecedores)): ?>
                    <?php foreach ($fornecedores as $fornecedor): ?>
                        <tr>
                            <td><?= $fornecedor['id'] ?></td>

                            <td class="strong">
                                <?= htmlspecialchars($fornecedor['nome']) ?>
                            </td>

                            <td>
                                <span class="cnpj">
                                    <?= htmlspecialchars($fornecedor['cnpj']) ?>
                                </span>
                            </td>

                            <td class="muted">
                                <?= htmlspecialchars($fornecedor['email']) ?>
                            </td>

                            <td>
                                <?php if ($fornecedor['status'] === 'ativo'): ?>
                                    <span class="badge badge-ativo">Ativo</span>
                                <?php else: ?>
                                    <span class="badge badge-inativo">Inativo</span>
                                <?php endif; ?>
                            </td>

                            <td style="text-align:right;">
                                <a class="btn-link"
                                   href="?rota=fornecedores-edit&id=<?= $fornecedor['id'] ?>">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="empty">
                            Nenhum fornecedor encontrado.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
