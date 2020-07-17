<main class="flex-shrink-0">
    <div class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>songs">Billionaires</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <h1>Billionaires</h1>
    <h3>Edit a Billionaire</h3>

    <form class="row g-3" action="<?php echo URL; ?>songs/updatesong" method="post">
        <input type="hidden" name="song_id" value="<?php echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>" />
        <div class="col">
            <label for="name" class="sr-only">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?php echo htmlspecialchars($song->name, ENT_QUOTES, 'UTF-8'); ?>" required />
        </div>
        <div class="col">
            <label for="money" class="sr-only">Money</label>
            <input name="money" type="text" class="form-control" id="money" placeholder="Money" value="<?php echo htmlspecialchars($song->money, ENT_QUOTES, 'UTF-8'); ?>" required />
        </div>
        <div class="col">
            <label for="link" class="sr-only">Link</label>
            <input name="link" type="text" class="form-control" id="link" placeholder="Link" value="<?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?>" />
        </div>
        <div class="col-1">
            <button name="updatesong" type="submit" class="btn btn-primary mb-2">Update</button>
        </div>
    </form>
    
</div>

</main>

