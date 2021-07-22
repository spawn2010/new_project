<?php

class ProblemController extends Controller
    {
    public $pageTpl = "/views/userView.php";

    public function __construct()
        {
        $this->beforeAction();
        $this->model = new ProblemModel();
        $this->view = new View();
        }

    public function index()
        {
        $this->pageData['problem'] = $this->model->getProblem();
        if ($_SESSION['user'] == 'user 1')
            {
            $this->model->getProblem();
            }
        if ($_SESSION['user'] == 'user 2')
            {
            $this->model->getRating();
            }
        $this->view->render($this->pageTpl, $this->pageData);
        }

    public function addProblem()
        {
        if (!empty($_POST['problem']) && !empty($_POST['decision']))
            {
            $data = $_POST;
            $this->model->addProblem($data);
            }
        header_remove();
        $this->redirect('/problem');
        }

    public function addRating()
        {
        if ($_POST)
            {
            $data = $_POST;
            $this->model->addRating($data);
            }
        header_remove();
        $this->redirect('/problem');
        }

    public function beforeAction()
        {
        if ($_SESSION['right'])
            {
            $this->pageTpl = "/views/adminView.php";
            }
        }
    }


