<?php
use Application\core\Controller;

class Objeto extends Controller
{
    public function index()
    {
        $Objetos = $this->model('Objetos');
        $Unidades = $this->model('Unidades');
        $Anos = $this->model('Anos');
        
        $data['objetos'] = $Objetos::findAll();
        $data['unidades'] = $Unidades::findAll();
        $data['anos'] = $Anos::findAll();
        
        $this->view('objeto/index', $data);
    }

    public function deleteById($id = null)
    {
        if (is_numeric($id)) {
            $Objetos = $this->model('Objetos');
            $Objetos::deleteById($id);
            $this->redirect('objeto/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_unidade = $_POST['id_unidade'];
            $id_ano = $_POST['id_ano'];
            $objeto = $_POST['objeto'];

            $Objetos = $this->model('Objetos');
            $Objetos::create($id_unidade, $id_ano, $objeto);

            $this->redirect('objeto/index');
        } else {
            $this->pageNotFound();
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $id_unidade = $_POST['id_unidade'];
            $id_ano = $_POST['id_ano'];
            $objeto = $_POST['objeto'];

            if (is_numeric($id)) {
                $Objetos = $this->model('Objetos');
                $Objetos::editById($id, $id_unidade, $id_ano, $objeto);

                $this->redirect('objeto/index');
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }
}
