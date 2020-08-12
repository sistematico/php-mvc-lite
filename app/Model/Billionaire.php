<?php

namespace App\Model;
use App\Core\Model;
use App\Helper\Db;

class Billionaire extends Model
{
    //private $results = new stdClass();
    private $results = array();

    public function getAll()
    {
        if (!Db::exists($this->db, 'billionaires')) {
            Db::install();
        }
        $query = $this->db->prepare("SELECT id, name, money, link FROM billionaires ORDER BY money DESC");
        $query->execute();
        //return $query->fetchAll();
        while ($row = $query->fetch()) {
            $this->results[] = $row;
        }
        return (object) $this->results;
    }

    public function add($name, $money, $link)
    {
        $money = (int) $money * 10;
        $query = $this->db->prepare("INSERT INTO billionaires (name, money, link) VALUES (:name, :money, :link)");
        $query->execute([':name' => $name, ':money' => $money, ':link' => $link]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM billionaires WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $id]);
    }

    public function get($id)
    {
        $sql = "SELECT id, name, money, link FROM billionaires WHERE id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function update($name, $money, $link, $id)
    {
        $sql = "UPDATE billionaires SET name = :name, money = :money, link = :link WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':money' => $money, ':link' => $link, ':id' => $id);
        $query->execute($parameters);
    }

    public function getAmount()
    {
        $sql = "SELECT COUNT(id) AS amount FROM billionaires";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->amount;
    }

    public function search($term)
    {
        $term = "%" . $term . "%";
        $sql = "SELECT id, name, money, link FROM billionaires WHERE name LIKE :term OR money LIKE :term OR link LIKE :term";
        $query = $this->db->prepare($sql);
        $query->execute([':term' => $term]);
        while ($row = $query->fetch()) {
            $this->results[] = $row;
        }
        return (object) $this->results;
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

    public function prune()
    {
        try {
            $this->db->exec("DELETE FROM billionaires;");
            return "Table dropped.";
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

    public function tableExists($table = 'billionaires')
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