<?php

use App\Classes\Template;
use App\Classes\Parameters;

$template = new Template;
$twig = $template->init();

//adicionando a url do site
$twig->addFunction($site_url);



/**
* chamando o controller digitado atraves na url
* http://localhost:8080/controller
*/
$callController = new App\Controllers\Controller;
$calledController = $callController->controller();
$controller = new $calledController();
$controller->setTwig($twig);

/**
* chamando o metodo digitado atraves na url
 * http://localhost:8080/controller/method
*/
$callMethod = new App\Controllers\Method;
$method = $callMethod->method($controller);

/**
* chamando o controller atraves da classe controller e da classe method
*/

$parameters = new Parameters;
$parameter = $parameters->getParameterMethod($controller, $method);
$controller->$method($parameter);
