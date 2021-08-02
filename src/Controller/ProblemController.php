<?php

namespace app\Controller;

use app\Model\ProblemModel;
use app\Core\View;
use app\Core\Controller;

class ProblemController extends Controller
{

    public string $pageTpl = "/views/userView.php";

    public function __construct ()
    {
        $this->beforeAction();
        $this->model = new ProblemModel();
        $this->view = new View();
    }

    public function index (): void
    {
        $this->pageData['problem'] = $this->model->getTable();
        if ($_SESSION['auth']) {
            $this->model->getTable();
        }
        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function addProblem (): void
    {
        if (!empty($_POST['problem']) && !empty($_POST['decision'])) {
            $data = $_POST;
            $this->model->addProblem($data);
        }
        header_remove();
        $this->redirect('/problem');
    }

    public function addRating (): void
    {
        if ($_POST) {
            $data = $_POST;
            $this->model->addRating($data);
        }
        header_remove();
        $this->redirect('/problem');
    }

    public function beforeAction (): void
    {
        if ($_SESSION['auth']['name'] === 'admin') {
            $this->pageTpl = "/views/adminView.php";
        }
    }
}


