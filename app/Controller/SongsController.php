<?php

namespace App\Controller;

use App\Model\Song;

class SongsController
{
    public function index()
    {
        $Song = new Song();
        if ($Song->tableExists() === true) {
            $songs = $Song->getAllSongs();
            $amount = $Song->getAmountOfSongs();
        } else {
            $result = $Song->install();
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/songs/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addSong()
    {
        if (isset($_POST["submitsong"]) &&
            isset($_POST["name"]) &&
            isset($_POST["money"]) &&
            isset($_POST["link"]) &&
            !empty($_POST["name"]) &&
            !empty($_POST["money"]) &&
            !empty($_POST["link"]) &&
            filter_var($_POST["link"], FILTER_VALIDATE_URL) !== false) {
            $Song = new Song();
            $Song->addSong($_POST["name"], $_POST["money"],  $_POST["link"]);
        }
        $this->index();
    }

    public function deleteSong($song_id)
    {
        if (isset($song_id)) {
            $Song = new Song();
            $Song->deleteSong($song_id);
        }
        header('location: ' . URL . 'songs/index');
    }

    public function editSong($song_id)
    {
        if (isset($song_id)) {
            $Song = new Song();
            $song = $Song->getSong($song_id);

            if ($song === false) {
                $page = new \App\Controller\PagesController();
                $page->error();
            } else {
                require APP . 'view/_templates/header.php';
                require APP . 'view/songs/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            header('location: ' . URL . 'songs/index');
        }
    }

    public function updateSong()
    {
        if (isset($_POST["updatesong"])) {
            $Song = new Song();
            $Song->updateSong($_POST["name"], $_POST["money"],  $_POST["link"], $_POST['song_id']);
        }
        header('location: ' . URL . 'songs/index');
    }

    public function search()
    {
        if (isset($_POST["term"])) {
            $Song = new Song();
            $songs = $Song->searchTracks($_POST["term"]);
        } 
        require APP . 'view/_templates/header.php';
        require APP . 'view/songs/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
