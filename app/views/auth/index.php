<html>
    <head>
        
        <title>RS Kasih Ibu - Login</title>

    <!-- favicon-->
    <link rel="icon" href="<?= BASEURL; ?>/img/hospital.png">
    <!-- Bootstrap -->
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">

    </head>
    <body>
        <div class="row mt-2">
            <div class="col-lg"> 
                <?php Flasher::loginFailed(); ?>
            </div>      
        </div>
        <div id="wrapper">
            <div class="container">

                <div align="center" style="margin-top:200px;">
                    <form action="<?= BASEURL; ?>/auth/cekLogin" method="post" class="navbar-form">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="input-group">
                            <input type="submit" name="login" value="Login" class="btn btn-success btn-lg btn-sm">   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

