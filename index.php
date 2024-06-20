<?php
    require 'db.php';
    $sql = 'SELECT * FROM etudiant';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $etudiant = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
<div class="container">
 <div class="card mt-5">
     <div class="card-header">
         <h2>Tous les étudiants</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
<?php 
    foreach($etudiant as $person): ?>
        <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->nom; ?></td>
            <td><?= $person->email; ?></td>
            <td>
            <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
            <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Supprimer</a>
            </td>
        </tr>
<?php endforeach; ?>
</table>
</div>
</div>
</div>
<