<?php

namespace App\Controller;

class PagesController
{

    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function about()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/about.php';
        require APP . 'view/_templates/footer.php';
    }

    public function credits()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/credits.php';
        require APP . 'view/_templates/footer.php';
    }

    public function error()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/error.php';
        require APP . 'view/_templates/footer.php';
    }
}
