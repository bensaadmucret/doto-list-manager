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
        $router->add('GET', 'show', 'HomeController@show', 'show');
        $router->add('POST', 'add-list', 'HomeController@add_list', 'add_list');
        $router->add('GET', 'show-list/:id', 'HomeController@show_list', 'show_list');
        $router->add('POST', 'show-list/:id', 'HomeController@show_list', 'show_list');
        $router->add('GET', 'edit-list/:id', 'HomeController@edit_list', 'edit_list');
        $router->add('POST', 'edit-list/:id', 'HomeController@edit_list', 'edit_list');
        $router->add('GET', 'delete-list/:id', 'HomeController@delete_list', 'delete_list');
        $router->add('POST', 'add-task', 'HomeController@add_task', 'add_task');
        $router->add('POST', 'show-list/edit-task/:id', 'HomeController@edit_task', 'edit_task');
        $router->add('POST', 'show-list/delete-task/:id', 'HomeController@delete_task', 'delete_task');
        $router->add('POST', 'update-task', 'HomeController@ajax_update_task', 'update_task');
        







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
