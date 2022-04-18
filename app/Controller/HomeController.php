<?php

declare(strict_types=1);

namespace App\Controller;

use Core\Flash\Flash;
use Core\Controller\BaseController;
use Core\QueryBuilder\QueryBuilder;
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
        $this->render('home/index', [
            'form' => Authenticator::listForm(),
            'lists' => $list,

        ], 'default');
    }

    /**
     * return all rows from a table
     *
     * @return void
     */
    public function show()
    {

        $this->render('home/show', [], 'default');
    }

    public function add_list()
    {
        if ($this->request->isMethod('post')) {
            $nom = $this->request->get('nom');
            $token = $this->request->get('token');
            if ($token == $_SESSION['csrf_token']) {
                $datas = [
                    'name' => strip_tags($nom),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->model->insert('list', $datas);
                return $this->redirect('/', 302, 'success', 'Liste ajouté avec succès');
            }
        }

        return $this->redirect('/', 302, 'danger', 'Erreur d\'ajout');
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
}
