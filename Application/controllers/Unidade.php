<?php
use Application\core\Controller;

class Unidade extends Controller
{
    public function index()
    {
        $Unidades = $this->model('Unidades');
        $data = $Unidades::findAll();
        $this->view('unidade/index', ['unidades' => $data]);
    }

    public function deleteById($id = null)
    {
        if (is_numeric($id)) {
            $Unidades = $this->model('Unidades');
            $Unidades::deleteById($id);
            $this->redirect('unidade/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $unidade = $_POST['unidade'];
            $descricao = $_POST['descricao'];

            $Unidades = $this->model('Unidades');
            $Unidades::create($unidade, $descricao);

            $this->redirect('unidade/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $unidade = $_POST['unidade'];
            $descricao = $_POST['descricao'];

            if (is_numeric($id)) {
                $Unidades = $this->model('Unidades');
                $Unidades::editById($id, $unidade, $descricao);

                $this->redirect('unidade/index');
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }
}
