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

    public function __construct(string $view_name, array $vars = [])
    {
        $this->config = require "config/config.php";
        $this->view_name = $view_name;
        $this->vars = $vars;
        $this->view();

    }

    public function view()
    {
        if (strpos($this->view_name, ".")) {
            $this->view_name = str_replace('.', '/', $this->view_name);
            extract($this->vars);
            require "template/top.php";
            require sprintf("%s%s.php", $this->config["views_directory"], $this->view_name);
            require "template/bottom.php";
        } else {
            require sprintf("%s%s.php", $this->config["views_directory"], $this->view_name);
        }
    }


}