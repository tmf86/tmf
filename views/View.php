<?php

namespace View;

class View
{
    /**
     * @var string
     */
    private $view_name;
    /**
     * @var array
     */
    private $vars;
    /**
     * @var bool
     */
    private $use_templating;
    /**
     * @var false
     */
    private bool $is_email_view;

    /**
     * View constructor.
     * @param string $view_name
     * @param array $vars
     */
    public function __construct(string $view_name, array $vars = [], bool $use_templating = true)
    {
        $this->view_name = $this->makePath($view_name);
        $this->vars = $vars;
        $this->use_templating = $use_templating;
        $this->view();
    }

    /**
     * @param string $directory
     */
    private function requireTemplateWithSwychCase(string $directory)
    {
        if ($this->use_templating) {
            switch ($directory) {
                case 'pages':
                    $this->requireTemplate(VIEW_DIRECTORY, 'template/pages.top');
                    $this->requireTemplate(VIEW_DIRECTORY, $this->view_name);
                    $this->requireTemplate(VIEW_DIRECTORY, 'template/pages.bottom');
                    break;
            }
        } else {
            $this->requireTemplate(VIEW_DIRECTORY, $this->view_name);
        }
    }

    /**
     * @param string ...$path
     */
    private function requireTemplate(string ...$path)
    {
        extract($this->vars);
        $paths = implode('', $path);
        require sprintf('%s.php', $paths);
    }

    /**
     * @param string $path
     * @return false|string
     */
    private function getDirectory(string $path)
    {
        return substr($path, 0, mb_stripos($path, '/'));
    }

    /**
     * @param $onformat
     * @return string|string[]
     */
    private function makePath($onformat)
    {
        return str_replace('.', '/', $onformat);
    }

    /**
     * @return $this
     */
    public function view()
    {
        $directory = $this->getDirectory($this->view_name);
        $this->requireTemplateWithSwychCase($directory);
        return $this;
    }


}