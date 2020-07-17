<?php

namespace App\Controller;

use App\Model\Billionaire;

class BillionairesController
{
    public function index()
    {
        $Billionaire = new Billionaire();
        if ($Billionaire->tableExists() === true) {
            $billionaires = $Billionaire->getAll();
            $amount = $Billionaire->getAmount();
        } else {
            $result = $Billionaire->install();
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/billionaires/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if (isset($_POST["addbillionaire"]) &&
            isset($_POST["name"]) &&
            isset($_POST["money"]) &&
            isset($_POST["link"]) &&
            !empty($_POST["name"]) &&
            !empty($_POST["money"]) &&
            !empty($_POST["link"]) &&
            filter_var($_POST["link"], FILTER_VALIDATE_URL) !== false) {
            $Billionaire = new Billionaire();
            $Billionaire->add($_POST["name"], $_POST["money"],  $_POST["link"]);
        }
        $this->index();
    }

    public function delete($id)
    {
        if (isset($id)) {
            $Billionaire = new Billionaire();
            $Billionaire->delete($id);
        }
        header('location: ' . URL . 'billionaires/index');
    }

    public function edit($id)
    {
        if (isset($id)) {
            $Billionaire = new Billionaire();
            $billionaire = $Billionaire->get($id);

            if ($Billionaire === false) {
                $page = new \App\Controller\PagesController();
                $page->error();
            } else {
                require APP . 'view/_templates/header.php';
                require APP . 'view/billionaires/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            header('location: ' . URL . 'billionaires/index');
        }
    }

    public function update()
    {
        if (isset($_POST["updatebillionaire"])) {
            $Billionaire = new Billionaire();
            $Billionaire->update($_POST["name"], $_POST["money"],  $_POST["link"], $_POST['id']);
        }
        header('location: ' . URL . 'billionaires/index');
    }

    public function search()
    {
        if (isset($_POST["term"])) {
            $Billionaire = new Billionaire();
            $billionaires = $Billionaire->search($_POST["term"]);
        } 
        require APP . 'view/_templates/header.php';
        require APP . 'view/billionaires/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
