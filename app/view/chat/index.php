<main role="main" class="container">
    <h1>Conversero</h1>
    <div class="table-responsive">
        <table class="table">
            <tbody id="mensagens" style="overflow-y: auto"></tbody>
        </table>
    </div>
</main>

<footer class="footer">
    <div class="container">
    <form id="formmensagens" class="form-inline" action="<?php echo URL; ?>chat/index" method="post">
        <div class="form-group row">
            <div class="col-11">
                <input id="mensagem" name="mensagem" type="text" class="form-control" placeholder="Diga um olá!" minlength="1" maxlength="100">
            </div>
            <div class="col-1">
                <button id="envia" name="send_text" type="submit" class="btn btn-primary rounded m-auto"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </form>
    </div>
</footer>
