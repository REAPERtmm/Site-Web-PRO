<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNOWSTORM.GG/FAVORITES</title>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  
    <!-- Favicon -->
    <script src="https://kit.fontawesome.com/d3255ff586.js" crossorigin="anonymous"></script>
    <script src="../script/favorite.js"></script>
    <!-- Fonts API -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/penguin" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/favorite.css">
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
                    <a href="../(page)/Search.html"><i class="fa-solid fa-cart-shopping fa-beat"></i></a>
                    <a href="../(page)/login.html"><i class="fa-solid fa-user fa-beat"></i></a>
                    <img src="../Assets/france-flag.webp" alt="France flag" height="40px" width="40px">
                </div>
            </div>

            <div class="header_bot">
                <div class="navbar_link">
                    <a href="index.html">NOS PRODUITS</a>
                    <a href="index.html">PERSONNALISER</a>
                    <a href="../(page)/Search.html">GALERIE</a>
                    <a href="./support.php">SUPPORT/SAV</a>
                    <a href="index.html">FAQ</a>
                    <a href="./page-contact.html">CONTACT</a>
                </div>
                <div class="navbar_search">
                    <form action="" class="search">
                        <input type="text" placeholder="Rechercher un produit">
                    </form>
                </div>
            </div>
        </div>
    </header>

    <section class="centered-section">
        <div class="step-section">
            <h1>Étape 1 : Mes favoris</h1>
            <!-- Boutons -->
            <div class="container">
                <button class="btn" id="button-2">2</button>
                <button class="btn" id="button-3">3</button>
                <button class="btn" id="button-4">4</button>
            </div>
        </div>
    </section>

    <section class="product-section">
        <table class="product-table">
            <thead>
                <tr>
                    <th>Image Du Produit</th>
                    <th>Nom Du Produit</th>
                    <th>Prix</th>
                    <th>Modificateurs</th>
                    <th>Selectioné</th>
                </tr>
            </thead>
            <tbody>
                <tr class="product">
                    <td class="product-image"><img src="../Assets/Clavier-Carousel-4.webp" alt="clavier souris"></td>
                    <td class="product-details">Kit Clavier souris éclairs</td>
                    <td class="product-price">$<span id="price-1">149.99</span></td>
                    <td class="quantity">
                        <input type="number" value="1" min="1" data-product="1">
                        <button class="edit">✏️</button>
                        <button class="delete">❌</button>
                    </td>
                    <td><button class="select">Sélectionner</button></td>
                </tr>
                <tr class="product">
                    <td class="product-image"><img src="../Assets/Clavier-Carousel-1.jpg" alt="clavier souris"></td>
                    <td class="product-details">clavier surélevé</td>
                    <td class="product-price">$<span id="price-2">99.90</span></td>
                    <td class="quantity">
                        <input type="number" value="1" min="1" data-product="2">
                        <button class="edit">✏️</button>
                        <button class="delete">❌</button>
                    </td>
                    <td><button class="select">Sélectionner</button></td>
                </tr>
                
            </tbody>
        </table>
    </section>

    <section class="subtotal-section">
        <p>Sous total: $<span id="subtotal">0.00</span></p>
        <button class="btn" id="button-transfer">Transferer vers le panier</button>
    </section>

</body>
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

</html>
