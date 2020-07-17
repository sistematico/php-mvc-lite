<?php

namespace App\Controller;

use App\Model\Billionaire;

class BillionairesController
{
    public function index()
    {
        $Billionaire = new Billionaire();
        if ($Billionaire->tableExists() === true) {
            $Billionaires = $Billionaire->getAllBillionaires();
            $amount = $Billionaire->getAmountOfBillionaires();
        } else {
            $result = $Billionaire->install();
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/billionaires/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function Bddbillionaire()
    {
        if (isset($_POST["submitsong"]) &&
            isset($_POST["name"]) &&
            isset($_POST["money"]) &&
            isset($_POST["link"]) &&
            !empty($_POST["name"]) &&
            !empty($_POST["money"]) &&
            !empty($_POST["link"]) &&
            filter_var($_POST["link"], FILTER_VALIDATE_URL) !== false) {
            $Billionaire = new Billionaire();
            $Billionaire->addBillionaire($_POST["name"], $_POST["money"],  $_POST["link"]);
        }
        $this->index();
    }

    public function deleteBillionaires($Billionaire_id)
    {
        if (isset($Billionaire_id)) {
            $Billionaire = new Billionaire();
            $Billionaire->deleteSong($Billionaire_id);
        }
        header('location: ' . URL . 'billionaires/index');
    }

    public function editBillionaires($Billionaire_id)
    {
        if (isset($Billionaire_id)) {
            $Billionaire = new Billionaire();
            $Billionaire = $Billionaire->getSong($Billionaire_id);

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

    public function updateBillionaire()
    {
        if (isset($_POST["updatebillionaire"])) {
            $Billionaire = new Billionaire();
            $Billionaire->updateBillionaire($_POST["name"], $_POST["money"],  $_POST["link"], $_POST['song_id']);
        }
        header('location: ' . URL . 'billionaires/index');
    }

    public function search()
    {
        if (isset($_POST["term"])) {
            $Billionaire = new Billionaire();
            $Billionaires = $Billionaire->searchBillionaires($_POST["term"]);
        } 
        require APP . 'view/_templates/header.php';
        require APP . 'view/billionaires/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
