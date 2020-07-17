<?php

namespace App\Model;
use App\Core\Model;

class Song extends Model
{
    private $results = [];

    public function getAllSongs()
    {
        $query = $this->db->prepare("SELECT id, artist, track, link FROM songs");
        $query->execute();
        return $query->fetchAll();
    }

    public function addSong($artist, $track, $link)
    {
        $query = $this->db->prepare("INSERT INTO songs (artist, track, link) VALUES (:artist, :track, :link)");
        $query->execute([':artist' => $artist, ':track' => $track, ':link' => $link]);
    }

    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM songs WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);
        $query->execute($parameters);
    }

    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM songs WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE songs SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);
        $query->execute($parameters);
    }

    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM songs";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->amount_of_songs;
    }

    public function searchTracks($term)
    {
        $term = "%" . $term . "%";
        $sql = "SELECT id, artist, track, link FROM songs WHERE artist LIKE :term OR track LIKE :term";
        $query = $this->db->prepare($sql);
        $query->execute([':term' => $term]);
        while ($row = $query->fetch()) {
            // $this->results[] = [
            //     'id' => $row->id,
            //     'artist' => $row->artist,
            //     'track' => $row->track,
            //     'link' => $row->link
            // ];
            $this->results[] = $row;
        }
        return $this->results;
    }

    public function install()
    {
        try {
            if (file_exists(SQL_FILE)) {
                $sql = file_get_contents(SQL_FILE);
                $this->db->exec($sql);
                return "Table installed.";
            } else {
                return "File " . SQL_FILE . " not found.";
            }
        } catch(\PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function getTableList()
    {
        $sql = "SELECT name FROM sqlite_master WHERE type='table'";
        $query = $this->db->query($sql);
        return $query->fetch();
    }

    public function tableExists($table = 'songs')
    {
        $sql = "select 1 from $table";
        try {
            $this->db->exec($sql);
            return true;
        } catch(\PDOException $e) {
            unset($e);
            return false;
        }
        return false;
    }    
}