<?php
namespace Application\models;

use Application\core\Database;
use PDO;

class Alinhamentos
{
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT tb_alinhamentos.*, tb_habilidades.habilidade, tb_descritores.descritor
            FROM tb_alinhamentos
            LEFT JOIN tb_habilidades ON tb_alinhamentos.id_habilidade = tb_habilidades.id
            LEFT JOIN tb_descritores ON tb_alinhamentos.id_descritor = tb_descritores.id
        ');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT * 
            FROM tb_alinhamentos 
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
            DELETE FROM tb_alinhamentos 
            WHERE id = :ID', 
            array(':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function editById(int $id, int $id_habilidade, int $id_descritor, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            UPDATE tb_alinhamentos 
            SET id_habilidade = :ID_HABILIDADE, id_descritor = :ID_DESCRITOR, descricao = :DESCRICAO 
            WHERE id = :ID', 
            array(':ID_HABILIDADE' => $id_habilidade, ':ID_DESCRITOR' => $id_descritor, ':DESCRICAO' => $descricao, ':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function create(int $id_habilidade, int $id_descritor, string $descricao)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            INSERT INTO tb_alinhamentos (id_habilidade, id_descritor, descricao) 
            VALUES (:ID_HABILIDADE, :ID_DESCRITOR, :DESCRICAO)', 
            array(':ID_HABILIDADE' => $id_habilidade, ':ID_DESCRITOR' => $id_descritor, ':DESCRICAO' => $descricao)
        );
        return $result->rowCount();
    }
}
