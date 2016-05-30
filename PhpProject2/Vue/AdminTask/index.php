<?php $this->titre = 'Travail pratique 3 - Yoann Proulx';?>

<form action="admintask/ajouterTask" method="post" enctype="multipart/form-data">
    Créer une tâche pour l'employé avec le numéro <?= $this->nettoyer($idPerson[0]) ?><br/>
    <label for="Task_Name">Nom de la tâche:</label><input type="text" name="task_name" id="task_name" required /><br/>
    <label for="Task_Description">Description de la tâche:</label><textarea rows="4" cols="50" name="task_description" maxlength="255" placeholder="255 caractères maximum" id="Task_Description" required></textarea><br/>
    <label for="Other_Details">Autre description:</label><textarea rows="4" cols="50" name="other_details" maxlength="255" placeholder="255 caractères maximum" id="Other_Details"></textarea><br/>
    <input type="file" name="image"/><br />
    <input type="hidden" name="id" value="<?= $this->nettoyer($idPerson[0]) ?>"/>
    <input type="submit" value="Envoyer" />
</form>
<form action="acceuil" method="post">
    <input type="submit" value="Revenir à l'écran d'acceuil"/>
</form>
<form method="post" action="task">
    <input type="hidden" name="id" value="<?= $this->nettoyer($idPerson[0]) ?>"/>
    <input type="hidden" name="Saction" value="index" />
    <input type="hidden" name="Scontroleur" value="acceuil" />
    <input type="submit" value="Retour à l'affichage normal" />
</form>
<?php
echo "<table align='center' ><tr><th>Numéro de id de Person</th><th>Nom de la tâche</th><th>Description de la tâche</th><th>Autre description</th><th>Images</th><th>Montrer tâche</th><th>Cacher tâche</th></tr>";
foreach($tasks as $task){
    if($task['efface']){
        if($task['fichierImage'] != ""){
            echo '<tr><td>' . $this->nettoyer($idPerson[0]) . '</td><td>'. $this->nettoyer($task['task_name']) .'</td><td>'. $this->nettoyer($task['task_description']) .'</td><td>'. $this->nettoyer($task['other_details']) .'</td><td><img src="' . $racineWeb . 'Contenu/images/' . $task['fichierImage'] . '"></td><td><a href="admintask/montrerTask/' . $this->nettoyer($task['task_id']) .  '">[Montrer Tache]</a></td><td></td></tr>';
        }else{
            echo '<tr><td>' . $this->nettoyer($idPerson[0]) . '</td><td>'. $this->nettoyer($task['task_name']) .'</td><td>'. $this->nettoyer($task['task_description']) .'</td><td>'. $this->nettoyer($task['other_details']) .'</td><td></td><td><a href="admintask/montrerTask/' . $this->nettoyer($task['task_id']) .  '">[Montrer Tache]</a></td><td></td></tr>';
        }
        
    }else{
        if($task['fichierImage'] != ""){
            echo '<tr><td>' . $this->nettoyer($idPerson[0]) . '</td><td>'. $this->nettoyer($task['task_name']) .'</td><td>'. $this->nettoyer($task['task_description']) .'</td><td>'. $this->nettoyer($task['other_details']) .'</td><td><img src="' . $racineWeb . 'Contenu/images/' . $task['fichierImage'] . '"></td><td></td><td><a href="admintask/masquerTask/' . $this->nettoyer($task['task_id']) .  '">[Masquer Tache]</a></td></tr>';
        }else{
            echo '<tr><td>' . $this->nettoyer($idPerson[0]) . '</td><td>'. $this->nettoyer($task['task_name']) .'</td><td>'. $this->nettoyer($task['task_description']) .'</td><td>'. $this->nettoyer($task['other_details']) .'</td><td></td><td></td><td><a href="admintask/masquerTask/' . $this->nettoyer($task['task_id']) .  '">[Masquer Tache]</a></td></tr>';
        }
    }
    
}

echo '</table>';
