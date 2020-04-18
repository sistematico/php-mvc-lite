<?php

namespace App\Model;

use App\Core\Model;

class Song extends Model
{
    public function getAllSongs()
    {
        $sql = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addSong($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);
        $query->execute($parameters);
    }

    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);
        $query->execute($parameters);
    }

    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);
        $query->execute($parameters);
    }

    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->amount_of_songs;
    }

    public function searchTracks($term)
    {
        $term = "%" . $term . "%";
        $sql = "SELECT id, artist, track, link FROM song WHERE artist LIKE :term OR track LIKE :term";
        $query = $this->db->prepare($sql);
        $query->bindParam(':term', $term);
        //$stmt->execute([':term' => $term]);
        $query->execute();

        $tasks = [];

        while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = [
                'id' => $row['id'],
                'artist' => $row['artist'],
                'track' => $row['track'],
                'link' => $row['link']
            ];
        }
        return $tasks;
    }

    public function install()
    {
        $sql = "CREATE TABLE IF NOT EXISTS song (id INTEGER PRIMARY KEY, artist TEXT, track TEXT, link TEXT)";
        try {
            $this->db->exec($sql);
        } catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getTableList()
    {
        $sql = "SELECT name FROM sqlite_master WHERE type='table'";
        $query = $this->db->query($sql);
        return $query->fetch();
    }

    public function tableExists($table = 'song')
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