<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Task.php';

class ControleurAdminTask extends ControleurSecurise{
    private $task;
    public function __construct() {
        $this->task = new Task();
    }
    public function index(){
        if(!$this->requete->existeParametre('action') || $this->requete->getParametre('action') == 'ajouterTask'){
            $idPerson = $this->requete->getParametre('id');
            $tasks = $this->task->getTasks($idPerson);
            $this->genererVue(array('tasks' => $tasks, 'idPerson' => $idPerson));
        }else if(!$this->requete->existeParametre('id')){
            $tasks = $this->task->getAllTask();
            $this->genererVue(array('tasks' => $tasks));
        }else{
            
            $idTask = $this->requete->getParametre('id');
            $idPerson = $this->task->getTaskPersonID($idTask);
            $tasks = $this->task->getTasks($idPerson[0]);
            
            $this->genererVue(array('tasks' => $tasks, 'idPerson' => $idPerson,'idTask' => $idTask));
        }
        
        
        
    }
    public function masquerTask() {
        if($this->requete->existeParametre('action')){
            $idTask = $this->requete->getParametre("id");
            $this->task->effacerTask($idTask);
        }else{
            $idPerson = $this->requete->getParametre('id');
            $idTask = $this->task->getTask($idPerson);
            $this->task->effacerTask($idTask);
        }
        $this->executerAction("index");
    }
    public function montrerTask() {
        if($this->requete->existeParametre('action')){
            $idTask = $this->requete->getParametre('id');
            $this->task->retablirTask($idTask);
        }else{
            $idPerson = $this->requete->getParametre('id');
            $idTask = $this->task->getTask($idPerson);
            $this->task->retablirTask($idTask);
        }
        $this->executerAction("index");
    }
    public function ajouterTask() {
        $idPerson = $this->requete->getParametre("id");
        $task_name = $this->requete->getParametre("task_name");
        $task_description = $this->requete->getParametre("task_description");
        if($this->requete->existeParametre("other_details")){
            $other_details = $this->requete->getParametre("other_details");
        }else{
            $other_details = null;
        }
        $image = $this->requete->getParametre("image");
        if($image['size'] <= 0){
            $image = null;
        }
        $this->task->postTask($idPerson, $task_name, $task_description, $other_details, $image);
        $this->executerAction("index");
    }
}