<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Person.php';

class ControleurModifier extends Controleur {
    private $person;
    private $ok = 'false';
    
    public function __construct() {
        $this->person = new Person();
    }
    public function index() {
        
        $idPerson = $this->requete->getParametre("id");
        $modifier = $this->person->getPerson($idPerson);
        $erreur = '';
        $prenom = '';
        $nom = '';
        $gender = '';
        $email = '';
        $date_of_birth = '';
        $date_joined_organisation = '';
        $date_left_organisation = '';
        $other_details = '';
        if($this->ok == 'true'){
            $erreur = 'courriel';
            $this->ok = 'false';
            $prenom = $this->requete->getParametre('prenom');
            $nom = $this->requete->getParametre('name');
            $gender = $this->requete->getParametre('gender');
            $email = $this->requete->getParametre('email');
            $date_of_birth = $this->requete->getParametre('date_of_birth');
            $date_joined_organisation = $this->requete->getParametre('date_joined_organisation');
            if($this->requete->existeParametre('date_left_organisation')){
                $date_left_organisation = $this->requete->getParametre('date_left_organisation');
            }
            if($this->requete->existeParametre('other_details')){
                $other_details = $this->requete->getParametre('other_details');
            }
        }
        $this->genererVue(array('modifier' => $modifier, 'idPerson' => $idPerson,'erreur' => $erreur, 'prenom' => $prenom, 'nom' => $nom, 'gender' => $gender, 'email' => $email, 'date_of_birth' => $date_of_birth, 'date_joined_organisation' => $date_joined_organisation, 'date_left_organisation' => $date_left_organisation, 'other_details' => $other_details));
    }
    public function modifierPerson(){
        $idPerson = $this->requete->getParametre("id");
        $prenom = $this->requete->getParametre("prenom");
        $name = $this->requete->getParametre("name");
        $gender = $this->requete->getParametre("gender");
        $email = $this->requete->getParametre("email");
        $date_of_birth = $this->requete->getParametre("date_of_birth");
        $date_joined_organisation = $this->requete->getParametre("date_joined_organisation");
        if($this->requete->existeParametre("date_left_organisation")){
            $date_left_organisation = $this->requete->getParametre("date_left_organisation");
        }else{
            $date_left_organisation = null;
        }
        if($this->requete->existeParametre("other_details")){
            $other_details = $this->requete->getParametre("other_details");
        }else{
            $other_details = null;
        }
        if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
            $this->person->updatePeople($idPerson,$name, $prenom, $gender, $email, $date_of_birth, $date_joined_organisation, $date_left_organisation, $other_details);
            $this->rediriger("adminpeople");
            
        }else{
            $this->ok = 'true';
            $this->executerAction("index");
        }
        
    }
    
}