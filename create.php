<?php
    require 'db.php';
    $message = '';
    if (isset ($_POST['nom']) && isset($_POST['email']) ) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $sql = 'INSERT INTO etudiant(nom, email) VALUES(:nom, :email)';
        $statement = $connection->prepare($sql);
        if ($statement->execute([':nom' => $nom, ':email' => $email])) {
        $message = 'Donnée créée avec succès';
        }
    }
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Créer un étudiant</h2>
        </div>
    <div class="card-body">
        <?php if(!empty($message)): ?>
        <div class="alert alert-success">
            <?= $message; ?>
        </div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
             </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Créer un étudiant</button>
            </div>
        </form>
    </div>
</div>
