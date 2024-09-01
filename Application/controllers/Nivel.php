<?php

use Application\core\Controller;

class Nivel extends Controller
{
    public function index()
    {
        $Niveis = $this->model('Niveis');
        $data = $Niveis::findAll();
        $this->view('nivel/index', ['niveis' => $data]);
    }

    public function deleteById($id = null)
    {
        if (is_numeric($id)) {
            $Niveis = $this->model('Niveis');
            $Niveis::deleteById($id);
            $this->redirect('nivel/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nivel = $_POST['nivel'];
            $descricao = $_POST['descricao'];

            $Niveis = $this->model('Niveis');
            $Niveis::create($nivel, $descricao);

            $this->redirect('nivel/index');
        } else {
            $this->pageNotFound();
        }
    }
}
