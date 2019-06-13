<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "chaingang_testdb";

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	if ($conn->connect_error) {
		die ("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM fietsenoverzicht";
	$result = $conn->query($sql);

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Winkel - Chain Gang</title>

        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="images/logo_scrum2.png" type="img/favicon">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    </head>

    <body>
    <div class="container-fluid">
        <div id="menu">
            <a href="homepagina.html">
                <img src="images/logo_scrum2.png" alt="Logo Chain Gang" class="logo">
            </a>

            <nav class="navbar navbar-expand-sm bg-light">
                <div href="#" class="hamburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>

                <ul class="navbar-nav ml-auto clearfix menu">
                    <li class="nav-item"><a class="nav-link menu" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link menu" href="#">Winkel</a></li>
                    <li class="nav-item"><a class="nav-link menu" href="#">Mijn account</a></li>
                    <li class="nav-item"><a class="nav-link menu" href="contactpagina.html">Contact</a></li>
                    <li class="nav-item"><a class="nav-link menu" href="#">Nieuwsbrief</a></li>
                </ul>

                <!--
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link menu" href="#">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link menu" href="#">Winkel</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link menu" href="#">Mijn account</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link menu" href="#">Contact</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link menu" href="#">Nieuwsbrief</a>
                                    </li>
                                  </ul>
                -->
            </nav>

            <a href="login.html" class="login"><i class="fas fa-sign-out-alt"></i> Inloggen</a>
        </div>

        <div id="header">
            <div id="titel">
                <h5 class="home">De fietsenwinkel van de Achterhoek.</h5>
            </div>
        </div>

        <div id="zoekbalk">
            <a href="detailpagina.php"><i class="fas fa-search"></i></a> <input type="text" placeholder="Zoeken">

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle shadow-none" type="button" data-toggle="dropdown">Filter
                    <span class="caret"></span>
                </button>

                <ul class="dropdown-menu">
                    <li><a href="detailpagina.php">Herenfietsen</a></li>
                    <li><a href="detailpagina.php">Damesfietsen</a></li>
                    <li><a href="detailpagina.php">Kinderfietsen</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a href="detailpagina.php"> <i class="fas fa-sort-amount-up"></i> Prijs oplopend</a></li>
                    <li><a href="detailpagina.php"> <i class="fas fa-sort-amount-down"></i> Prijs aflopend</a></li>
                </ul>
            </div>

            <a href="#" class="winkelwagen"><i class="fas fa-shopping-cart"></i> €0,00</a>
        </div>

        <div id="content-fietsenoverzicht">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#herenfietsen">Herenfietsen</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#damesfietsen">Damesfietsen</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#kinderfietsen">Kinderfietsen</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="herenfietsen" class="container tab-pane active">
                    <div class="container">
                        <div class="grid-container">
                            <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                
                            ?>
                                <a href="detailpagina.php">
                                    <div class="grid-fiets">
                                        <div class="prijs">&euro; <?php echo $row["Prijs"]; ?> </div>
                                        <img src="<?php echo $row["Productfoto"]; ?>" alt="Geen productfoto beschikbaar." class="fiets"/>

                                        <h1><?php $row["Naam"]; ?></h1>
                                    </div>
                                </a>
                            <?php
                                }
                            ?>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs">€299,99</div>
                                    <img src="images/altec_verona_28_inch_herenfiets_-_zwart_2.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php?id=<?=$row['ID'] ?>">
                                <div class="grid-fiets">
                                    <div class="prijs-actie">€349,99</div> <div class="prijs-oud">€499,99</div>
                                    <img src="images/altec_metro_28_inch_herenfiets_7_versnellingen_-_grijs_2.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php?id=<?=$row['ID'] ?>">
                                <div class="grid-fiets">
                                    <div class="prijs">€289,99</div>
                                    <img src="images/spirit-avance-mat-zwart-2876-1500x1000.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php?id=<?=$row['ID'] ?>">
                                <div class="grid-fiets">
                                    <div class="prijs-kortingPerc">–15%</div> <div class="prijs-korting">€299,99</div>
                                    <img src="images/bc500575_25f0793093.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php?id=<?=$row['ID'] ?>">
                                <div class="grid-fiets">
                                    <div class="prijs">€699,49</div>
                                    <img src="images/spirit-regular-man-mat-zwart-2836-2017-1500x1000.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs-sale">sale</div> <div class="prijs">€329,99</div>
                                    <img src="images/Puch-Hands-Up-Heren-Coal-Black-Matt.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="damesfietsen" class="container tab-pane tab-pane fade">
                    <div class="container">
                        <div class="grid-container">
                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs-actie">€329,99</div> <div class="prijs-oud">€449,99</div>
                                    <img src="images/l_styledzwart.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs">€279,99</div>
                                    <img src="images/bc101211_98f2f74e69.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs-actie">€399,99</div> <div class="prijs-oud">€469,99</div>
                                    <img src="images/image.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs-kortingPerc">–20%</div> <div class="prijs-korting">€299,99</div>
                                    <img src="images/damesfiets-28-inch.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs-sale">sale</div> <div class="prijs">€549,99</div>
                                    <img src="images/Popal-Sienna-Damesfiets-28-inch-blauw-e1468455396485.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs">€389,99</div>
                                    <img src="images/f616.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="kinderfietsen" class="container tab-pane tab-pane fade">
                    <div class="container">
                        <div class="grid-container">
                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs">€129,99</div>
                                    <img src="images/woom2_1_side_red_1024x-600x400.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs">€169,99</div>
                                    <img src="images/kinderfietsen-43-rood.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs-kortingPerc">–20%</div> <div class="prijs-korting">€99,99</div>
                                    <img src="images/9200000021014364.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs">€139,99</div>
                                    <img src="images/productfoto_bestand_126036.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs-actie">€119,99</div> <div class="prijs-oud">€189,99</div>
                                    <img src="images/images.jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>

                            <a href="detailpagina.php">
                                <div class="grid-fiets">
                                    <div class="prijs-actie">€124,99</div> <div class="prijs-oud">€159,99</div>
                                    <img src="images/9200000039044500 .jpg" alt="Geen productfoto beschikbaar" class="fiets">

                                    <h1>Producttitel</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <p>&copy; 2019 - Chain Gang - Alle rechten voorbehouden.</p>
        </div>
    </div>
   </body>
</html>

<?php
	$conn->close();
?>