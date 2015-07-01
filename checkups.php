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

    <div id="wrapper" ng-controller="CheckupsController">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php 
                include 'inc.header.php';
            ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php 
                $sidebar = 'checkups';
                include 'inc.sidebar.php';
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <h1 class="page-header">
                    <span class="glyphicon glyphicon-signal"></span>
                    Revisions mèdiques
                    <a href="checkup_add.php" class="btn btn-primary pull-right">Crear revisió</a>
                </h1>

                <div class="row" ng-init="init()">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="season">Temporada</label>
                            
                            <select id="season" class="form-control" ng-model="seasons" ng-options="item.season for item in checkupsObj" ng-change="changeSeason(seasons.season)">
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-8 mt25">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped align-center">
                                <thead>
                                    <tr>
                                        <th ng-click="reverse=!reverse">Clubs 
                                            <i class="fa" ng-class="{'fa-caret-down': !reverse, 'fa-caret-up': reverse }"></i></th>
                                        <th>Jugadors</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in checkupsTable | orderBy:'club_name': reverse">
                                        <td>
                                            <a href="checkups_club.php?id={{item.club_id}}">
                                                {{ item.club_name }}
                                            </a>
                                        </td>
                                        <td>{{ item.players }}</td>
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

</body>

</html>
