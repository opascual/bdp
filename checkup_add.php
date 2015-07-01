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

    <div id="wrapper" ng-controller="AddCheckupController">

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
                    <span class="fa fa-fw fa-folder-open"></span>
                    <span class="text-muted">Revisions médiques</span> / {{ checkup ? 'Editar revisió' : 'Crear revisió' }}
                </h1>

                <!-- Dades de la revisió -->
                <div class="row form">
                    <div class="col-md-12">
                        <h4>Dades de la revisió</h4>
                    </div>
                    <section class="col-md-4">
                        <label for="season">Temporada</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <select id="season" class="form-control" ng-model="checkup.season">
                                <option>2015</option>
                                <option>2014</option>
                            </select>
                        </div>
                    </section>

                    <section class="col-md-4">
                        <label for="club">Club</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <select id="club" class="form-control" ng-model="checkup.club">
                                <option>UESC</option>
                                <option>Club</option>
                            </select>
                        </div>
                    </section>
                </div>

                <!-- Dades del jugador -->
                <div class="row form">
                    <div class="col-md-12">
                        <h4>Dades del jugador</h4>
                    </div>
                    <section class="col-md-4">
                        <label for="nif">NIF</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" ng-model="checkup.player.nif" />
                            <p class="help-block">Un cop introduït el NIF s'afegirà la informació referent al jugador</p>
                        </div>
                    </section>

                    <section class="col-md-4">
                        <label for="surname">Nom i cognoms</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" ng-model="checkup.player.name" ng-disabled="true">
                        </div>
                    </section>

                    <section class="col-md-4">
                        <label for="surname">Data de naixement</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" ng-model="checkup.player.birth_date" ng-disabled="true">
                        </div>
                    </section>
                </div>

                <!-- Antecedents -->
                <div class="row form">
                    <div class="col-md-12">
                        <h4>Antecedents</h4>
                    </div>
                    <section class="col-md-4">
                        <label for="family">Antecedents familiars</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="family" class="form-control" ng-model="checkup.player.background.family"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="injuries">Lesions esportives</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="injuries" class="form-control" ng-model="checkup.player.background.injuries"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="disease">Malalties</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="disease" class="form-control" ng-model="checkup.player.background.disease"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="fracture">Fractures</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="fracture" class="form-control" ng-model="checkup.player.background.fracture"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="allergy">Al·lèrgies</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="allergy" class="form-control" ng-model="checkup.player.background.allergy"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="activity">Hores setmanals d'activitat</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input id="activity" type="text" class="form-control" ng-model="checkup.player.background.activity"/>
                            <p class="help-block">Total d'hores, per exemple: 8</p>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="other_background">Altres</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="other_background" class="form-control" ng-model="checkup.player.background.other_background"></textarea>
                        </div>
                    </section>
                </div>

                <!-- Antropometria -->
                <div class="row form">
                    <div class="col-md-12">
                        <h4>Antropometria</h4>
                    </div>
                    <section class="col-md-4">
                        <label for="height">Alçada</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" ng-model="checkup.player.anthropometry.height" />
                            <p class="help-block">Cm, per exemple: 194</p>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="weight">Pes</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" ng-model="checkup.player.anthropometry.weight" />
                            <p class="help-block">Kg, per exemple: 83</p>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="imc">IMC</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input type="text" id="morphotype" class="form-control" ng-disabled="true" value="{{ (checkup.player.anthropometry.weight / (checkup.player.anthropometry.height * checkup.player.anthropometry.height)) * 10000 | number: 2 }}" />
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="morphotype">Morfotipus</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="morphotype" class="form-control" ng-model="checkup.player.anthropometry.morphotype"></textarea>
                        </div>
                    </section>
                </div>

                <!-- Aparell cardio-respiratori -->
                <div class="row form">
                    <div class="col-md-12">
                        <h4>Aparell cardio-respiratori</h4>
                    </div>
                    <section class="col-md-4">
                        <label for="rhythm">Ritme</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="rhythm" class="form-control" ng-model="checkup.player.cardio.rhythm"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="pressure">Tensió arterial</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="pressure" class="form-control" ng-model="checkup.player.cardio.pressure"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="pulses">Polsos perifèrics</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="pulses" class="form-control" ng-model="checkup.player.cardio.pulses"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="ecg">Electro Cardio Grama</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="ecg" class="form-control" ng-model="checkup.player.cardio.ecg"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="bufs">Bufs</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="bufs" class="form-control" ng-model="checkup.player.cardio.bufs"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="oxygen">Saturació d'oxígen</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <input type="text" id="oxygen" class="form-control" ng-model="checkup.player.cardio.oxygen" />
                            <p class="text-muted">Percentatge (%)</p>
                        </div>
                    </section>
                </div>

                <!-- Aparell locomotor -->
                <div class="row form">
                    <div class="col-md-12">
                        <h4>Aparell locomotor</h4>
                    </div>
                    <section class="col-md-4">
                        <label for="column">Columna</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="column" class="form-control" ng-model="checkup.player.musculoskeletal.column"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="limb">Dismetries</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="limb" class="form-control" ng-model="checkup.player.musculoskeletal.limb"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="hamstrings">Isquiotibials</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="hamstrings" class="form-control" ng-model="checkup.player.musculoskeletal.hamstrings"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="varus">Genu varo</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="varus" class="form-control" ng-model="checkup.player.musculoskeletal.varus"></textarea>
                        </div>
                    </section>
                    <section class="col-md-4">
                        <label for="podoscopia">Podoscopia</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="podoscopia" class="form-control" ng-model="checkup.player.musculoskeletal.podoscopia"></textarea>
                        </div>
                    </section>
                </div>


                <!-- Aparell locomotor -->
                <div class="row form">
                    <div class="col-md-12">
                        <h4>Observacions</h4>
                    </div>
                    <section class="col-md-4">
                        <label for="column">Recomanacions</label>
                    </section>
                    <section class="col-md-8">
                        <div class="form-group">
                            <textarea id="recommend" class="form-control" ng-model="checkup.player.recommend"></textarea>
                        </div>
                    </section>
                </div>


                <footer class="text-right">
                    <input type="submit" class="btn btn-primary" value="{{ checkup ? 'Guardar' : 'Crear revisió' }}" />
                </footer>

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
