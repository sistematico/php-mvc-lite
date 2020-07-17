<?php

namespace App\Model;
use App\Core\Model;

class User extends Model
{
    public function add($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);
        $query->execute($parameters);
    }
}