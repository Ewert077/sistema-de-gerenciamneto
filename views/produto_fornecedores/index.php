<h2>Gerenciar Fornecedores do Produto</h2>

<h3><?= htmlspecialchars($produto['nome']) ?></h3>

<hr>

<h4>Fornecedores Vinculados</h4>

<form id="form-remover-massa">
    <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">

    <?php if (!empty($vinculados)): ?>

        <?php foreach ($vinculados as $v): ?>
            <div class="linha-fornecedor" style="margin-bottom:8px;">
                
                <input type="checkbox"
                       name="fornecedores[]"
                       value="<?= $v['id'] ?>">

                <?= htmlspecialchars($v['nome']) ?>

                <button 
                    type="button"
                    class="btn-remover"
                    data-produto="<?= $produto['id'] ?>"
                    data-fornecedor="<?= $v['id'] ?>"
                    style="margin-left:10px; color:red;">
                    Remover
                </button>
            </div>
        <?php endforeach; ?>

        <br>
        <button type="submit">Remover Selecionados</button>

    <?php else: ?>
        <p><em>Nenhum fornecedor vinculado</em></p>
    <?php endif; ?>
</form>

<hr>

<h4>Adicionar Fornecedor</h4>

<form id="form-vincular">
    <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">

    <select name="fornecedor_id" required>
        <?php foreach ($fornecedores as $f): ?>
            <option value="<?= $f['id'] ?>"
                <?= $f['status'] === 'inativo' ? 'disabled' : '' ?>>
                <?= htmlspecialchars($f['nome']) ?>
                (<?= htmlspecialchars($f['status']) ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Vincular</button>
</form>

<br>
<a href="?rota=produtos">Voltar</a>

<!-- FEEDBACK VISUAL -->
<div id="feedback" style="display:none; padding:10px; margin-top:15px;"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

    function mostrarFeedback(msg, sucesso = true) {
        let box = $("#feedback");
        box.text(msg)
           .css({
               background: sucesso ? "#d4edda" : "#f8d7da",
               color: sucesso ? "#155724" : "#721c24",
               border: "1px solid",
               borderColor: sucesso ? "#c3e6cb" : "#f5c6cb"
           })
           .fadeIn();

        setTimeout(() => box.fadeOut(), 2500);
    }

    // VINCULAR VIA AJAX
    $("#form-vincular").submit(function(e){
        e.preventDefault();

        $.post("?rota=produto-fornecedores-store-ajax",
            $(this).serialize(),
            function(response){

                let data = JSON.parse(response);

                if(data.success){
                    mostrarFeedback("Fornecedor vinculado com sucesso!");
                    location.reload();
                } else {
                    mostrarFeedback("Erro ao vincular.", false);
                }
            }
        );
    });

    // REMOVER INDIVIDUAL
    $(".btn-remover").click(function(){

        let produto_id = $(this).data("produto");
        let fornecedor_id = $(this).data("fornecedor");
        let linha = $(this).closest(".linha-fornecedor");

        $.post("?rota=produto-fornecedores-remove-ajax", {
            produto_id: produto_id,
            fornecedor_id: fornecedor_id
        }, function(response){

            let data = JSON.parse(response);

            if(data.success){
                linha.fadeOut();
                mostrarFeedback("Fornecedor removido com sucesso!");
            } else {
                mostrarFeedback("Erro ao remover.", false);
            }
        });

    });

    // REMOVER EM MASSA
    $("#form-remover-massa").submit(function(e){

        e.preventDefault();

        $.post("?rota=produto-fornecedores-remover-massa-ajax",
            $(this).serialize(),
            function(response){

                let data = JSON.parse(response);

                if(data.success){
                    mostrarFeedback("Fornecedores removidos com sucesso!");
                    location.reload();
                } else {
                    mostrarFeedback("Erro ao remover.", false);
                }
            }
        );
    });

});
</script>
