<?php
session_start();
if(!(isset($_SESSION['id']))){
    header('Location: login.php');
}else{

if($_SESSION['rank'] == "0"){
    header('Location: index.php');
}{


require('db.php');
if(isset($_POST['logb'])){
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $req = $bdd->prepare('INSERT INTO users(user, pass, rank) VALUES(:user, :pass, :rank)');
    $req->execute(array(
        'user' => $_POST['login'],
        'pass' => $pass_hache,
        'rank' => $_POST['rank']
    ));
    header('Location: admin_membre.php');
}

$accounts = $bdd->query('SELECT * FROM users');
?>

<html>
    <head>
        <title>Visa - Administration</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="visa-check.php">Visa - Interface Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">

                  <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                  <a class="btn btn-primary" href="visa-check.php">Retour</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container">
            <br />
            <form method="post" class="form-signin">
            <h1>Enregister un nouveau douanier</h1>
            <label>Username :</label><input type="text" class="form-control" name="login" placeholder="Votre Pseudo" required autofocus/>
            <label>Password :</label><input type="password"  class="form-control" name="pass" required/>
            <label>Rang :</label><input type="text"  class="form-control" name="rank" required/>
            <h5>0 = douanier de base / 1 = super-douaniers</h5>

            <input type="submit" class="btn btn-lg btn-primary btn-block" name="logb" value="Create" />
        </form>
        <hr />
        <h1>Liste des douaniers</h1>
        <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Rang</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
        <?php
            while($data = $accounts->fetch()){
        ?>
                <tr>
                  <th scope="row"><?php echo $data['id']; ?></th>
                  <td><?php echo $data['user']; ?></td>
                  <td><?php echo $data['rank']; ?></td>
                  <td><a href="admin_delete.php?id=<?php echo $data['id']; ?>">Delete Account</a></td>
                </tr>

        <?php
            }
        ?>
                  </tbody>
            </table>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

<?php
    $accounts->closeCursor();
}
}
?>
