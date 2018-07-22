<?php
namespace App\Models;

class AuthModel extends \Core\Model
{
    protected $table = 'users';

    protected $login = 'admin';

    protected $password = '123';

    public function checkAuth()
    {
        if (! $this->login === $_POST['login'] && $this->password === $_POST['password']) {
            return false;
        }

        $_SESSION['user'] = $this->login;

        return true;
    }

    public function logout()
    {
        unset($_SESSION['user']);

        return true;
    }
}
