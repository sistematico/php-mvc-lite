<?php

namespace App\Controller;

class PagesController
{

    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'views/pages/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function install()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'views/pages/example_one.php';
        require APP . 'view/_templates/footer.php';
    }

    public function exampleTwo()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'views/pages/example_two.php';
        require APP . 'view/_templates/footer.php';
    }

    public function error()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/error.php';
        require APP . 'view/_templates/footer.php';
    }
}
