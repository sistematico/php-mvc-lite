<main role="main" class="container">
    <h1 class="mt-5">Install Tables</h1>
    <p class="lead">
        <?php if (isset($result)) { ?>
            <a class="btn btn-primary" href="<?php echo URL; ?>songs" role="button">Voltar</a>
        <?php } else { ?>
            <form action="<?php echo URL; ?>songs/install" method="post">
                <button name="install_table" type="submit" class="btn btn-primary">Install</button>
            </form>
        <?php } ?>
    </p>
</main>