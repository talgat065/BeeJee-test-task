<?php
namespace App\Controllers;

use App\Models\AuthModel;

class AuthController extends \Core\Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new AuthModel();
    }

    public function signIn()
    {
        $this->view->generate('login.php');
    }

    public function login()
    {
        if (! $this->model->checkAuth()) {
            $this->view->generate('login.php', 'Incorrect login or password ');
        }

        $this->view->generate('login.php');
    }

    public function logout()
    {
        $this->model->logout();
        $this->view->generate('login.php');
    }
}
