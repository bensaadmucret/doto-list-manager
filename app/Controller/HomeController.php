<?php

declare(strict_types=1);

namespace App\Controller;

use Core\Flash\Flash;
use Core\Controller\BaseController;
use Core\Auth\LoginFormAuthenticator as Authenticator;

class HomeController extends BaseController
{
    public function __contruct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list = $this->model->getAll('list');
        $task = $this->model->getAll('task');
        $this->render('home/index', [
            'form' => Authenticator::listForm(),
            'lists' => $list,
            'tasks' => $task,

        ], 'default');
    }

 

    public function add_list()
    {
        if ($this->request->isMethod('post')) {
            $nom = $this->request->get('nom');
            if (empty($nom)) {
                return $this->redirect('', 302, 'error', 'Le nom est obligatoire');
            }
            $token = $this->request->get('token');
            if ($token == $_SESSION['csrf_token']) {
                $datas = [
                    'name' => strip_tags($nom),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->model->insert('list', $datas);
                return $this->redirect('', 302, 'success', 'Liste ajouté avec succès');
            }
        }

        return $this->redirect('', 302, 'danger', 'Erreur d\'ajout');
    }

    public function show_list($id)
    {
       
        $list = $this->model->find('list', $id);       
        $query = $this->connection->prepare("SELECT * FROM task WHERE list_id = :id");
        $query->execute([
            'id' => $id
        ]);
        $tasks = $query->fetchAll(\PDO::FETCH_ASSOC);




        $this->render('home/show_list', [
            'list' => $list,
            'tasks' => $tasks,
            'form' => Authenticator::taskForm(),
        ], 'default');
    }


    public function edit_list($id)
    {
        
        if ($this->request->isMethod('post')) {
            $nom = $this->request->get('name');
            $id = $this->request->get('id');
            if (empty($nom)) {
                return $this->redirect('', 302, 'error', 'Le nom est obligatoire');
            }
           
                $datas = [
                    'id' => $id,
                    'name' => strip_tags($nom),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->model->update('list', $datas);
                return $this->redirect('', 302, 'success', 'Liste modifié avec succès');
            
        }

        return $this->redirect('/', 302, 'danger', 'Erreur de modification');
    }

    public function delete_list($id)
    {
        if($this->request->isMethod('post')){           
            
                $this->model->delete('list', $id);
                return $this->redirect('', 302, 'success', 'Liste supprimé avec succès');
            
        }
        
    }

    public function add_task()
    {

        if ($this->request->isMethod('post')) {
            $nom = $this->request->get('nom');
            $list_id = $this->request->get('list_id');
            if(empty($nom)){
                echo $list_id;
                Flash::setMessage('error', 'Veuillez remplir le champ');
                exit;
            }
            $status = $this->request->get('status');
            $list_id = $this->request->get('list_id');
            foreach ($status as $key => $value) {
                $datas = [
                    'name' => strip_tags($nom),
                    'status' => strip_tags($value),
                    'list_id' => strip_tags($list_id),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->model->insert('task', $datas);
            }
            Flash::setMessage('success', 'Tâche ajouté avec succès');

            echo $list_id; // for ajax


            exit;
        }
    }

    public function show_task($id)
    {
        $list = $this->model->find('task', $id);
        $tasks = $this->model->getAll('task', ['list_id' => $id]);
        $this->render('home/show_task', [
            'list' => $list,
            'tasks' => $tasks,
        ], 'default');
    }


    public function ajax_update_task()
    {
      
       
     
        if ($this->request->isMethod('post')) {
            $id = $this->request->get('task_id'); 
            $name = $this->request->get('name');
                   
            $status = $this->request->get('status');
            $list_id = $this->request->get('list_id');
           
            $this->traitement_ajax($id, $status, $list_id);
            Flash::setMessage('success', 'Tâche '. $name  . ' modifié avec succès');
            echo $list_id;
            exit;
        }


    }

    private function traitement_ajax($id, $status, $list_id)
    {
        if($status == 'en cours'){
            $status = 'Terminé';
        }else{
            $status = 'en cours';
        }
        $query = $this->connection->prepare("UPDATE task SET status = :status WHERE id = :id");
        $query->execute([
            'id' => $id,
            'status' => $status,
        ]);
        $query = $this->connection->prepare("UPDATE list SET updated_at = :updated_at WHERE id = :id");
        $query->execute([
            'id' => $list_id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function edit_task($id)
    {   //dump($this->request);
        if ($this->request->isMethod('post')) {
            $nom = $this->request->get('nom');
            $id = $this->request->get('task_id');
            $status = $this->request->get('status');
            if (empty($nom)) {
                return $this->redirect('', 302, 'error', 'Le nom est obligatoire');
            }
            $datas = [
                'id' => $id,
                'name' => strip_tags($nom),
                'status' => strip_tags($status),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->model->update('task', $datas);
            return $this->redirect('', 302, 'success', 'Tâche modifié avec succès');
        }

        return $this->redirect('', 302, 'danger', 'Erreur de modification');
    }


    public function delete_task($id)
    {
       if ($this->request->isMethod('post')) {
           $id = $this->request->get('task_id');
                           
           $this->model->delete('task', $id);
           return $this->redirect('', 302, 'success', 'Tâche supprimé avec succès');
       }
       return $this->redirect('', 302, 'danger', 'Erreur de suppression');    
      
        
    }
  
    
}
