<main role="main" class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>songs">Songs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Install</li>
        </ol>
    </nav>

    <h1>Install Songs Table</h1>
    <form class="form-inline" action="<?php echo URL; ?>songs/install" method="post">
        <a href="<?php echo URL; ?>songs" class="btn btn-primary mr-2" role="button"><i class="fas fa-arrow-left"></i> Back</a>
        <button name="install_table" type="submit" class="btn btn-primary">Install</button>
    </form>
</main>
