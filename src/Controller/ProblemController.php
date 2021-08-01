<?php

namespace src\Controller;

use src\Model\ProblemModel;
use src\Core\View;
use src\Core\Controller;

class ProblemController extends Controller
{

    public string $pageTpl = "/views/userView.php";

    public function __construct()
    {
        $this->beforeAction();
        $this->model = new ProblemModel();
        $this->view = new View();
    }

<<<<<<< HEAD
    public function index (): void
=======
    public function index()
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80
    {
        $this->pageData['problem'] = $this->model->getTable();
        if ($_SESSION['auth']) {
            $this->model->getTable();
        }
        $this->view->render($this->pageTpl, $this->pageData);
    }

<<<<<<< HEAD
    public function addProblem (): void
=======
    public function addProblem()
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80
    {
        if (!empty($_POST['problem']) && !empty($_POST['decision'])) {
            $data = $_POST;
            $this->model->addProblem($data);
        }
        header_remove();
        $this->redirect('/problem');
    }

<<<<<<< HEAD
    public function addRating (): void
=======
    public function addRating()
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80
    {
        if ($_POST) {
            $data = $_POST;
            $this->model->addRating($data);
        }
        header_remove();
        $this->redirect('/problem');
    }

<<<<<<< HEAD
    public function beforeAction (): void
=======
    public function beforeAction()
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80
    {
        if ($_SESSION['auth']['name'] === 'admin') {
            $this->pageTpl = "/views/adminView.php";
        }
    }
}


