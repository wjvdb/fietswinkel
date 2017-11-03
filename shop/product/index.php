<!DOCTYPE html>
<?php
session_start();
//include 'controle.php';
include 'dbconnectie.php';
echo ("<p align='right'>ingelogd als".$_SESSION['gbnaam']."|". $_SESSION['rechten']."|". $_SESSION['gebruiker_id']. "<a href='uitloggen.php'>afmelden</a>");


/* if ($_SESSION['gbnaam']==""){
	header("location: ..");
} */


?>
<html lang="en">
<?php
include 'dbconnectie.php';
$product = $_GET['nummer'];



?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>vanderwiel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../index.php">vanderwiel</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">over ons</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">vanderwiel</p>
                <div class="list-group">
                    <a href="..\login.php" class="list-group-item active">terug</a>

                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
				<?php
                    echo ("<img class='img-responsive' src='img/$product.jpg' alt=''>");
					?>
                    <div class="caption-full">
					
					
					<?php //prijs van product uit db ?>
					
					
                        <h4 class="pull-right"><?php $sql = "SELECT prijs FROM  artikelen WHERE artikelnummer='$product'";
						$resultaat = mysqli_query($verbinding, $sql);
						$rij = mysqli_fetch_array($resultaat, MYSQLI_ASSOC);
						$prijs = $rij['prijs']; 
						echo ("€$prijs");
						?></h4>
                        <h4><a href="#"><?php $product ?></a>
                        </h4>
                        <p><?php include "goedverhaal/$product.php" ?></p>
                    </div>
                    <div class="ratings">
                        
                       
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
					<form method="post" action="winkelwagen.php">
						<input type="number" name="aantal" min="1" value="1">
						<?php echo  ("<input type='hidden' name='product' value='$product'>");  ?>
						<input type="submit" value="toevoegen">
					</form>                  
				  </div>

                    <hr>

                   
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; wimjan , louwe romkes</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
