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

    public function help()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/help.php';
        require APP . 'view/_templates/footer.php';
    }

    public function credits()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/credits.php';
        require APP . 'view/_templates/footer.php';
    }

    public function install()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/example_one.php';
        require APP . 'view/_templates/footer.php';
    }

    public function error()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/error.php';
        require APP . 'view/_templates/footer.php';
    }
}
