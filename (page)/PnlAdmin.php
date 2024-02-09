<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/PnlAdmin.css">
    <link rel="stylesheet" href="../styles/base.css">
    <?php
    include '../php/database.php';

    if (isset($_POST["Update-Produit"])) {
        unset($_POST["Update-Produit"]);
        $q = $db->prepare("UPDATE Produit SET Nom=:Nom, Prix=:Prix, ImgPath=:ImgPath, Path1=:Path1, Description1=:Description1, Path2=:Path2, Description2=:Description2    WHERE IDProduit=:ID");
        $q->execute([
            "ID" => $_POST["IDProduit"],
            "Nom" => $_POST["Nom"],
            "Prix" => $_POST["Prix"],
            "ImgPath" => $_POST["ImgPath"],
            "Path1" => $_POST["path1"],
            "Description1" => $_POST["Description1"],
            "Path2" => $_POST["path2"],
            "Description2" => $_POST["Description2"]
        ]);
    } else if (isset($_POST["Insert-Produit"])) {
        unset($_POST["Insert-Produit"]);
        $q = $db->prepare("INSERT INTO Produit(Nom, Prix, ImgPath, Path1, Description1, Path2, Description2) VALUES (:Nom, :Prix, :ImgPath, :Path1, :Description1, :Path2, :Description2)");
        $q->execute([
            "Nom" => $_POST["Nom"],
            "Prix" => $_POST["Prix"],
            "ImgPath" => $_POST["ImgPath"],
            "Path1" => $_POST["path1"],
            "Description1" => $_POST["Description1"],
            "Path2" => $_POST["path2"],
            "Description2" => $_POST["Description2"]
        ]);
    }
    ;
    ?>
</head>

