<?php

class ControllerMain extends Controller
{
    /**
     * ControllerBlog constructor.
     */
    public function __construct()
    {
        $this->model = new ModelMain();

        parent::__construct();
    }


    /**
     * @param $myKey
     */
    public function postAction($myKey)
    {
        $data = $this->model->getContentOneNews($myKey);
        $this->view->generate('single_view.php', $data);
    }

    /**
     *
     */
    public function registerAction()
    {
        $data = $this->model->registerUser($_POST);
        $this->view->generate('register_view.php', $data);
    }

    /**
     *
     */
    public function searchAction()
    {
        if (array_key_exists('search_q', $_POST)){
            $data = $this->model->search($_POST);
        }
        $this->view->generate('search_view.php', $data);
    }






}