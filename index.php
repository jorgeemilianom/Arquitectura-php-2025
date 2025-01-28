<?php

require_once './src/Kernel.php';
require_once './src/Services/Storage/ContextService.php';


$Context = new ContextService();

$Kernel = new Kernel();
echo $Kernel->view();
