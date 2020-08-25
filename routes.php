<?php

use Pecee\SimpleRouter\SimpleRouter;

$container = (new \DI\ContainerBuilder())
    ->useAutowiring(true)
    ->build();

SimpleRouter::setDefaultNamespace('Controller');

SimpleRouter::post('/auth/login', 'AuthController@login');

SimpleRouter::get('/auth', function(){
    echo "hi";
});

SimpleRouter::post('/auth/register', 'AuthController@register');

SimpleRouter::enableDependencyInjection($container);

SimpleRouter::start();




