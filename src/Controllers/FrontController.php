<?php

class FrontController implements IController
{
    public function __construct() {
        try {
            
            $this->run();
    
            $this->PageNotFound();
        } catch (\Throwable $th) {
           ddd( $th->getTraceAsString());
        }

    }

    /**
        Route("/home")
    */
    public function run() {
        Context()->setInHeader('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">');
        RequestService::route('/', function () { new HomeController(); }, USE_MIDDLEWARE);
        
        RequestService::route('/home', function () { echo 'Products page'; }, USE_MIDDLEWARE);
        
        RequestService::route('/clients', function () { echo 'Clients page'; }, USE_MIDDLEWARE);

        RequestService::route('/Auth', function () { echo 'Token Missing'; });

        RequestService::route('/InternalError', function () { echo 'Estamos en mantenimiento'; });
        Context()->setInHeader('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">');
    }

    public function PageNotFound() {
        require './src/Template/Sections/Header.html.php';
        require_once './src/Template/Sections/404.html.php';
        require './src/Template/Sections/Footer.html.php';
    }

}

interface IController
{
    
}