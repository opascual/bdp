<?php 
    $page_name = "club_add";
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

    <div id="wrapper" ng-controller="AddClubController">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php 
                include 'inc.header.php';
            ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php 
                $sidebar = 'clubs';
                include 'inc.sidebar.php';
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <h1 class="page-header">
                    <span class="fa fa-fw fa-shield"></span>
                    <span class="text-muted">Clubs</span> / {{ club.id ? 'Editar club' : 'Crear club' }}
                </h1>

                <div class="row form">
                    <div class="col-md-12">
                        <h4>Dades del club</h4>
                    </div>
                </div>

                <form ng-submit="executeAddClub" id="addClubForm">
                    <div class="row form">

                    

                        <section class="col-md-4">
                            <label for="name">Nom del club</label>
                        </section>
                        <section class="col-md-8">
                            <div class="form-group">
                                <input id="name" class="form-control" type="text" ng-model="club.name" required/>
                            </div>
                        </section>

                        <section class="col-md-4">
                            <label>Imatge</label>
                        </section>
<!--                        <section class="col-md-8">
                            <div class="form-group">
                                <input id="file_url" class="form-control" type="text" ng-model="club.file_url" ng-if="!club.file_url" />
                                <img ng-src="{{club.file_url}}" width="80" ng-if="club.file_url" />
                            </div>
                        </section>-->
                        
                        <section class="col-md-8">
                            <div class="form-group">
                                <img ng-src="{{club.file_url}}" width="80" ng-if="club.file_url"/>
                                <label for="uploadImage" class="upload-image">
                                    <span><i class="fa fa-camera"></i></span>
                                    <input id="uploadImage" type="file" accept="image/jpeg,image/png" name="image" class="hidden">
                                </label>
                            </div>
                        </section>
                        


                        <section class="col-md-4">
                            <label for="name">Persona de contacte</label>
                        </section>
                        <section class="col-md-8">
                            <div class="form-group">
                                <input id="contact_name" class="form-control" type="text" ng-model="club.contact_name"/>
                            </div>
                        </section>

                        <section class="col-md-4">
                            <label for="name">Telèfon de contacte</label>
                        </section>
                        <section class="col-md-8">
                            <div class="form-group">
                                <input id="contact_phone" class="form-control" type="text" ng-model="club.contact_phone"/>
                            </div>
                        </section>

                        <section class="col-md-4">
                            <label for="name">Email de contacte</label>
                        </section>
                        <section class="col-md-8">
                            <div class="form-group">
                                <input id="contact_mail" class="form-control" type="text" ng-model="club.contact_mail"/>
                            </div>
                        </section>


                        <!--
                        <section class="col-md-4">
                            <label for="sports">Esports</label>
                        </section>
                                            
                        <section class="col-md-8">
                            <div class="form-group">
                                <div class="input-group-action">

                                    <select ng-model="sports" class="form-control">
                                        <option ng-repeat="sport in sportsObj | orderBy: 'name'" value="{{sport.id}}">
                                            {{sport.name}}
                                        </option>
                                    </select>

                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" ng-click="addSport()">Afegir esport</button>
                                    </span>
                                </div>


                                <div class="input-attachment">
                                    <div class="tag" ng-repeat="item in club.sports | orderBy:'name'">
                                        {{item.name}} <small class="pull-right" ng-click="removeSport(item)">x</small>
                                    </div>
                                </div>

                            </div>
                        </section>
                    -->

                    </div>
                    <footer class="text-right">
                        <input type="submit" class="btn btn-primary" value="{{ club.id ? 'Guardar' : 'Crear club' }}" ng-disabled="!(club.name.length > 0)"/>
                    </footer>
                </form>

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
</script>

</body>

</html>
