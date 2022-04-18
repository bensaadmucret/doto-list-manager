<?php

declare(strict_types=1);

namespace App;

use Core\Router\Router;
use Core\Container\Container;

class Application
{
    public static function run()
    {
        $router = new Router();
        Router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/', 'HomeController@index', 'home');
        $router->add('GET', '/show', 'HomeController@show', 'show');
        $router->add('GET', '/add', 'HomeController@add', 'add');








        $router->dispatch();
    }


    public static function getContainer(): Container
    {
        $container =  new Container();
        $container->set('Session', new \Core\Session\Session());
        $container->set('Database', new \Core\Database\Connection());
        $container->set('Router', new \Core\Router\Router());
        $container->set('Flash', new \Core\Flash\Flash());
        $container->set('Request', new \Symfony\Component\HttpFoundation\Request());
        $container->set('Model', new \Core\Model\Model());


        $container->get('Session')->start();


        return $container;
    }
}
