<?php
use Application\core\Controller;

class Habilidade extends Controller
{
    public function index()
    {
        $Habilidades = $this->model('Habilidades');
        $Objetos = $this->model('Objetos');
        
        $data['habilidades'] = $Habilidades::findAll();
        $data['objetos'] = $Objetos::findAll();
        
        $this->view('habilidade/index', $data);
    }

    public function deleteById($id = null)
    {
        if (is_numeric($id)) {
            $Habilidades = $this->model('Habilidades');
            $Habilidades::deleteById($id);
            $this->redirect('habilidade/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_objeto = $_POST['id_objeto'];
            $habilidade = $_POST['habilidade'];
            $descricao = $_POST['descricao'];

            $Habilidades = $this->model('Habilidades');
            $Habilidades::create($id_objeto, $habilidade, $descricao);

            $this->redirect('habilidade/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $id_objeto = $_POST['id_objeto'];
            $habilidade = $_POST['habilidade'];
            $descricao = $_POST['descricao'];

            if (is_numeric($id)) {
                $Habilidades = $this->model('Habilidades');
                $Habilidades::editById($id, $id_objeto, $habilidade, $descricao);

                $this->redirect('habilidade/index');
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }
}
