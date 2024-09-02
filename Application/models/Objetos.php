<?php
namespace Application\models;

use Application\core\Database;
use PDO;

class Objetos
{
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT tb_objetos.*, tb_unidades.unidade, tb_anos.ano 
            FROM tb_objetos 
            LEFT JOIN tb_unidades ON tb_objetos.id_unidade = tb_unidades.id
            LEFT JOIN tb_anos ON tb_objetos.id_ano = tb_anos.id
        ');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT * 
            FROM tb_objetos 
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
            DELETE FROM tb_objetos 
            WHERE id = :ID', 
            array(':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function editById(int $id, int $id_unidade, int $id_ano, string $objeto)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            UPDATE tb_objetos 
            SET id_unidade = :ID_UNIDADE, id_ano = :ID_ANO, objeto = :OBJETO 
            WHERE id = :ID', 
            array(':ID_UNIDADE' => $id_unidade, ':ID_ANO' => $id_ano, ':OBJETO' => $objeto, ':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function create(int $id_unidade, int $id_ano, string $objeto)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            INSERT INTO tb_objetos (id_unidade, id_ano, objeto) 
            VALUES (:ID_UNIDADE, :ID_ANO, :OBJETO)', 
            array(':ID_UNIDADE' => $id_unidade, ':ID_ANO' => $id_ano, ':OBJETO' => $objeto)
        );
        return $result->rowCount();
    }
    
}
