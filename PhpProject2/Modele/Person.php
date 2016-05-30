<?php
require_once 'Framework/Modele.php';

class Person extends Modele{
    public function getPeople(){
        $sql = 'SELECT id as id, name as name, prenom as prenom, gender as gender,'
                . ' email as email, date_of_birth as date_of_birth,'
                . ' date_joined_organisation as date_joined_organisation,'
                . ' date_left_organisation as date_left_organisation,'
                . ' other_details as other_details, efface as efface FROM People ORDER BY id';
        $people = $this->executerRequete($sql);
        return $people;
    }
    public function getPerson($idPerson) {
        $sql = 'SELECT id as id, name as name, prenom as prenom, gender as gender,'
                . ' email as email, date_of_birth as date_of_birth,'
                . ' date_joined_organisation as date_joined_organisation,'
                . ' date_left_organisation as date_left_organisation,'
                . ' other_details as other_details FROM People WHERE id=?';
        $person = $this->executerRequete($sql, array($idPerson));
        if ($person->rowCount() > 0){
            return $person->fetch();  // Accès à la première ligne de résultat
        }else{
            throw new Exception("Aucun personne ne correspond à l'identifiant '$idPerson'");
        }
    }
    public function effacerPerson($idPerson) {
        $sql = 'UPDATE People set efface = 1 WHERE id = ?';
        $this->executerRequete($sql, array($idPerson));
    }
    public function retablirPerson($idPerson) {
        $sql = 'UPDATE People set efface = 0 WHERE id = ?';
        $this->executerRequete($sql, array($idPerson));
    }
    public function postPeople($name, $prenom, $gender, $email, $date_of_birth, $date_joined_organisation, $date_left_organisation, $other_details){
        $sql = 'INSERT INTO People (name, prenom, gender, email, date_of_birth, date_joined_organisation, date_left_organisation, other_details) VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($name, $prenom, $gender, $email, $date_of_birth,$date_joined_organisation, $date_left_organisation, $other_details));

    }
    public function updatePeople($idPerson, $name, $prenom, $gender, $email, $date_of_birth, $date_joined_organisation, $date_left_organisation, $other_details){
        $sql = 'UPDATE People SET name = ?, prenom = ?,gender = ?,email = ?, date_of_birth= ?, date_joined_organisation = ?, date_left_organisation = ?, other_details = ? WHERE id = ?';
        $this->executerRequete($sql, array($name, $prenom, $gender, $email, $date_of_birth, $date_joined_organisation, $date_left_organisation, $other_details, $idPerson));
    }
}

