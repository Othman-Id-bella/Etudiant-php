<?php
  require 'db.php';
  $id = $_GET['id'];
  $sql = 'SELECT * FROM etudiant WHERE id=:id';
  $statement = $connection->prepare($sql);
  $statement->execute([':id' => $id ]);
  $person = $statement->fetch(PDO::FETCH_OBJ);

  if (isset ($_POST['nom']) && isset($_POST['email']) ) {
      $nom = $_POST['nom'];
      $email = $_POST['email'];
      $sql = 'UPDATE etudiant SET nom=:nom, email=:email WHERE id=:id';
      $statement = $connection->prepare($sql);
      if ($statement->execute([':nom' => $nom, ':email' => $email, ':id' => $id])) {
          header("Location: index.php");
      }
  }
?>
<?php require 'header.php'; ?>
<div class="container">
     <div class="card mt-5">
 <div class="card-header">
    <h2>Mise à jour d'un étudiant</h2>
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
    <input value="<?= $person->nom; ?>" type="text" name="nom" id="nom" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-info">Mise à jour d'un étudiant</button>
  </div>
    </form>
 </div> </div>
</div>
