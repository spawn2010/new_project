<?php

namespace app\Controller;

use app\Model\ProblemModel;
use app\Core\Controller;
use Doctrine\DBAL\Exception;

class ProblemController extends Controller
{
    public string $pageTpl = "/views/userView.php";
    private ProblemModel $model;

    public function __construct()
    {
        parent::__construct();
        $this->beforeAction();
        $this->model = new ProblemModel();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $this->pageData['problem'] = $this->model->getAll('problem');
        if ($_SESSION['auth']) {
            $this->model->getAll('problem');
        }
        $this->view->render($this->pageTpl, $this->pageData);
    }

    /**
     * @throws Exception
     */
    public function addProblem(): void
    {
        if (!empty($_POST['problem']) && !empty($_POST['decision'])) {
            $data = $_POST;
            $this->model->addProblem($data);
        }
        header_remove();
        $this->redirect('/problem');
    }

    /**
     * @throws Exception
     */
    public function addRating(): void
    {
        if ($_POST) {
            $data = $_POST;
            $this->model->addRating($data);
        }
        header_remove();
        $this->redirect('/problem');
    }

    public function beforeAction(): void
    {
        if ($_SESSION['auth']['name'] === 'admin') {
            $this->pageTpl = "/views/adminView.php";
        }
    }
}


