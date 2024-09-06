<?php
namespace Application\models;

use Application\core\Database;
use PDO;

class Descritores
{
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT tb_descritores.*, tb_sistemas.sistema 
            FROM tb_descritores 
            LEFT JOIN tb_sistemas ON tb_descritores.id_sistema = tb_sistemas.id
        ');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT * 
            FROM tb_descritores 
            WHERE id = :ID 
            LIMIT 1', 
            array(':ID' => $id)
        );
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            DELETE FROM tb_descritores 
            WHERE id = :ID', 
            array(':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function editById(int $id, int $id_sistema, string $descritor, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            UPDATE tb_descritores 
            SET id_sistema = :ID_SISTEMA, descritor = :DESCRITOR, descricao = :DESCRICAO 
            WHERE id = :ID', 
            array(':ID_SISTEMA' => $id_sistema, ':DESCRITOR' => $descritor, ':DESCRICAO' => $descricao, ':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function create(int $id_sistema, string $descritor, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            INSERT INTO tb_descritores (id_sistema, descritor, descricao) 
            VALUES (:ID_SISTEMA, :DESCRITOR, :DESCRICAO)', 
            array(':ID_SISTEMA' => $id_sistema, ':DESCRITOR' => $descritor, ':DESCRICAO' => $descricao)
        );
        return $result->rowCount();
    }
}