<body>
    <header class="unselectable">
        <div class="header">
            <div class="header_top">
                <div class="logo">
                    <img src="../Assets/logo-removebg-preview.png" alt="Logo" class="logo-img">
                    <p class="logo-name">SNOWSTORM.GG</p>
                </div>
                <div class="logo">
                    <a href="./panier.php"><i class="fa-solid fa-cart-shopping fa-beat"></i></a>
                    <a href="./login.php"><i class="fa-solid fa-user fa-beat"></i></a>
                    <img src="../Assets/france-flag.webp" alt="France flag" height="40px" width="40px">
                </div>
            </div>

            <div class="header_bot">
                <div class="navbar_link">
                    <a href="./Search.php">NOS PRODUITS</a>
                    <a href="./personnaliser.php">PERSONNALISER</a>
                    <a href="./SearchCustom.php">GALERIE</a>
                    <a href="./support.php">SUPPORT/SAV</a>
                    <a href="#">FAQ</a>
                    <a href="./page-contact.html">CONTACT</a>
                </div>
                <div class="navbar_search">
                    <form action="" class="search">
                        <input type="text" placeholder="Rechercher un produit">
                        <?php if (isset($_GET['research'])) {
                            header("Location: ./Search.php?research=" . $_GET['research']);
                        } ?>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <h1 class="titre">PANNEL ADMIN</h1>
    <div>
        <?php
        $q = $db->prepare("SELECT * FROM Produit");
        $q->execute();
        $ProduitData = $q->fetchAll();

        foreach ($ProduitData as $key => $row) {
            echo '
                <form class="div-Produits" method="post">
                <fieldset class="Row">
                    <input type="hidden" name="IDProduit" value="' . $row["IDProduit"] . '">
                    <div class="set">
                        <label for="Nom-' . $key . '"">Nom</label>
                        <input type="text"name="Nom" value="' . $row["Nom"] . '" id="Nom-' . $key . '">
                    </div>
                    <div class="set">
                        <label for="Prix-' . $key . '">Prix(€)</label>
                        <input type="number" min="0" step=".01" name="Prix" id="Prix-' . $key . '" value="' . $row["Prix"] . '">
                    </div>
                    <div class="set">
                        <label for="ImgPath-' . $key . '">Img Presentation</label>
                        <input type="text" name="ImgPath" value="' . $row["ImgPath"] . '" id="ImgPath-' . $key . '">
                    </div>
                    <div class="set">
                        <label for="path1-' . $key . '">Img Presentation2</label>
                        <input type="text" name="path1" value="' . $row["Path1"] . '" id="path1-' . $key . '">
                    </div>
                    <div class="set">
                        <label for="path2-' . $key . '">Img Presentation3</label>
                        <input type="text" name="path2" value="' . $row["Path2"] . '" id="path2-' . $key . '">
                    </div>
                    <div class="set">
                        <label for="desc1-' . $key . '">Description1</label>
                        <textarea name="Description1" id="desc1-' . $key . '" cols="30" rows="10">' . $row["Description1"] . '</textarea>
                    </div>
                    <div class="set">
                        <label for="desc2-' . $key . '">Description2</label>
                        <textarea name="Description2" id="desc2-' . $key . '" cols="30" rows="10">' . $row["Description2"] . '</textarea>
                    </div>
                    <input type="submit" name="Update-Produit">
                </fieldset>
            </form>
            ';
        }
        ?>
        <form class="div-Produits" method="post">
            <fieldset class="Row">
                <input type="hidden" name="IDProduit" value="">
                <div class="set">
                    <label for="Nom">Nom</label>
                    <input type="text" name="Nom" value="" id="Nom">
                </div>
                <div class="set">
                    <label for="Prix">Prix(€)</label>
                    <input type="number" min="0" step=".01" name="Prix" id="Prix" value="">
                </div>
                <div class="set">
                    <label for="ImgPath">Img Presentation</label>
                    <input type="text" name="ImgPath" value="" id="ImgPath">
                </div>
                <div class="set">
                    <label for="path1">Img Presentation2</label>
                    <input type="text" name="path1" value="" id="path1">
                </div>
                <div class="set">
                    <label for="path2">Img Presentation3</label>
                    <input type="text" name="path2" value="" id="path">
                </div>
                <div class="set">
                    <label for="desc1">Description1</label>
                    <textarea name="Description1" id="desc1" cols="30" rows="10"></textarea>
                </div>
                <div class="set">
                    <label for="desc2">Description2</label>
                    <textarea name="Description2" id="desc2" cols="30" rows="10"></textarea>
                </div>
                <input type="submit" name="Insert-Produit">
            </fieldset>
        </form>
    </div>

    <footer class="footer">
        <div class="footer-container unselectable">
            <img src="../Assets/logo-removebg-preview.png" alt="Logo de Snowstorm" id="footer-img">
            <p class="logo-name">Snowstorm.GG</p>
        </div>
        <div class="footer-container">
            <p class="title"> Catégories</p>
            <p class="subtitle"> Nouveautés </p>
            <p class="subtitle"> Meilleures ventes </p>
            <p class="subtitle"> Classiques </p>
            <p class="subtitle"> Préfaits </p>
            <p class="subtitle"> Personnaliser </p>
        </div>
        <div class="footer-container">
            <p class="title"> Informations </p>
            <p class="subtitle"> Nous contacter </p>
            <p class="subtitle"> Livraison </p>
            <p class="subtitle"> Mentions légales </p>
            <p class="subtitle"> Confidentialité </p>
            <p class="subtitle"> Conditions d'utilisation </p>
        </div>
        <div class="footer-container">
            <p class="title"> Mon compte </p>
            <p class="subtitle"> Mes commandes </p>
            <p class="subtitle"> Mes customs </p>
            <p class="subtitle"> Mes informations </p>
        </div>
        <div class="footer-container">
            <p class="title"> Nos réseaux </p>
            <div class="footer-img">
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-x-twitter"></i>
                <i class="fa-brands fa-square-facebook"></i>
            </div>
        </div>
    </footer>

</body>

</html>