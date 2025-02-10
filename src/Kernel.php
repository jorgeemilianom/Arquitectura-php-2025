<?php
declare(strict_types=1);

final readonly class Kernel implements IKernel
{
    public function __construct() {
        //$this->autoLoadDependency();
        $this->dependencyInclude();
    }
    
    
    public function dependencyInclude(): void
    {
        require_once './src/Controllers/FrontController.php';
        require_once './src/Controllers/HomeController.php';
        require_once './src/Services/RequestService.php';
        require_once './src/Services/Storage/ContextService.php';
        require_once './src/Services/Middlewares/AuthMiddleware.php';
        require_once './src/Services/Middlewares/ExceptionMiddleware.php';
        require_once './src/Contracts/Abstracts/BaseAbstractController.php';
        require_once './src/Config/defines.php';
    }

    public function autoLoadDependency(): void
    {

    }

    public function view(): void
    {
        $Front = new FrontController();
    }
}


interface IKernel
{
    public function view(): void;
    public function autoLoadDependency(): void;
    public function dependencyInclude(): void;

}