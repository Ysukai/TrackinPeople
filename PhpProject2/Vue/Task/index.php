<?php $this->titre = 'Travail pratique 3 - Yoann Proulx';?>


<br />Voici les tâches de l'employer avec le numéro <?= $this->nettoyer($idPerson) ?><br/>
<form action="acceuil" method="post">
    <input type="submit" value="Revenir à l'écran d'acceuil"/>
</form>
<form method="post" action="AdminTask">
    <input type="hidden" name="id" value="<?= $this->nettoyer($idPerson)?>"/>
        <input type="hidden" name="Saction" value="index" />
        <input type="hidden" name="Scontroleur" value="adminTask" />

        <input type="submit" value="Gérer les Tâches" />
    </form>
<?php
echo "<table align='center' ><tr><th>Numéro de id de Person</th><th>Nom de la tâche</th><th>Description de la tâche</th><th>Autre description</th><th>Images</th></tr>";
foreach($tasks as $task){
    if(!$task['efface']){
        if($task['fichierImage'] != ""){
            echo '<tr><td>' . $this->nettoyer($idPerson) . '</td><td>'. $this->nettoyer($task['task_name']) .'</td><td>'. $this->nettoyer($task['task_description']) .'</td><td>'. $this->nettoyer($task['other_details']) .'</td><td><img src="' . $racineWeb . 'Contenu/images/' . $task['fichierImage'] . '"></td></tr>';
        }else{
            echo '<tr><td>' . $this->nettoyer($idPerson) . '</td><td>'. $this->nettoyer($task['task_name']) .'</td><td>'. $this->nettoyer($task['task_description']) .'</td><td>'. $this->nettoyer($task['other_details']) .'</td></tr>';
        }
        
    }
    
}

echo '</table>';
