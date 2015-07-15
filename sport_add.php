<?php 
    $model_name = "sport";
    $page_name = "sport_add";
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

    <div id="wrapper" ng-controller="AddSportController">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php 
                include 'inc.header.php';
            ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php 
                $sidebar = 'sports';
                include 'inc.sidebar.php';
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <h1 class="page-header">
                    <span class="fa fa-fw fa-futbol-o"></span>
                    <span class="text-muted">Esport</span> / Crear esport                    
                </h1>
                <form action="<?php echo ($editData['sport_id']) ? '?a=edit' : '?a=add' ; ?>" method="post">
                    <input type="hidden" name="sport_id" value="<?php echo ($editData['sport_id']) ? $editData['sport_id'] : ''; ?>" />
                    <div class="row">
                        <section class="col-md-4 section-summary">
                            <h5 class="page-title ng-binding">Nom de l'esport</h5>
                        </section>
                        <section class="col-md-8 section-detail">
                            <div class="box">
                                <div class="form-group">
                                    <!--<input name="name" type="text" class="form-control" ng-model="new_sport.name" />-->
                                    <input name="name" type="text" class="form-control" value="<?php echo ($editData['name']) ? $editData['name'] : ''; ?>" />
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col-md-4 section-summary">
                            <h5 class="page-title ng-binding">Descripció</h5>
                        </section>
                        <section class="col-md-8 section-detail">
                            <div class="box">
                                <div class="form-group">
                                    <!--<input name="description" type="text" class="form-control" ng-model="new_sport.description" />-->
                                    <input name="description" type="text" class="form-control" value="<?php echo ($editData['description']) ? $editData['description'] : ''; ?>" />
                                </div>
                            </div>
                        </section>
                    </div>
                    <footer class="text-right">
                        <!--<input type="submit" class="btn btn-primary" value="<?php //echo ($editData['name']) ? 'Actualitzar' : 'Crear'; ?> esport" ng-disabled="!(new_sport.name.length >= 0)" />-->
                        <input type="submit" class="btn btn-primary" value="<?php echo ($editData['sport_id']) ? 'Actualitzar' : 'Crear'; ?> esport" />
                    </footer>
                </form>
                <div class="row">
                    <section class="col-md-12">
                        <div class="form-group">
                            <div><i class="fa fa-info-circle"></i> Esports existents:</div>
                            <div class="input-attachment">
                                <div class="tag" ng-repeat="item in sports | orderBy:'name'">{{item}}</div>
                            </div>

                        </div>
                    </section>

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
