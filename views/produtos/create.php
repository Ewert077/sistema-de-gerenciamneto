<div class="card form-card">

    <div class="page-header">
        <h1>Cadastrar Produto</h1>
        <a href="?rota=produtos" class="btn-outline">
            Voltar
        </a>
    </div>

    <form method="POST" action="?rota=produtos-store" class="form-modern">

        <div class="form-group">
            <label>Nome do Produto</label>
            <input type="text" 
                   name="nome" 
                   placeholder="Ex: Placa de Vídeo RTX 4060"
                   required>
        </div>

        <div class="form-group">
            <label>Código Interno</label>
            <input type="text" 
                   name="codigo_interno"
                   placeholder="Ex: PZATY6"
                   required>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao"
                      rows="4"
                      placeholder="Descreva o produto..."></textarea>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select>
        </div>

        <button type="submit" class="btn">
            Salvar Produto
        </button>

    </form>

</div>
