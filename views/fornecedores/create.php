<h2>Cadastrar Fornecedor</h2>

<form method="POST" action="?rota=fornecedores-store">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>CNPJ:</label><br>
    <input type="text" name="cnpj" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone" required><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="ativo">Ativo</option>
        <option value="inativo">Inativo</option>
    </select><br><br>

    <button type="submit">Salvar</button>
</form>
