<?php

final readonly class Kernel
{
    public function __construct() {
        $this->dependencyInclude();
    }
    
    
    private function dependencyInclude(): void
    {
        require_once './src/Controllers/FrontController.php';
        require_once './src/Controllers/HomeController.php';
        require_once './src/Services/RequestService.php';
        require_once './src/Services/Storage/ContextService.php';
        require_once './src/Config/defines.php';
    }

    public function autoLoadDependency()
    {
        
    }

    public function view(): void
    {
        $Front = new FrontController();
    }
}