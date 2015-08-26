<?php 
    session_start();
    
    if(isset($_SESSION['login_user'])) {
        header("location: dashboard.php");
    }    
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
    <link href="css/signin.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body ng-app="bdpApp" class="home">

    <div ng-controller="homeController">
        <h2 class="form-signin-heading">Revisions mèdiques esportives</h2>
        <form class="form-signin" id="login" action="login.php" method="post">
            <div class="form-group">
                    <label for="username">Usuari:</label> 
                    <input type="text" class="form-control" id="username" name="username" required autofocus/>
            </div>
            <div class="form-group">
                    <label for="password">Contrassenya:</label> 
                    <input type="password" class="form-control" id="password" name="password" required/>
            </div>
            <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Iniciar sessió</button>
        </form>
    </div>

    <!-- /#wrapper -->
    <footer class="footer">Copyright © bernatdepablo.cat</footer>

    <!-- md5 -->
    <script src="js/md5.js"></script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- AngularJS -->
    <script src="js/angular.min.js"></script>

    <!-- Own JS -->
    <script src="js/bdp.js"></script>

    <script type="text/javascript">
    $('#login').on('submit', function (event) {
        $('#password').val(window.md5($('#password').val()));
    });
    </script>
    
</body>

</html>
