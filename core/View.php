<?php
namespace Core;

class View
{
    public $templateView = 'master.php';

    public function generate($contentView, $data = null)
    {
        include 'app/views/'.$this->templateView;
    }
}
