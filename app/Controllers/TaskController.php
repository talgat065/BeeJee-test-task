<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\TaskModel;

class TaskController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->model = new TaskModel();
    }

    public function index($query = [])
    {
        $sort = isset($query['orderBy']) ? $query['orderBy'] : 'id';
        $page = isset($query['page']) ? $query['page'] : 1;

        $this->view->generate('task.php', $this->model->getData($sort, $page));
    }

    public function create()
    {
        $this->view->generate('create.php');
    }

    public function edit($query)
    {
        $id = $query['id'];

        $data = $this->model->getFirst($id);

        $this->view->generate('edit.php', $data[0]);
    }

    public function store()
    {
        $data['user_name'] = $_POST['user_name'];

        $data['email'] = $_POST['email'];

        $data['text'] = $_POST['text'];

        $this->model->save($data);

        header('Location: '.'/');
    }

    public function update()
    {
        $data['text'] = $_POST['text'];

        $data['status'] = $_POST['status'];

        $data['id'] = $_POST['id'];

        if ($this->model->update($data)) {
            $data['message'] = 'Error';

            header('Location: '.'/');
        }
    }
}
