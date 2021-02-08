<?php
$config = [];
/*
 * partie de la configuration reservé a la base de donné
 */
$config["db_name"] = "cpy";
$config["db_user"] = "root";
$config["db_password"] = "";
/**
 * configuration reserver a la gestion de fichier
 */

$config["views_directory"] = "view/";
/**
 * Root path
 */
$config["app_url"] = "http://localhost/Cpy-Mvc/";

return $config;