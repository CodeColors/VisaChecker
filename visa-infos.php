<?php
  session_start();
  if(!(isset($_SESSION['id']))){
    header('Location: index.php');
  }

  require('db.php');

  if(isset($_GET['type'])){
    if($_GET['type'] == "1"){
      if($_SESSION['rank'] == "1"){
        if(!empty($_GET['id'])){
          $bdd->query("DELETE FROM visas WHERE id=".$_GET['id']);
          header('Location: visa-check.php');
        }
      }else{
        header('Location: visa-check.php');
      }
    }
  }


?>

<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>TEAM-HD - Visa</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/css/mdb.min.css" rel="stylesheet">
	<link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />

</head>

<body>
  <div class="image-container set-full-height" style="background-image: url('assets/img/background.png')">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-12">
          <br><br>
          <div class="card">
      <h5 class="card-header info-color white-text text-center py-4">
          <strong>Validation de visa</strong>
      </h5>

      <div class="card-body px-lg-5 pt-0">

          <form class="md-form" style="color: #757575;">

              <label for="input">Text input</label>
              <input type="text" id="input" class="form-control" placeholder="">
              
              <label for="input">Text input</label>
              <input type="text" id="input" class="form-control" placeholder="">

              <label for="input">Text input</label>
              <input type="text" id="input" class="form-control" placeholder="">

              <label for="textarea">Textarea input</label>
              <textarea class="form-control md-textarea" id="textarea" placeholder=""></textarea>

              <label for="textarea">Textarea input</label>
              <textarea class="form-control md-textarea" id="textarea" placeholder=""></textarea>

              <label for="input">Text input</label>
              <input type="text" id="input" class="form-control" placeholder="">

              <label for="textarea">Textarea input</label>
              <textarea class="form-control md-textarea" id="textarea" placeholder=""></textarea>

              <label for="input">Text input</label>
              <input type="text" id="input" class="form-control" placeholder="">


              <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Passer le visa en vérifié</button>
          </form>
      </div>
  </div>
</div>
</div>



  </div>
</div>
</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

</html>
