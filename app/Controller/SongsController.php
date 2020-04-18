<?php

namespace App\Controller;

use App\Model\Song;

class SongsController
{
    public function index()
    {
        $Song = new Song();
        if ($Song->tableExists() === true) {
            $this->list();
        } else {
            $this->install();
        }
    }

    public function list()
    {
        $Song = new Song();
        $songs = $Song->getAllSongs();
        $tables = $Song->getTableList();
        $amount_of_songs = $Song->getAmountOfSongs();
        require APP . 'view/_templates/header.php';
        require APP . 'view/songs/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addSong()
    {
        if (isset($_POST["submit_add_song"])) {
            $Song = new Song();
            $Song->addSong($_POST["artist"], $_POST["track"],  $_POST["link"]);
        }
        header('location: ' . URL . 'songs/index');
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
        if (isset($_POST["submit_update_song"])) {
            $Song = new Song();
            $Song->updateSong($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['song_id']);
        }
        header('location: ' . URL . 'songs/index');
    }

    public function search()
    {
        if (isset($_POST["term"])) {
            $Song = new Song();
            $result = $Song->searchTracks($_POST["term"]);
        } 
        require APP . 'view/_templates/header.php';
        require APP . 'view/songs/search.php';
        require APP . 'view/_templates/footer.php';
    }

    public function ajaxGetStats()
    {
        $Song = new Song();
        $amount_of_songs = $Song->getAmountOfSongs();
        echo $amount_of_songs;
    }

    public function install()
    {
        if (isset($_POST["install_table"])) {
            $Song = new Song();
            $Song->install();
            header('location: ' . URL . 'songs');
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/songs/install.php';
            require APP . 'view/_templates/footer.php';
        }
    }

}
