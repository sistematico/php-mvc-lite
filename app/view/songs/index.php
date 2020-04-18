<main role="main" class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Songs</li>
        </ol>
    </nav>

    <h1>Songs</h1>
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

    <h3>Amount of songs: <?php echo $amount_of_songs; ?></h3>
    <h3>Amount of songs (via AJAX)</h3>
    <div id="javascript-ajax-result-box" class="mb-3"></div>
    <div>
        <button id="javascript-ajax-button" class="btn btn-danger mb-2">Get Amount</button>
    </div>

    <h3>List of songs (data from model)</h3>
    <table class="table">
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
                <td><a onClick="javascript: return confirm('Are you sure you want to delete?');" href="<?php echo URL . 'songs/deletesong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                <td><a href="<?php echo URL . 'songs/editsong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <h3>List of tables (data from model)</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Table</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tables as $table) { ?>
            <tr>
                <th scope="row"><?php if (isset($table)) echo $table; ?></th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
