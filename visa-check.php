<?php
session_start();
require('db.php');

if(!(isset($_SESSION['id']))){
  header('Location: index.php');
}

$visaslist = $bdd->query('SELECT * FROM visas WHERE checked = 0');

?>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/r-2.2.2/datatables.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  </head>
  <body>
    <br>
    <div class="d-flex justify-content-center">
      <div class="container">
                <div class="panel panel-default panel-table">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col col-xs-6">
                        <h3 class="panel-title">Contrôle des visas <small>(a vérifier)</small></h3>
                      </div>
                      <div class="col col-xs-6 text-right">
                        <?php if(!(isset($_GET['type'])) OR $_GET['type'] == "0"){ ?>
                          <a href="visa-check.php?type=1" class="btn btn-sm btn-warning btn-create">Visas vérifiés</a>
                        <?php }else{ ?>
                          <a href="visa-check.php?type=0" class="btn btn-sm btn-warning btn-create">Visas à vérifier</a>
                        <?php } if($_SESSION['rank'] == "1"){ ?>
                          <a href="admin_membre.php" class="btn btn-sm btn-danger btn-create">Douaniers</a>
                        <?php } ?>
                        <a href="logout.php" class="btn btn-sm btn-primary btn-create">Deconnexion</a>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <table id="list" class="table table-striped table-bordered table-list" >
                      <thead>
                        <tr>
                            <th><em class="fa fa-cog"></em></th>
                            <th class="hidden-xs">ID</th>
                            <th>Date</th>
                            <th>Pseudo Discord</th>
                            <th>Nom RP</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            while($data = $visaslist->fetch()){
                        ?>
                              <tr>
                                <td align="center">
                                  <a href="visa-infos.php?type=0&id=<?php echo $data['id']; ?>" class="btn btn-primary"><em style="color: white;" class="fa fa-search"></em></a>
                                  <?php if($_SESSION['rank'] == "1"){ ?>
                                  <a href="visa-infos.php?type=1&id=<?php echo $data['id']; ?>" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                <?php } ?>
                                </td>
                                <td class="hidden-xs"><?php echo $data['id']; ?></td>
                                <td><?php echo $data['date']; ?></td>
                                <td><?php echo $data['discord']; ?></td>
                                <td><?php echo $data['nomrp']; ?></td>
                              </tr>
                        <?php
                            }
                        ?>
                            </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
   </body>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/r-2.2.2/datatables.min.js"></script>
   <script type="text/javascript">
       $('#list').dataTable({

       });
   </script>
</html>
<?php
    $visaslist->closeCursor();
?>
