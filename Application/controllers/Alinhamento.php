<?php
use Application\core\Controller;

class Alinhamento extends Controller
{
    public function index()
    {
        $Alinhamentos = $this->model('Alinhamentos');
        $Habilidades = $this->model('Habilidades');
        $Descritores = $this->model('Descritores');
        
        $data['alinhamentos'] = $Alinhamentos::findAll();
        $data['habilidades'] = $Habilidades::findAll();
        $data['descritores'] = $Descritores::findAll();
        
        $this->view('alinhamento/index', $data);
    }

    public function deleteById($id = null)
    {
        if (is_numeric($id)) {
            $Alinhamentos = $this->model('Alinhamentos');
            $Alinhamentos::deleteById($id);
            $this->redirect('alinhamento/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_habilidade = $_POST['id_habilidade'];
            $id_descritor = $_POST['id_descritor'];
            $descricao = $_POST['descricao'];

            $Alinhamentos = $this->model('Alinhamentos');
            $Alinhamentos::create($id_habilidade, $id_descritor, $descricao);

            $this->redirect('alinhamento/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $id_habilidade = $_POST['id_habilidade'];
            $id_descritor = $_POST['id_descritor'];
            $descricao = $_POST['descricao'];

            if (is_numeric($id)) {
                $Alinhamentos = $this->model('Alinhamentos');
                $Alinhamentos::editById($id, $id_habilidade, $id_descritor, $descricao);

                $this->redirect('alinhamento/index');
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }
}
