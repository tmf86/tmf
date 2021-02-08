<?php


namespace Contoller\HttpRequest;


class Request{
    public function ajax(){
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
    }

}