<?php

class FrontController
{
    public function __construct() {
        
        $this->run();

        $this->PageNotFound();

    }

    public function run() {
        RequestService::route('/', function () { new HomeController(); });
        
        RequestService::route('/Products', function () { echo 'Products page'; });
        
        RequestService::route('/clients', function () { echo 'Clients page'; });
    }

    public function PageNotFound() {
        require './src/Template/Sections/Header.html.php';
        require_once './src/Template/Sections/404.html.php';
        require './src/Template/Sections/Footer.html.php';
    }

}