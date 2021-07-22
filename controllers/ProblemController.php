<?php

class ProblemController extends Controller
    {
    public function __construct()
        {
        $this->model = new ProblemModel();
        $this->view = new View();
        }

    public function index()
        {
        $this->pageData['problem'] = $this->model->getProblem();
        if ($_SESSION['user'] == 'user 1')
            {
            $pageTpl = "/views/userView.php";
            $this->model->getProblem();
            $this->view->render($pageTpl, $this->pageData);
            }
        if ($_SESSION['user'] == 'user 2')
            {
            $pageTpl = "/views/adminView.php";
            $this->model->getRating();
            $this->view->render($pageTpl, $this->pageData);
            }
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
    }


