<?php

require_once "app/libraries/SimpleImage.php";

class HomeModel extends Model
{
    protected $table = 'tasks';

    public function save($data)
    {
        if (isset($_FILES['image'])) {
            $simpleImage = new SimpleImage();

            $simpleImage->load($_FILES['image']['tmp_name']);

            $simpleImage->resize(320, 240);

            $imagePath = 'images/image_'.time().'.jpg';

            $simpleImage->save($imagePath);

            $rows = $data;

            $rows['image_path'] = $imagePath;
        }

        if (! $this->mysql->insert('tasks', $rows)) {
            return 'error';
        }

        return 'Saved';
    }

    public function update($data)
    {
        return $this->mysql->update($this->table, $data);
    }

    public function getFirst($id)
    {
        return $this->mysql->getOne($this->table, $id);
    }
}
