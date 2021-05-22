<?php


namespace Contoller;


class AdminController extends Controller
{
    public function index(){
        $this->load_views("admin.home.login",[],false);
    }
}