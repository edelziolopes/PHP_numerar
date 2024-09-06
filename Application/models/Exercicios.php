<?php
namespace Application\models;

use Application\core\Database;
use PDO;

class Exercicios
{
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT tb_exercicios.*, tb_alinhamentos.descricao AS alinhamento
            FROM tb_exercicios
            LEFT JOIN tb_alinhamentos ON tb_exercicios.id_alinhamento = tb_alinhamentos.id
        ');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            SELECT * 
            FROM tb_exercicios 
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
            DELETE FROM tb_exercicios 
            WHERE id = :ID', 
            array(':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function editById(int $id, int $id_alinhamento, string $titulo, string $descricao, int $situacao)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            UPDATE tb_exercicios 
            SET id_alinhamento = :ID_ALINHAMENTO, titulo = :TITULO, descricao = :DESCRICAO, situacao = :SITUACAO 
            WHERE id = :ID', 
            array(':ID_ALINHAMENTO' => $id_alinhamento, ':TITULO' => $titulo, ':DESCRICAO' => $descricao, ':SITUACAO' => $situacao, ':ID' => $id)
        );
        return $result->rowCount();
    }

    public static function create(int $id_alinhamento, string $titulo, string $descricao, int $situacao)
    {
        $conn = new Database();
        $result = $conn->executeQuery('
            INSERT INTO tb_exercicios (id_alinhamento, titulo, descricao, situacao) 
            VALUES (:ID_ALINHAMENTO, :TITULO, :DESCRICAO, :SITUACAO)', 
            array(':ID_ALINHAMENTO' => $id_alinhamento, ':TITULO' => $titulo, ':DESCRICAO' => $descricao, ':SITUACAO' => $situacao)
        );
        return $result->rowCount();
    }
}
