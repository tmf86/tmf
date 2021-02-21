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
    private $config;
    /**
     * @var array
     */
    private $vars;
    /**
     * @var bool
     */
    private $use_templating;

    /**
     * View constructor.
     * @param string $view_name
     * @param array $vars
     */
    public function __construct(string $view_name, array $vars = [], bool $use_templating = true)
    {
        $this->config = require "config/config.php";
        $this->view_name = $view_name;
        $this->vars = $vars;
        $this->use_templating = $use_templating;
        $this->view();
    }

    /**
     * @return void
     */
    public function view()
    {
        if ($this->use_templating) {
            if (strpos($this->view_name, ".")) {
                $this->view_name = str_replace('.', '/', $this->view_name);
                extract($this->vars);
                require "template/top.php";
                require sprintf("%s%s.php", $this->config["views_directory"], $this->view_name);
                require "template/bottom.php";
            } else {
                extract($this->vars);
                require "template/top.php";
                require sprintf("%s%s.php", $this->config["views_directory"], $this->view_name);
                require "template/bottom.php";
            }
        } else {
            if (strpos($this->view_name, ".")) {
                $this->view_name = str_replace('.', '/', $this->view_name);
                extract($this->vars);
                require sprintf("%s%s.php", $this->config["views_directory"], $this->view_name);
            } else {
                extract($this->vars);
                require sprintf("%s%s.php", $this->config["views_directory"], $this->view_name);
            }
        }
    }


}