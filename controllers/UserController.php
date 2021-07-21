<?php

class UserController extends Controller
{
    private $pageTpl = "/views/userView.php";

    public function __construct()
    {
        $this->beforeAction();
        $this->model = new UserModel();
        $this->view = new View();
    }

    public function index()
    {
        $this->pageData['problem'] = $this->model->renderProblem();
        if (!empty($_POST['problem']) && !empty($_POST['decision'])) {
            $this->model->addProblem();
            header("Location: /User");
        }
        $this->model->renderProblem();
        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function beforeAction()
    {
        if($_SESSION['user'] != 'user 1' ){
            header("Location: /admin");

        }
    }


}

?>