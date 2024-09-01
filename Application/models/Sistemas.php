<?php
namespace Application\models;

use Application\core\Database;
use PDO;

class Sistemas
{
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM tb_sistemas');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM tb_sistemas WHERE id = :ID LIMIT 1', array(':ID' => $id));
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('DELETE FROM tb_sistemas WHERE id = :ID', array(':ID' => $id));
        return $result->rowCount();
    }

    public static function editById(int $id, string $sistema, string $uf, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            'UPDATE tb_sistemas SET sistema = :SISTEMA, uf = :UF, descricao = :DESCRICAO WHERE id = :ID',
            array(':SISTEMA' => $sistema, ':UF' => $uf, ':DESCRICAO' => $descricao, ':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function create(string $sistema, string $uf, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            'INSERT INTO tb_sistemas (sistema, uf, descricao) VALUES (:SISTEMA, :UF, :DESCRICAO)',
            array(':SISTEMA' => $sistema, ':UF' => $uf, ':DESCRICAO' => $descricao)
        );
        return $result->rowCount();
    }
}
