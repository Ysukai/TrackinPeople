<?php

require_once 'Configuration.php';
require_once 'Requete.php';
require_once 'Vue.php';

abstract class Controleur
{
    private $action;
    
    protected $requete;
    
    public function setRequete(Requete $requete){
        $this->requete = $requete;
    }
    
    public function executerAction($action){
        if(method_exists($this, $action)){
            $this->action = $action;
            $this->{$this->action}();
        }else{
            $classeControleur = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeControleur");
        }
    }
    public abstract function index();
    
    protected function genererVue($donneesVue = array(), $action = null) {
        $actionVue = $this->action;
        if($action != null){
            $actionVue = $action;
        }
        $classControleur = get_class($this);
        $controleurVue = str_replace("Controleur", "", $classControleur);
        
        $vue = new Vue($actionVue, $controleurVue);
        
        if($this->requete->getSession()->existeAttribut("idUtilisateur")){
            $login = $this->requete->getSession()->getAttribut("login");
            $vue->generer($donneesVue, $login);
        }else{
            $vue->generer($donneesVue);
        }
    }
    protected function rediriger($controleur, $action = null)
    {
        $racineWeb = Configuration::get("racineWeb", "/");
                
        header("Location:" . $racineWeb . $controleur . "/" . $action);
    }
}