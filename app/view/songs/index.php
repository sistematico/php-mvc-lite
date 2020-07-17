<main class="flex-shrink-0">
    <div class="container">
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Billionaires</li>
            </ol>
        </nav>
        <h1>Billionaires</h1>
        <?php if (isset($result)) { ?>
            <div class="alert alert-primary" role="alert"><?php echo $result; ?></div>
        <?php } ?>
        <h3>Add a Billionaire</h3>
        <form class="row g-3" action="<?php echo URL; ?>songs/addsong" method="post">
            <div class="col">
                <label for="name" class="sr-only">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="col">
                <label for="money" class="sr-only">Money</label>
                <input name="money" type="text" class="form-control" id="money" placeholder="Money">
            </div>
            <div class="col">
                <label for="link" class="sr-only">Link</label>
                <input name="link" type="text" class="form-control" id="link" placeholder="Link">
            </div>
            <div class="col-1">
                <button name="submitsong" type="submit" class="btn btn-primary mb-2">Add</button>
            </div>
        </form>

        <?php if (isset($songs)) { ?>
            <h3 class="mt-4">List</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Artist</th>
                            <th scope="col">Track</th>
                            <th scope="col">Link</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($songs as $song) { ?>
                        <tr>
                            <th scope="row"><?php if (isset($song->id)) echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?></th>
                            <td><?php if (isset($song->artist)) echo htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php if (isset($song->track)) echo htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php if (isset($song->link)) { ?>
                                    <a href="<?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?></a>
                                <?php } ?>
                            </td>
                            <td><a onClick="javascript: return confirm('Are you sure you want to delete?');" href="<?php echo URL . 'songs/deletesong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-trash"></i></a></td>
                            <td><a href="<?php echo URL . 'songs/editsong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-edit"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php if (isset($amount)) { ?>
                <p>Songs: <?php echo $amount; ?></small></p>
            <?php } ?>
        <?php } ?>
    </div>
</main>
