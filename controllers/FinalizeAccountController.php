<?php


namespace Contoller;


use Contoller\Http\Request;

class FinalizeAccountController extends Controller
{

    public function index(Request $request, string $email)
    {
        $scripts = [
            sprintf("<script src='%spublic/js/functions.js'></script>", rootUrl()),
            sprintf("<script src='%spublic/js/script.js'></script>", rootUrl())
        ];
        return $this->load_views("pages.finalize_account_creation", compact('scripts'));
    }
}