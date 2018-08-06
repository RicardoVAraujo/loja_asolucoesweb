<?php

namespace App\Controllers;

use App\Classes\Uri;

class Method{
    private $uri;
   

    public function __construct(){
        $this->uri = new Uri();
    }

    private function get_Method(){
        if(!$this->uri->emptyUri()):
            $explodeUri = array_filter(explode('/', $this->uri->getUri() ));
            return (isset($explodeUri[2]) ? $explodeUri[2] : null);
        endif;
    }
    
    public function method($object){
        if(method_exists($object, $this->get_Method())):
            return $this->get_Method();
        endif;
        
        return DEFAULT_METHOD;
    }
}
