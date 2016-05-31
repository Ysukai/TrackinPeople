<?php

require_once 'Framework/Modele.php';

class Utilisateur extends Modele{
    public function connecter($login, $mdp){
        $sql = "SELECT Util_id FROM Utilisateur WHERE Util_user = ? AND Util_mdp = ?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1);
    }
    public function getUtilisateur($login, $mdp) {
        $sql = "SELECT Util_id as idUtilisateur, Util_user as login, Util_mdp as mdp "
                . "FROM Utilisateur WHERE Util_user =? AND Util_mdp = ?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        if($utilisateur->rowCount() == 1){
            return $utilisateur->fetch();
        }else{
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
        }
    }
}