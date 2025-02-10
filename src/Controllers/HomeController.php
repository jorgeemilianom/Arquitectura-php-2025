<?php

class HomeController {

    public function __construct() {

        Context()->setInHeader('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">');
        
        Context()->set('nota', $_GET['datos'] ?? 'example');

        require './src/Template/Sections/Header.html.php';
        
        require './src/Template/fragment.html.php';
        require './src/Template/Components/Table.html.php';

        require './src/Template/Sections/Footer.html.php';
    }

}

?>


