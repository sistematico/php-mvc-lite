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
            $amount_of_songs = $Song->getAmountOfSongs();
        } else {
            $result = $Song->install();
        }

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
            $songs = $Song->searchTracks($_POST["term"]);
        } 
        require APP . 'view/_templates/header.php';
        require APP . 'view/songs/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
