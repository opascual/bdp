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

    <div id="wrapper" ng-controller="AddPlayerController">

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
                    <span class="text-muted">Jugadors</span> / {{ player ? 'Editar jugador' : 'Crear jugador' }}
                </h1>

                <div class="row form">
                    <div class="col-md-12">
                        <h4>Dades del jugador</h4>
                    </div>
                </div>

                <div class="row form">

                    <section class="col-md-4">
                        <label for="nif">NIF</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input class="form-control" type="text" ng-model="player.nif"/>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="nif">Cognoms</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input class="form-control" type="text" ng-model="player.surname"/>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="nif">Nom</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input class="form-control" type="text" ng-model="player.name"/>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="nif">Data de neixament</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input class="form-control" type="text" ng-model="player.birthDate" placeholder="dd/mm/aaaa" />
                        </div>
                    </section>
                </div>
                <footer class="text-right">
                    <input type="submit" class="btn btn-primary" value="{{ player ? 'Guardar' : 'Crear jugador' }}" />
                </footer>

                <!-- ANTROPOMETRIA -->
                <div class="row form" ng-if="player">
                    <div class="col-md-12">
                        <h4>Antropometria</h4>
                    </div>
                </div>
                <div class="row" ng-if="player">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Temporada</th>
                                        <th>Alçada</th>
                                        <th>Pes</th>
                                        <th>Morfologia Tipus</th>
                                        <th>IMC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in anthropometry">
                                        <td>{{item.season}}</td>
                                        <td>{{item.height}} cm</td>
                                        <td>{{item.weight}} kg</td>
                                        <td>{{item.morphology}}</td>
                                        <td>{{ (item.weight / (item.height * item.height)) * 10000  | number: 2 }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <!-- Revisions mèdiques -->
                <div class="row form" ng-if="player">
                    <div class="col-md-12">
                        <h4>Historial de revisions mèdiques</h4>
                    </div>
                </div>
                <div class="row" ng-if="player">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Temporada</th>
                                        <th>Club</th>
                                        <th>Revisió</th>
                                        <th>PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in checkups">
                                        <td>{{item.season}}</td>
                                        <td>{{item.club}}</td>
                                        <td>
                                            <a href="{{item.checkup.url}}">
                                                {{item.checkup.id}}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{item.file_url}}">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
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

</body>

</html>
