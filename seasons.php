<?php 
    $page_name = "season";
    $page_text = "seasons";
    include 'connector.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>bernatdepablo.cat</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Open Sans font family -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

    <!-- Own CSS -->
    <link href="css/bdp.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body ng-app="bdpApp">

    <div id="wrapper" ng-controller="SeasonsController">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php 
                include 'inc.header.php';
            ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php 
                $sidebar = 'seasons';
                include 'inc.sidebar.php';
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <h1 class="page-header">
                    <span class="glyphicon glyphicon-signal"></span>
                    Temporades
                    <a href="season_add.php" class="btn btn-primary pull-right">Crear temporada</a>
                </h1>

                <div class="row">
                    <div class="col-lg-8">
                        <p>Llistat de temporades existents, amb els clubs i les revisions creades a cadascuna d'elles</p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped align-center">
                                <thead>
                                    <tr>
                                        <th>Temporada</th>
                                        <th>Clubs</th>
                                        <th>Revisions</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in seasonTable">
                                        <td>{{ item.year }}</td>
                                        <td>{{ item.clubs }}</td>
                                        <td>{{ item.checkups }}</td>
                                        <td>
                                            <a href="?a=delete&s={{ item.id }}">Eliminar temporada</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <footer class="footer">Copyright © bernatdepablo.cat</footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- AngularJS -->
    <script src="js/angular.min.js"></script>

    <!-- Own JS -->
    <script src="js/bdp.js"></script>
<script type="text/javascript">
  var sqlObj = <?php echo json_encode($array_obj) ?>;
  console.log('Seasons sqlObj: ', sqlObj);
</script>

</body>

</html>
