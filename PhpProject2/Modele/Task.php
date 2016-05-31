<?php
require_once 'Framework/Modele.php';
class Task extends Modele{
    public function getTasks($idPerson){
        $sql = 'SELECT Task_id as task_id, Person_id as person_id, Task_Name as task_name,'
                . ' Task_Description as task_description, Other_Details as other_details, Image_Task as fichierImage, efface as efface'
                . ' FROM Tasks'
                . ' WHERE Person_id=?';
        $tasks = $this->executerRequete($sql, array($idPerson));
        return $tasks;
    }
    public function getAllTask(){
        $sql = 'SELECT * FROM Tasks Order by Task_id';
        $tasks = $this->executerRequete($sql);
        return $tasks;
    }
    public function postTask($idPerson, $name, $desc, $details, $image){
        if($image != null){
            $fichierImage = $this->enregistrerImage($image);
        }
        $sql = 'INSERT INTO Tasks(Person_id, Task_Name, Task_Description, Other_Details, Image_Task)'
                . 'VALUES(?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($idPerson, $name, $desc, $details, $fichierImage));
    }
    public function getTask($idTask){
        $sql = 'SELECT  * FROM Tasks WHERE Task_id = ?';
        $task = $this->executerRequete($sql, array($idTask));
        if($task->rowCount() > 0){
            return $task->fetch();
        }else{
            throw new Exception("Aucune tâche ne correspond a l'identifiant '$idTask'");
        }
        
    }
    public function getTaskPersonID($idTask){
        $sql = 'SELECT Person_id FROM Tasks WHERE Task_id = ?';
        $person_id = $this->executerRequete($sql, array($idTask));
        if($person_id->rowCount() > 0){
            return $person_id->fetch();
        }else{
            throw new Exception("Aucune tâche ne correspond a l'identifiant '$idTask'");
        }
    }
    public function effacerTask($idTask) {
        $sql = 'UPDATE Tasks set efface = 1 WHERE Task_id = ?';
        $this->executerRequete($sql, array($idTask));
    }
    public function retablirTask($idTask) {
        $sql = 'UPDATE Tasks set efface = 0 WHERE Task_id = ?';
        $this->executerRequete($sql, array($idTask));
    }
    private function enregistrerImage($image) {
        if(isset($image) AND $image['error'] == 0){
            $dimension = $image['size'];
            if($dimension <= 1000000){
                $infosfichier = pathinfo($image['name']);
                $extension_upload = $infosfichier['extension'];
                $extension_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if(in_array($extension_upload, $extension_autorisees)){
                    $fichierImage = 'Contenu/images/'. basename($image['name']);
                    move_uploaded_file($image['tmp_name'], $fichierImage);
                    return basename($image['name']);
                }else{
                    throw new Exception("L'extension '$extension_upload' n'est pas autorisée pour les images");
                }
            } else {
                throw new Exception("Votre image ($dimension octects) dépasse la dimension autorisée (1000000 octets)");
            }
        } else {
            throw new Exception("Erreur rencontrée lors de la transmission du fichier");
        }
    }
}

