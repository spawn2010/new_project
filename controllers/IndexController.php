<?php

class IndexController extends Controller
{
    private $pageTpl = '/views/indexView.php';

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }
    public function index()
    {
        $this->pageData['title'] = "Вход в личный кабинет";
        //var_dump($_POST);
        if($_POST['add']){
            if ($_POST['login']&&$_POST['password'] != ''){
           $this->model->addUser();
            $this->pageData['error'] = "Вы успешно зарегестрированы";
        }else{
                $this->pageData['error'] = "Введите логин и пароль";
            }
        }
        if (!empty($_POST['check'])) {
            if (!$this->model->checkUser()) {
                $this->pageData['error'] = "Неправильный логин или пароль";
            }
        }
        $this->view->render($this->pageTpl, $this->pageData);
    }
}