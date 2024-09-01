<?php
namespace Application\models;
use Application\core\Database;
use PDO;
class Niveis
{
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM tb_niveis');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function findById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM tb_niveis WHERE id = :ID LIMIT 1', array(':ID' => $id));
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public static function deleteById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('DELETE FROM tb_niveis WHERE id = :ID', array(':ID' => $id));
        return $result->rowCount();
    }
    public static function editById(int $id, string $nivel, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            'UPDATE tb_niveis SET nivel = :NIVEL, descricao = :DESCRICAO WHERE id = :ID', 
            array(':NIVEL' => $nivel, ':DESCRICAO' => $descricao, ':ID' => $id));
        return $result->rowCount();
    }
    public static function create(string $nivel, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            'INSERT INTO tb_niveis (nivel, descricao) VALUES (:NIVEL, :DESCRICAO)',
            array(':NIVEL' => $nivel, ':DESCRICAO' => $descricao));
        return $result->rowCount();
    }
}
