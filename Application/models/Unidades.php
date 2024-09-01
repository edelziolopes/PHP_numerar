<?php
namespace Application\models;

use Application\core\Database;
use PDO;

class Unidades
{
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM tb_unidades');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM tb_unidades WHERE id = :ID LIMIT 1', array(':ID' => $id));
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('DELETE FROM tb_unidades WHERE id = :ID', array(':ID' => $id));
        return $result->rowCount();
    }

    public static function editById(int $id, string $unidade, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            'UPDATE tb_unidades SET unidade = :UNIDADE, descricao = :DESCRICAO WHERE id = :ID',
            array(':UNIDADE' => $unidade, ':DESCRICAO' => $descricao, ':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function create(string $unidade, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            'INSERT INTO tb_unidades (unidade, descricao) VALUES (:UNIDADE, :DESCRICAO)',
            array(':UNIDADE' => $unidade, ':DESCRICAO' => $descricao)
        );
        return $result->rowCount();
    }
}
