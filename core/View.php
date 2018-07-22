<?php
namespace Core;

class View
{
    public $templateView = 'master.php';

    public function generate($contentView, $data = null)
    {
        if(is_readable('app/Views/'.$this->templateView)) {
            include 'app/Views/'.$this->templateView;
        }

    }
}
