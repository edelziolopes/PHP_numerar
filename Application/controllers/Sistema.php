<?php
use Application\core\Controller;

class Sistema extends Controller
{
    public function index()
    {
        $Sistemas = $this->model('Sistemas');
        $data = $Sistemas::findAll();
        $this->view('sistema/index', ['sistemas' => $data]);
    }

    public function deleteById($id = null)
    {
        if (is_numeric($id)) {
            $Sistemas = $this->model('Sistemas');
            $Sistemas::deleteById($id);
            $this->redirect('sistema/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sistema = $_POST['sistema'];
            $uf = $_POST['uf'];
            $descricao = $_POST['descricao'];

            $Sistemas = $this->model('Sistemas');
            $Sistemas::create($sistema, $uf, $descricao);

            $this->redirect('sistema/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $sistema = $_POST['sistema'];
            $uf = $_POST['uf'];
            $descricao = $_POST['descricao'];

            if (is_numeric($id)) {
                $Sistemas = $this->model('Sistemas');
                $Sistemas::editById($id, $sistema, $uf, $descricao);

                $this->redirect('sistema/index');
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }
}
