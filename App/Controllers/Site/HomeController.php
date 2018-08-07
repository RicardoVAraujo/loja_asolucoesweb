<?php

namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Models\Site\User;

class HomeController extends BaseController{
    
    public function index() {
        
        $user = new User;
        dump($user->fetchAll());
        
//        $dados = [
//            'titulo' => "CIAL | Loja Virtual"
//        ];        
        $template = $this->twig->loadTemplate('site_home.html');
        $template->display($dados);
    }
}
