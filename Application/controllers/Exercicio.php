<?php
use Application\core\Controller;

class Exercicio extends Controller
{
    public function index()
    {
        $Exercicios = $this->model('Exercicios');
        $Alinhamentos = $this->model('Alinhamentos');
        
        $data['exercicios'] = $Exercicios::findAll();
        $data['alinhamentos'] = $Alinhamentos::findAll();
        
        $this->view('exercicio/index', $data);
    }

    public function deleteById($id = null)
    {
        if (is_numeric($id)) {
            $Exercicios = $this->model('Exercicios');
            $Exercicios::deleteById($id);
            $this->redirect('exercicio/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_alinhamento = $_POST['id_alinhamento'];
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $situacao = $_POST['situacao'];

            $Exercicios = $this->model('Exercicios');
            $Exercicios::create($id_alinhamento, $titulo, $descricao, $situacao);

            $this->redirect('exercicio/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $id_alinhamento = $_POST['id_alinhamento'];
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $situacao = $_POST['situacao'];

            if (is_numeric($id)) {
                $Exercicios = $this->model('Exercicios');
                $Exercicios::editById($id, $id_alinhamento, $titulo, $descricao, $situacao);

                $this->redirect('exercicio/index');
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }
}
