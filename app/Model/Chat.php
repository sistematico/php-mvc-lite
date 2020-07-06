<?php

namespace App\Model;
use App\Core\Model;

class Chat extends Model
{
    public function listold()
    {
        $query = $this->db->prepare("SELECT id, usuario, mensagem, timestamp FROM chat");
        $query->execute();
        $results = [];
        while ($row = $query->fetch(\PDO::FETCH_BOTH)) {
            $results[] = $row;
        }
        return json_encode($results);
    }

    public function list()
    {
        $this->deleteLast($this->getLast());

        $query = $this->db->prepare("SELECT id, usuario, mensagem, timestamp FROM chat ORDER BY timestamp DESC LIMIT 20");
        $query->execute();
        $results = [];
        while ($row = $query->fetch(\PDO::FETCH_BOTH)) {
            $results[] = $row;
        }
        return json_encode($results);
    }

    public function add($mensagem)
    {
        try {
            $mensagem = htmlentities($mensagem, ENT_QUOTES, 'UTF-8');
            $sql = "INSERT INTO chat (mensagem,timestamp) VALUES (:mensagem,:timestamp)";
            $query = $this->db->prepare($sql);
            $query->execute([':mensagem' => $mensagem, ':timestamp' => time()]);
            return 'true';
        } catch (\PDOException $e) {
            unset($e);
            return 'false';
        }
        return 'false';
    }

    public function deleteLast($id)
    {
        if ($id != false) {
        $sql = 'DELETE FROM chat WHERE id = :id LIMIT 1';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);    
        $stmt->execute();    
        return $stmt->rowCount();
        }
    }

    public function getLast()
    {
        $query = $this->db->prepare("SELECT id timestamp FROM chat ORDER BY timestamp ASC LIMIT 1");
        $query->execute();
        $result = $query->fetch(\PDO::FETCH_BOTH);

        if (count($result) > 20) {
            return $result[0];
        } else {
            return false;
        }
    }
}