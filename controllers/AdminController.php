<?php
class AdminController extends Controller
{
    private $pageTpl = "/views/adminView.php";
    public function __construct()
    {
        $this->model = new AdminModel();
        $this->view = new View();
        $this->beforeAction();
    }
    public function index()
    {
        $this->pageData['problem'] = $this->model->renderProblem();
        if ($_POST) {
            $this->model->addRating();
            header("Location: /admin");
        }
        $this->model->renderRating();
        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function beforeAction()
    {
        if($_SESSION['user'] != 'user 2' ){
            header("Location: /user");

        }
    }
}
?>
