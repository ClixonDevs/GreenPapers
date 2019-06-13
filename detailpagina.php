<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "chaingang_testdb";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM fietsenoverzicht WHERE ID = 2";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) == 0) {
        echo "No results";
    } else {
        $row = mysqli_fetch_assoc($result);
    }

?>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title><?php echo $row["Naam"] ?> - Chain Gang</title>

            <link rel="shortcut icon" type="image/x-icon" href="images/logo_scrum2.png">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
                  integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
                  crossorigin="anonymous">

            <link rel="stylesheet" href="css/styles.css" type="text/css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
            <script src="main.js"></script>
        </head>

        <body>
        <section id="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light sticky-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><h1> Chain Gang</h1></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarResponsive">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="#top">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#about">Store</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#services">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#price">Sign in</a>
                            </li>

                            <li class="nav-item">
                                <a><i class="fas fa-shopping-cart" href="#"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>

        <main id="content">
            <section id="productfoto">
                <img src="<?php echo $row["Productfoto"]; ?>" alt="Geen productfoto beschikbaar." />
            </section>

            <section id="details">
                <div id="productnaam">
                    <?php echo $row["Naam"] ?>
                </div>

                <div id="productnaam-type">
                    <?php echo $row["Type"] ?>
                </div>

                <div id="prijs">
                    &euro; <?php echo $row["Prijs"] = str_replace('.',',', $row["Prijs"]); ?>
                </div>

                <a href="#" class="toevoegen_winkelmand"><i class="fas fa-cart-plus"></i>&nbsp; Voeg toe aan winkelmand</a>

                <div id="productomschrijving">
                    <hr class="omschrijving">
                    <p>
                        <?php echo $row["Beschrijving"] ?>
                    </p>
                </div>
            </section>

            <section id="informatie">
                <h1 class="product-info">Over dit product</h1>
                <hr class="product-info">

                <table>
                    <tr>
                        <td>Merk</td>
                        <td><?php echo $row["Merk"] ?></td>
                    </tr>

                    <tr>
                        <td>Type</td>
                        <td><?php echo $row["Type"] ?></td>
                    </tr>

                    <tr>
                        <td>Framemaat</td>
                        <td><?php echo $row["Framemaat"] ?></td>
                    </tr>

                    <tr>
                        <td>Bouwjaar</td>
                        <td><?php echo $row["Bouwjaar"] ?></td>
                    </tr>

                    <tr>
                        <td>Bandenmaat</td>
                        <td><?php echo $row["Bandenmaat"] ?></td>
                    </tr>

                    <tr>
                        <td>Gewicht</td>
                        <td><?php echo $row["Gewicht"] = str_replace('.',',', $row["Gewicht"]); ?> kg</td>
                    </tr>
                </table>
            </section>
        </main>

        <div id="footer">
            <p>&copy; 2019 - Chain Gang - Alle rechten voorbehouden.</p>
        </div>
        </body>
        </html>

<?php
    $conn->close();
?>