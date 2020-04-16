<main role="main" class="container">
    <h1>Songs</h1>
    <h2>You are in the View: app/view/song/index.php (everything in this box comes from that file)</h2>
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

    <div class="box">
        <h3>Amount of songs: <?php echo $amount_of_songs; ?></h3>
        <h3>Amount of songs (via AJAX)</h3>
        <div id="javascript-ajax-result-box"></div>
        <div>
            <button id="javascript-ajax-button">Click here to get the amount of songs via Ajax (will be displayed in #javascript-ajax-result-box ABOVE)</button>
        </div>
        <h3>List of songs (data from model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Artist</td>
                <td>Track</td>
                <td>Link</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($songs as $song) { ?>
                <tr>
                    <td><?php if (isset($song->id)) echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($song->artist)) echo htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($song->track)) echo htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <?php if (isset($song->link)) { ?>
                            <a href="<?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?></a>
                        <?php } ?>
                    </td>
                    <td><a href="<?php echo URL . 'songs/deletesong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'songs/editsong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>
