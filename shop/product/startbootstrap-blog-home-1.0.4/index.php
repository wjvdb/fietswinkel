
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

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
                <a class="navbar-brand" href="../../login.php">vanderwiel</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
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

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    winkelwagen
                    
                </h1>

            
                

                <!-- Third Blog Post -->
                <h2>
                    <a href="#"></a>
                </h2>
				<?php echo ("
                <p class='lead' align='center'>
                    ingelogd als $gbnaam
                "); 
				
				$sql = "SELECT * FROM bestellingen  WHERE gebruiker_id='$gb' AND besteldatum='$datum' ";
				$resultaat = mysqli_query($verbinding, $sql) or die(mysqli_error());
				$rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC);
				$aantal_rij = mysqli_num_rows($resultaat);
				$id = $rij['bestelnummer'];
				$query = "SELECT * FROM bestelgegevens INNER JOIN artikelen ON bestelgegevens.artikelen_artikelnummer=artikelen.artikelnummer WHERE bestellingen_bestelnummer='$id' ";
				$resultaat = mysqli_query($verbinding, $query) or die(mysqli_error());
				echo ("<table padding='2px'>");
				echo ("<tr bgcolor='CCCCCC'>");
				echo ("<td>aantal besteld </td><td> bestelnummer</td><td>artikelnr</td><td>artikelnr</td><td>product</td><td>categorie</td><td>prijs</td>");

				echo ("</tr>");
				while($rij = mysqli_fetch_array($resultaat, MYSQL_ASSOC)){
				//PRINT RIJ
				echo ("<tr bgcolor='cyan'>");
				while (list($key, $value) = each($rij)){
				echo ("<td>".$value."</td>");
				}
				
				echo ("</p>");
				}
				echo ("
				
				");
				?>
				</table>
                 </div>
               </p>

                <!-- Pager -->
				<br>
                <ul class="pager">
                    <li class="previous">
                        <?php echo ("<a href='../product/index.php?nummer=$product'>&larr; terug</a>"); ?>
                    </li>
                    <li class="next">
                        <form method="post" action="fpdf/ex.php">
						<?php echo  ("<input type='hidden' name='gebruiker' value='$gb'>"); ?>
						<?php echo  ("<input type='hidden' name='bestelnummer' value='$id'>");  ?>
						<input class='next' type="submit" value="afrekenen">
					</form>
                    </li>
                </ul>

           

               

                <!-- Side Widget Well -->
             

        </div>
        <!-- /.row -->



    
        

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
