<?php
namespace Core;

class View
{
    protected $templateView = 'master.php';

    protected $path = 'app/Views/';

    /**
     * @param $contentView
     * @param null $data
     * @throws \Exception
     */
    public function generate($contentView, $data = null)
    {
        $contentPath = $this->path . $contentView;
        if(is_readable($this->path.$this->templateView)) {
            $this->render($contentPath, $data);
        } else {
            throw new \Exception("Template $this->templateView not found.");
        }

    }

    protected function render($contentPath, $data)
    {
        require_once $this->path.$this->templateView;
    }
}
