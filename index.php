<?php
	session_start();

	require('db.php');
	if(isset($_POST['send'])){
		$date = date('d-M-Y');

    $req = $bdd->prepare('INSERT INTO visas(date, discord, nomrp, age, horaires, experience, traits, description, futur) VALUES(:date, :discord, :nomrp, :age, :horaires, :experience, :traits, :description, :futur)');
			$req->execute(array(
					'date'    => $date,
					'discord' => $_POST['discord'],
	        'nomrp' => $_POST['nomrp'],
	        'age' => $_POST['age'],
	        'horaires' => $_POST['horaires'],
					'experience' => $_POST['exp'],
					'traits' => $_POST['traits'],
					'description' => $_POST['description'],
					'futur' => $_POST['futur']
	    ));

    //header('Location: index.php');
		header('Location: sucess.php');

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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />

</head>

<body>
<div class="image-container set-full-height" style="background-image: url('assets/img/background.png')">
    <!--   Creative Tim Branding   -->
    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="blue" id="wizard">
                    <form method="post">
                <!--        You can switch ' data-color="azzure" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	<h3>
                        	   <b>Enregistrer</b> votre visa <br>
                        	   <small>Afin d'arriver en ville, enregistrer en premier temps un visa</small>
														 <?php if(isset($_SESSION['id'])){ ?>
														  <br><hr>
														 <small><label>Page contrôle visa :</label><a class="btn btn-primary" href="visa-check.php">Acceder</a></small>
													 <?php } ?>
                        	</h3>

                    	</div>
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#hrp" data-toggle="tab">Informations</a></li>
	                            <li><a href="#rp" data-toggle="tab">Personnage</a></li>
	                            <li><a href="#fin" data-toggle="tab">Envoie</a></li>
	                        </ul>
						</div>
                        <div class="tab-content">
                            <div class="tab-pane" id="hrp">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <h4 class="info-text"> Commencons par des formalités</h4>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>Pseudo Discord</label>
                                        <input type="text" class="form-control" name="discord" id="discord" placeholder="Exemple (Knight-HD#0001)" required>
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                      <div class="form-group">
																				<label>Age IRL</label>
                                        <input type="text" class="form-control" name="age" id="age" required>
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
																				<label>Horaires de connexion</label>
																				<textarea class="form-control" name="horaires" placeholder="" rows="7" required></textarea>
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
																				<label>Expérience RP</label>
																				<textarea class="form-control" name="exp" placeholder="" rows="6" required></textarea>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="rp">
															<div class="col-sm-12">
																	<div class="form-group">
																		<label>Nom Roleplay</label>
																		<input type="text" class="form-control" name="nomrp" id="nomrp" required>
																	</div>
															</div>
																<div class="col-sm-12">
																		<div class="form-group">
																			<label>Trait du personnage</label>
																			<input type="text" class="form-control" name="traits" id="traits" required>
																		</div>
																</div>
																<div class="col-sm-8">
																		 <div class="form-group">
																				<label>Description du personnage</label>
																				<textarea class="form-control" name="description" placeholder="" rows="9" required></textarea>
																			</div>
																</div>
																<div class="col-sm-4">
																		 <div class="form-group">
																				<label>Indication</label>
																				<p class="description">Merci de ne pas prendre cette partie du visa à la légère. Elle est très importante. Nous vous conseillons de faire une quinzaine de lignes.</p>
																			</div>
																</div>
																<div class="col-sm-12">
																		<div class="form-group">
																			<label>Future du personnage</label>
																			<input type="text" class="form-control" name="futur" id="futur" required>
																		</div>
																</div>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
																			<h4 class="info-text">Avez-vous lu les règles </h4>
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Oui j'ai lu les règles et je suis capable d'en restituer certaines.">
                                                <input type="radio" method="post" name="regle" value="Oui">
                                                <div class="icon">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <h6>Oui</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Non et je vais le lire de ce pas.">
                                                <input type="radio" method="post" name="regle" value="Non">
                                                <div class="icon">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                                <h6>Non</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="fin">
                                <div class="row">
                                    <h4 class="info-text"> Fin </h4>
																		<div class="col-sm-12">
																			<p>Vous n'avez plus qu'à envoyer la demande. Attention, un entretien oral vous attendra si votre visa a été accepté.
																		 Vous devrez dans celui-ci raconter notamment l'histoire de votre personnage.
																		 <strong>Bonne chance</strong></p>
																 </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            	<div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Suivant' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' name='send' value='Terminer' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Retour' />
                                </div>
                                <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
            Theme par <a href="http://www.creative-tim.com">Creative Tim</a>. Adaptation et intégration par piaf
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
