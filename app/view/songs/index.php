<main role="main" class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Songs</li>
        </ol>
    </nav>

    <h1>Songs</h1>

    <?php if (isset($result)) { ?>
        <div class="alert alert-primary" role="alert"><?php echo $result; ?></div>
    <?php } ?>

    <h3>Add a song</h3>
    <form class="form-inline" action="<?php echo URL; ?>songs/addsong" method="post">
        <div class="form-group mb-2 mr-2">
            <label for="artist" class="sr-only">Artist</label>
            <input name="artist" type="text" class="form-control" id="artist" placeholder="Artist">
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="track" class="sr-only">Track</label>
            <input name="track" type="text" class="form-control" id="track" placeholder="Track">
        </div>
        <div class="form-group mb-2 mr-2">
            <label for="link" class="sr-only">Link</label>
            <input name="link" type="text" class="form-control" id="link" placeholder="Link">
        </div>
        <button name="submit_add_song" type="submit" class="btn btn-primary mb-2">Add</button>
    </form>

    <?php if (isset($songs) && count($songs) > 0) { ?>
    <h3>List</h3>
    <table class="table table-striped table-dark">
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

        <?php if (isset($amount)) { ?>
            <p>Songs: <?php echo $amount; ?></small></p>
    <?php } } ?>
</main>
