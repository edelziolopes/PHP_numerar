<?php
use Application\core\Controller;

class Descritor extends Controller
{
    public function index()
    {
        $Descritores = $this->model('Descritores');
        $Sistemas = $this->model('Sistemas');
        
        $data['descritores'] = $Descritores::findAll();
        $data['sistemas'] = $Sistemas::findAll();
        
        $this->view('descritor/index', $data);
    }

    public function deleteById($id = null)
    {
        if (is_numeric($id)) {
            $Descritores = $this->model('Descritores');
            $Descritores::deleteById($id);
            $this->redirect('descritor/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_sistema = $_POST['id_sistema'];
            $descritor = $_POST['descritor'];
            $descricao = $_POST['descricao'];

            $Descritores = $this->model('Descritores');
            $Descritores::create($id_sistema, $descritor, $descricao);

            $this->redirect('descritor/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $id_sistema = $_POST['id_sistema'];
            $descritor = $_POST['descritor'];
            $descricao = $_POST['descricao'];

            if (is_numeric($id)) {
                $Descritores = $this->model('Descritores');
                $Descritores::editById($id, $id_sistema, $descritor, $descricao);

                $this->redirect('descritor/index');
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }
}
