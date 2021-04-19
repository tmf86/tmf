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
     * @var bool
     */
    private $break;
    /**
     * @var false|string
     */
    private $directory;

    /**
     * View constructor.
     * @param string $view_name
     * @param array $vars
     * @param bool $use_templating
     * @param int $code
     * @param bool $die
     */
    public function __construct(string $view_name, array $vars = [], bool $use_templating = true, int $code = 200, bool $die = true)
    {
        $this->view_name = $this->makePath($view_name);
        $this->directory = $this->getDirectory();
        $this->vars = $vars;
        $this->use_templating = $use_templating;
        $this->break = $die;
        $this->view($code);
    }

    /**
     * @param string $directory
     */
    private function requireTemplateWithSwychCase(string $directory)
    {

//        } else {
//            $this->requireTemplate(VIEW_DIRECTORY, $this->view_name);
//        }
//        if ($this->break) {
//            die();
//        }
    }

    private function requireWithTemplate(int $code = 200)
    {
//        http_response_code($code);
        extract($this->vars);
        require sprintf('%stemplate/%s.top.php', VIEW_DIRECTORY, $this->directory);
        require sprintf('%s%s.php', VIEW_DIRECTORY, $this->view_name);
        require sprintf('%stemplate/%s.bottom.php', VIEW_DIRECTORY, $this->directory);

    }

    private function requireWithoutTemplate(int $code = 200)
    {
//        http_response_code($code);
        extract($this->vars);
        require sprintf('%s%s.php', VIEW_DIRECTORY, $this->view_name);
    }

    /**
     * @return false|string
     */
    private function getDirectory()
    {
        return substr($this->view_name, 0, mb_stripos($this->view_name, '/'));
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
    public function view(int $code = 200)
    {
        ($this->use_templating) ? $this->requireWithTemplate($code) : $this->requireWithoutTemplate($code);
        if ($this->break) {
            die();
        }
        return $this;
    }


}