<?php

namespace App\Controllers;

class BaseController {
    
    protected $twig;
    
    function setTwig($twig) {
        $this->twig = $twig;
    }


}
