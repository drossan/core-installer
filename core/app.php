<?php
namespace GRDAR;

use Drossan\core\Facades\CreateFacade;

$app = require_once __DIR__ .'/config.php';

foreach ($app as $key => $value) {
    switch ($key) {
        case 'Controllers':
            foreach ($value as $k => $controller) {
                class_alias("$controller", $k);            
            }
            break;
        case 'Facades':
            foreach ($value as $k => $facade) {
                new CreateFacade($facade, $k);
            }
            break;
        default:
            foreach ($value as $k => $instance) {
                $container->instance($k, new $instance);
            }
            break;
    }
}