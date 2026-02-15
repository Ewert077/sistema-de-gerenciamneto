<div class="card form-card">

    <div class="page-header">
        <h1>Editar Fornecedor</h1>
        <a href="?rota=fornecedores" class="btn-outline">
            Voltar
        </a>
    </div>

    <form method="POST"
          action="?rota=fornecedores-update"
          class="form-modern">

        <input type="hidden"
               name="id"
               value="<?= $fornecedor['id'] ?>">

        <div class="form-group">
            <label>Nome</label>
            <input type="text"
                   name="nome"
                   value="<?= htmlspecialchars($fornecedor['nome']) ?>"
                   required>
        </div>

        <div class="form-group">
            <label>CNPJ</label>
            <input type="text"
                   name="cnpj"
                   value="<?= htmlspecialchars($fornecedor['cnpj']) ?>"
                   required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email"
                   name="email"
                   value="<?= htmlspecialchars($fornecedor['email']) ?>"
                   required>
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text"
                   name="telefone"
                   value="<?= htmlspecialchars($fornecedor['telefone']) ?>"
                   required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="ativo"
                    <?= $fornecedor['status'] === 'ativo' ? 'selected' : '' ?>>
                    Ativo
                </option>

                <option value="inativo"
                    <?= $fornecedor['status'] === 'inativo' ? 'selected' : '' ?>>
                    Inativo
                </option>
            </select>
        </div>

        <button type="submit" class="btn-primary">
            💾 Atualizar Fornecedor
        </button>

    </form>

</div>
