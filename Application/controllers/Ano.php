<?php
use Application\core\Controller;

class Ano extends Controller
{
    public function index()
    {
        $Anos = $this->model('Anos');
        $Niveis = $this->model('Niveis');
        $data['anos'] = $Anos::findAll();
        $data['niveis'] = $Niveis::findAll();
        $this->view('ano/index', $data);
    }

    public function deleteById($id = null)
    {
        if (is_numeric($id)) {
            $Anos = $this->model('Anos');
            $Anos::deleteById($id);
            $this->redirect('ano/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_nivel = $_POST['id_nivel'];
            $ano = $_POST['ano'];

            $Anos = $this->model('Anos');
            $Anos::create($id_nivel, $ano);

            $this->redirect('ano/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $id_nivel = $_POST['id_nivel'];
            $ano = $_POST['ano'];

            if (is_numeric($id)) {
                $Anos = $this->model('Anos');
                $Anos::editById($id, $id_nivel, $ano);

                $this->redirect('ano/index');
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }
}
