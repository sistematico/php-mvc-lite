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
        <form class="row g-3" action="<?php echo URL; ?>billionaires/add" method="post">
            <div class="col-sm-8 col-md-3">
                <label for="name" class="sr-only">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="col-sm-4 col-md-2">
                <label for="money" class="sr-only">Money</label>
                <input name="money" type="number" class="form-control" id="money" placeholder="Money" min="999" max="99999">
            </div>
            <div class="col-sm-12 col-md-6">
                <label for="link" class="sr-only">Link</label>
                <input name="link" type="text" class="form-control" id="link" placeholder="Link">
            </div>
            <div class="col-sm-12 col-md-1">
                <button name="addbillionaire" type="submit" class="btn btn-primary mb-2">Add</button>
            </div>
        </form>

        <?php if (isset($billionaires)) { ?>
            <h3 class="mt-4">List</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Name</th>
                            <th scope="col">Money</th>
                            <th scope="col">Link</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($billionaires as $billionaire) { ?>
                        <tr>
                            <th scope="row"><?php if (isset($i)) echo $i; $i++; ?></th>
                            <td><?php if (isset($billionaire->name)) echo htmlspecialchars($billionaire->name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php if (isset($billionaire->money)) echo '$' . number_format((float) $billionaire->money / 10, 1) . ' B'; ?></td>
                            <td>
                                <?php if (isset($billionaire->link)) { ?>
                                    <a href="<?php echo htmlspecialchars($billionaire->link, ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><?php echo htmlspecialchars($billionaire->link, ENT_QUOTES, 'UTF-8'); ?></a>
                                <?php } ?>
                            </td>
                            <td><a onClick="javascript: return confirm('Are you sure you want to delete?');" href="<?php echo URL . 'billionaires/delete/' . htmlspecialchars($billionaire->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-trash"></i></a></td>
                            <td><a href="<?php echo URL . 'billionaires/edit/' . htmlspecialchars($billionaire->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-edit"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php if (isset($amount)) { ?>
                <p>Billionaires: <?php echo $amount; ?></small></p>
            <?php } ?>
        <?php } ?>
    </div>
</main>
