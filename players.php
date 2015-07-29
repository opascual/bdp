<?php 
    $model_name = "player";
    $page_name  = "players";
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

    <div id="wrapper" ng-controller="PlayersController">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php 
                include 'inc.header.php';
            ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php 
                $sidebar = 'players';
                include 'inc.sidebar.php';
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <h1 class="page-header">
                    <span class="glyphicon glyphicon-user"></span>
                    Jugadors
                    <a href="player_add.php" class="btn btn-primary pull-right">Crear jugador</a>
                </h1>

                <div class="row">
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="form-group input-group">
                            <input type="text" class="form-control" ng-model="searchText" placeholder="Pots filtrar per nom, cognom, NIF o nom del club" />
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <p>Llistat de jugadors</p>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th ng-click="predicate = 'surname'; reverse=!reverse">
                                            <a href="javascript:void(0);">Nom
                                                <i class="fa" ng-class="{'fa-caret-down': !reverse, 'fa-caret-up': reverse }" ng-if="predicate == 'surname'"></i>
                                            </a>
                                        </th>
                                        <th ng-click="predicate = 'nif'; reverse=!reverse">
                                            <a href="javascript:void(0);">NIF
                                                <i class="fa" ng-class="{'fa-caret-down': !reverse, 'fa-caret-up': reverse }" ng-if="predicate == 'nif'"></i>
                                            </a>
                                        </th>
                                        <th ng-click="predicate = 'club_name'; reverse=!reverse">
                                            <a href="javascript:void(0);">Club
                                                <i class="fa" ng-class="{'fa-caret-down': !reverse, 'fa-caret-up': reverse }" ng-if="predicate == 'club_name'"></i>
                                            </a>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in playersArray | filter: searchText | orderBy: predicate:reverse">
                                        <td>
                                            <a href="player_add.php?a=edit&id={{item.nif}}">{{ item.surname }}, {{ item.name }}</a>
                                        </td>
                                        <td>{{ item.nif }}</td>
                                        <td>
                                            {{ item.club_name }}
                                        </td>
                                        <td>
                                            <a href="?a=delete&s={{ item.nif }}">Eliminar jugador</a>
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

  console.log('Players sqlObj: ', sqlObj)

</script>

</body>

</html>
