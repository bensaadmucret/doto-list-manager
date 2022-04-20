<?php

namespace Core\Auth;

use Core\Token\Token;
use Core\Session\Session;
use Core\FormBuilder\FormBuilder;
use Symfony\Component\HttpFoundation\Request;

class LoginFormAuthenticator
{
    /**
     * add a list to the database
     *
     * @return form list
     */

     public static function listForm()
     {   $session = new Session();   
         $token = new Token();
         $token =  $token::generateToken($session);
         $form = new FormBuilder();
         $form->startForm('add-list', 'post', 'show-list')
        ->addFor('Nom','<h4>Nom</h4>', ['type' => 'text', 'placeholder' => 'titre'])
        ->addText('nom', '', ['type' => 'text', 'placeholder' => 'titre', 'class' => 'form-control mb-2', 'required'])
        ->addToken($token)
        ->addBouton('Valider',  ['type' => 'submit', 'class' => 'btn btn-primary'])
        ->addBouton('Annuler',  ['type' => 'reset', 'class' => 'btn btn-secondary m-1', 'data-dismiss'=>'modal'])
        ->endForm();
        return $form;
     }


     /**
      * add a task to the database
      *
      * @return form task
      */
        public static function taskForm()
        {   
            $liste = ['en cours','validée'];
            $session = new Session();   
            $token = new Token();
            $token =  $token::generateToken($session);
            $form = new FormBuilder();
            $form->startForm('add-task', 'post', 'show-list')
           ->addFor('Tâche','<h4>Tâche</h4>', ['type' => 'text'])
           ->addText('Tâche', '', ['type' => 'text','class' => 'form-control mb-2'])
           ->addSelect('liste', ['class' => 'form-control form-select mb-2'], $liste)   
           ->addToken($token)
           ->addHidden('list_id', $liste['id'] ?? '')
           ->addBouton('Valider',  ['type' => 'submit', 'class' => 'btn btn-primary'])
           ->addBouton('Annuler',  ['type' => 'reset', 'class' => 'btn btn-secondary m-1', 'data-dismiss'=>'modal'])
           ->endForm();
           return $form;
        }




    
}
