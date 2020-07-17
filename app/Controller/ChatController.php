<?php

namespace App\Controller;
use App\Model\Chat;

class ChatController
{
    public function index()
    {
        $Chat = new Chat();

        if (isset($_POST["mensagem"]) && strlen($_POST["mensagem"]) > 1) {
            $Chat->add($_POST["mensagem"]);
        }

        $messages = $Chat->list();
        require APP . 'view/_templates/header.php';
        require APP . 'view/chat/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function list()
    {
        $Chat = new Chat();
        echo $Chat->list();
    }

    public function last()
    {
        $Chat = new Chat();
        echo $Chat->getLast();
    }

    public function add()
    {
        if (isset($_POST["mensagem"])) {
            $Chat = new Chat();
            echo $Chat->add(htmlentities($_POST["mensagem"], ENT_QUOTES, 'UTF-8'));
        }
    }

    public function erro()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/chat/erro.php';
        require APP . 'view/_templates/footer.php';
    }
}
