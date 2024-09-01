<?php
namespace Application\models;

use Application\core\Database;
use PDO;

class Anos
{
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT tb_anos.*, tb_niveis.nivel 
            FROM tb_anos 
            LEFT JOIN tb_niveis ON tb_anos.id_nivel = tb_niveis.id
        ');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT * 
            FROM tb_anos 
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
            DELETE FROM tb_anos 
            WHERE id = :ID', 
            array(':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function editById(int $id, int $id_nivel, string $ano)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            UPDATE tb_anos 
            SET id_nivel = :ID_NIVEL, ano = :ANO 
            WHERE id = :ID', 
            array(':ID_NIVEL' => $id_nivel, ':ANO' => $ano, ':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function create(int $id_nivel, string $ano)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            INSERT INTO tb_anos (id_nivel, ano) 
            VALUES (:ID_NIVEL, :ANO)', 
            array(':ID_NIVEL' => $id_nivel, ':ANO' => $ano)
        );
        return $result->rowCount();
    }
}
