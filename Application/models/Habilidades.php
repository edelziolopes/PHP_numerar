<?php
namespace Application\models;

use Application\core\Database;
use PDO;

class Habilidades
{
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT tb_habilidades.*, tb_objetos.objeto 
            FROM tb_habilidades 
            LEFT JOIN tb_objetos ON tb_habilidades.id_objeto = tb_objetos.id
        ');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT * 
            FROM tb_habilidades 
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
            DELETE FROM tb_habilidades 
            WHERE id = :ID', 
            array(':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function editById(int $id, int $id_objeto, string $habilidade, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            UPDATE tb_habilidades 
            SET id_objeto = :ID_OBJETO, habilidade = :HABILIDADE, descricao = :DESCRICAO 
            WHERE id = :ID', 
            array(':ID_OBJETO' => $id_objeto, ':HABILIDADE' => $habilidade, ':DESCRICAO' => $descricao, ':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function create(int $id_objeto, string $habilidade, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            INSERT INTO tb_habilidades (id_objeto, habilidade, descricao) 
            VALUES (:ID_OBJETO, :HABILIDADE, :DESCRICAO)', 
            array(':ID_OBJETO' => $id_objeto, ':HABILIDADE' => $habilidade, ':DESCRICAO' => $descricao)
        );
        return $result->rowCount();
    }
}
