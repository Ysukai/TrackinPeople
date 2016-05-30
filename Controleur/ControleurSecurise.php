<?php

abstract class ControleurSecurise extends Controleur{
    public function executerAction($action) {
        if($this->requete->getSession()->existeAttribut("idUtilisateur")){
            parent::executerAction($action);
        }  else {
            if($this->requete->existeParametre("Scontroleur") && $this->requete->existeParametre("Saction")){
                $controleur = $this->requete->getParametre("Scontroleur");
                $action = $this->requete->getParametre("Saction");
                if($this->requete->existeParametre('id')){
                    $id = $this->requete->getParametre("id");
                }
                $this->requete->getSession()->setAttribut("controleur", $controleur);
                $this->requete->getSession()->setAttribut("action", $action);
                if($this->requete->existeParametre('id')){
                    $this->requete->getSession()->setAttribut("id", $id);
                }
            }
            $this->rediriger("connexion");
        }
    }
}