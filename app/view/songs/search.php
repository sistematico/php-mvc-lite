<main role="main" class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>songs">Songs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search</li>
        </ol>
    </nav>

    <h1>Songs</h1>

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
            <?php foreach ($result as $song) { ?>
            <tr>
                <th scope="row"><?php if (isset($song['id'])) echo htmlspecialchars($song['id'], ENT_QUOTES, 'UTF-8'); ?></th>
                <td><?php if (isset($song['artist'])) echo htmlspecialchars($song['artist'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($song['track'])) echo htmlspecialchars($song['track'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <?php if (isset($song['link'])) { ?>
                        <a href="<?php echo htmlspecialchars($song['link'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><?php echo htmlspecialchars($song['link'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php } ?>
                </td>
                <td><a onClick="javascript: return confirm('Are you sure you want to delete?');" href="<?php echo URL . 'songs/deletesong/' . htmlspecialchars($song['id'], ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                <td><a href="<?php echo URL . 'songs/editsong/' . htmlspecialchars($song['id'], ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
