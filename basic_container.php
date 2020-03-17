<?php
// basic_container.php
require_once './vendor/autoload.php';
use Symfony\Component\DependencyInjection\ContainerBuilder;

// init service container
$containerBuilder = new ContainerBuilder();

// add service into the service container
//$containerBuilder->register('demo.service', 'App\Services\DemoService');

//// fetch service from the service container
//$demoService = $containerBuilder->get('demo.service');
//echo $demoService->helloWorld();