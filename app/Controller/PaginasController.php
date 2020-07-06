<?php

namespace App\Controller;

class PaginasController
{

    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function erro()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/paginas/erro.php';
        require APP . 'view/_templates/footer.php';
    }
}
