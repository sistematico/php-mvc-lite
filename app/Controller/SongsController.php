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

    public function populate()
    {
        $Song = new Song();
        $result = $Song->populate();
        $songs = $Song->getAllSongs();
        $amount_of_songs = $Song->getAmountOfSongs();
        require APP . 'view/_templates/header.php';
        require APP . 'view/songs/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function prune()
    {
        $Song = new Song();
        $result = $Song->prune();
        require APP . 'view/_templates/header.php';
        require APP . 'view/songs/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if (isset($_POST["submit_add_song"]) && strlen($_POST["artist"]) > 1) {
            $Song = new Song();
            $Song->add($_POST["artist"], $_POST["track"],  $_POST["link"]);
        }        
        require APP . 'view/_templates/header.php';
        require APP . 'view/songs/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function delete($id)
    {
        if (isset($id)) {
            $Song = new Song();
            $Song->delete($id);
        }
        header('location: ' . URL . 'songs/index');
    }

    public function edit($id)
    {
        if (isset($id)) {
            $Song = new Song();
            $song = $Song->get($id);

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

    public function update()
    {
        if (isset($_POST["submit_update_song"])) {
            $Song = new Song();
            $Song->update($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['id']);
        }
        header('location: ' . URL . 'songs/index');
    }

    public function search()
    {
        if (isset($_POST["term"]) && strlen($_POST["term"]) > 1) {
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
}
