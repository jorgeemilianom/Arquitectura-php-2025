<?php

class HomeController {

    public function __construct() {
        
        Context()->set('nota', $_GET['datos'] ?? 'example');

        require './src/Template/Sections/Header.html.php';
        
        require './src/Template/fragment.html.php';
        require './src/Template/Components/Table.html.php';

        require './src/Template/Sections/Footer.html.php';
    }

}