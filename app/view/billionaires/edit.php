<main class="flex-shrink-0">
    <div class="container">

    <nav aria-label="breadcrumb" class="mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>billionaires">Billionaires</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <h1>Billionaires</h1>
    <h3>Edit a Billionaire</h3>

    <form class="row g-3" action="<?php echo URL; ?>billionaires/update" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($billionaire->id, ENT_QUOTES, 'UTF-8'); ?>" />
        <div class="col-sm-8 col-md-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?php echo htmlspecialchars($billionaire->name, ENT_QUOTES, 'UTF-8'); ?>" required />
        </div>
        <div class="col-sm-4 col-md-2">
            <label for="money" class="form-label">Money(in billions)</label>
            <input name="money" type="number" class="form-control" id="money" placeholder="Money" min="1" max="5" value="<?php echo htmlspecialchars($billionaire->money, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div class="col-sm-12 col-md-6 mb-3">
            <label for="link" class="form-label">Link (Valid URL required)</label>
            <input name="link" type="text" class="form-control" id="link" placeholder="Link" value="<?php echo htmlspecialchars($billionaire->link, ENT_QUOTES, 'UTF-8'); ?>" />
        </div>
        <div class="col-sm-12 col-md-1 align-bottom mt-auto">
            <button name="updatebillionaire" type="submit" class="btn btn-primary mb-2">Update</button>
        </div>
    </form>
    
</div>

</main>

