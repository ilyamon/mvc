<?php


class ControllerAdmin extends Controller
{

    /**
     * ControllerBlog constructor.
     */
    public function __construct()
    {
        $this->model = new ModelAdmin();
        $this->view = new ViewAdmin();

    }


    public function mainAction()
    {
        $this->view->generate('admin_main_view.php');
    }

    /**
     * data -> All Articles
     * view Home
     */
    public function indexAction()
    {
        $data = $this->model->getPosts();
        $this->view->generate('admin_articles_view.php', $data);
    }


    /**
     *
     */
    public function usersAction()
    {
        $data = $this->model->getUsers();
        $this->view->generate('admin_users_view.php', $data);
    }


    /**
     *
     */
    public function addAction()
    {
        $data = $this->model->addArticle();
        $this->view->generate('admin_add_articles_view.php', $data);
    }

    /**
     * @param $myKey
     */
    public function deleteAction($myKey)
    {
        if (!empty($myKey)) {
            $this->model->deleteArticle($myKey);
            header('Location: /admins/index');
        }
        $data = $this->model->getPosts();
        $this->view->generate('admin_articles_view.php', $data);
    }


    /**
     * @param $myKey
     */
    public function deleteUserAction($myKey)
    {
        if (!empty($myKey)) {
            $this->model->deleteUser($myKey);
            header('Location: /admins/users');
        }
        $data = $this->model->getUsers();
        $this->view->generate('admin_users_view.php', $data);
    }


    /**
     * @param $myKey
     */
    public function editAction($myKey)
    {
        if(isset($_POST) && !empty($_POST) && !empty($myKey)){
            $this->model->updateArticle( $_POST, $myKey );
            header('Location: /admins/index?' . $myKey);
        }

        $data = $this->model->getOneArticle($myKey);
        $this->view->generate('admin_edit_view.php', $data);
    }




}