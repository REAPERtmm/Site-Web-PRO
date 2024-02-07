<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNOWSTORM.GG</title>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  
    <!-- Favicon -->
    <script src="https://kit.fontawesome.com/d3255ff586.js" crossorigin="anonymous"></script>
    <!-- Fonts API -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/penguin" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/base.css">
    <link rel="stylesheet" href="../styles/builder2.css">
    <?php include '../php/database.php'; ?>
</head>
<body>
    
    <header class="unselectable">
        <div class="header">
            <div class="header-grp">
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
                        <a href="../index.html">NOS PRODUITS</a>
                        <a href="../index.html">PERSONNALISER</a>
                        <a href="./Search.html">GALERIE</a>
                        <a href="../index.html">SUPPORT/SAV</a>
                        <a href="../index.html">FAQ</a>
                        <a href="../index.html">CONTACT</a>
                    </div>
                    <div class="navbar_search">
                        <form action="" class="search">
                            <input type="search" placeholder="Rechercher un produit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header__navbar--toggle">
                <span class="header__navbar--toggle-icons"></span>
            </div>
        </div>
    </header>
<!-- _____________________________________________________________________________________________ -->

    <div class="div1" id="">
        <h1 class="étape" id="">1</h1>
        <h1 class="text_3" id="">Étape 2 : choix de la couleur</h1>
        <h1 class="étape" id="">3</h1>
        <h1 class="étape" id="">4</h1>
        <form action="../php/load_key_in_page.php" target="_blank" class="save-conf" id="form">
            <input type="submit" class="Sumbit" value="sauvgarder la configuration" onclick="extract()">
            <input type="hidden" name="data" id="data" value=<?php echo $_POST["data"]; ?>>
            <input type="hidden" name="IDCustom" value=<?php echo $_POST["IDCustom"]; ?>>
        </form>
    </div>

    <div class="div2" id="">
        <div class="sd2-1" id="">
            <h1 class="text_3">cible:</h1>
            <h1 class="text_3">couleur:</h1>
        </div>
        <div class="sd2-2" id="">
            <div class="cible" id="">
                <button class="" id="cible_1">touche</button>
                <button class="" id="cible_2">Aa</button>
            </div>
            <button class="couleur" id="C-0"   title="couleur rouge">        </button>
            <button class="couleur" id="C-9"   title="couleur maron">        </button>
            <button class="couleur" id="C-1"   title="couleur vert">         </button>
            <button class="couleur" id="C-3"   title="couleur cyan">         </button>
            <button class="couleur" id="C-4"   title="couleur azur">         </button>
            <button class="couleur" id="C-5"   title="couleur bleu">         </button>
            <button class="couleur" id="C-6"   title="couleur jaune">        </button>
            <button class="couleur" id="C-7"   title="couleur beige">        </button>
            <button class="couleur" id="C-8"   title="couleur violet">       </button>
            <button class="couleur" id="C-2"   title="couleur chartreuse">   </button>
            <button class="couleur" id="C-10"  title="couleur coral">        </button>
            <button class="couleur" id="C-11"  title="couleur crimson">      </button>
            <button class="couleur" id="C-12"  title="couleur fushia">       </button>
            <button class="couleur" id="C-13"  title="couleur greenyellow">  </button>
            <button class="couleur" id="C-14"  title="couleur hotpink">      </button>
            <button class="couleur" id="C-15"  title="couleur orangered">    </button>
            <button class="couleur" id="C-16"  title="couleur gray">         </button>
            <button class="couleur" id="C-17"  title="couleur lightgray">    </button>
            <button class="couleur" id="C-18"  title="couleur blanc">        </button>
            <button class="couleur" id="C-19"  title="couleur noir">         </button>
            <h1 class="text_4" id="gab" > Current </h1>
        </div>
    </div>
    

    <div class="clavier" id="">
        <div class="ligne" id="">
            <button class="t30" id="0">esc</button>
            <button class="t30" id="1">1</button>
            <button class="t30" id="2">2</button>
            <button class="t30" id="3">3</button>
            <button class="t30" id="4">4</button>
            <button class="t30" id="5">5</button>
            <button class="t30" id="6">6</button>
            <button class="t30" id="7">7</button>
            <button class="t30" id="8">8</button>
            <button class="t30" id="9">9</button>
            <button class="t30" id="10">0</button>
            <button class="t30" id="11">-</button>
            <button class="t30" id="12">+</button>
            <button class="t30" id="13">←</button>
        </div>
        <div class="ligne" id="">
            <button class="t40" id="14">↔</button>
            <button class="t30" id="15">Q</button>
            <button class="t30" id="16">W</button>
            <button class="t30" id="17">E</button>
            <button class="t30" id="18">R</button>
            <button class="t30" id="19">T</button>
            <button class="t30" id="20">Y</button>
            <button class="t30" id="21">U</button>
            <button class="t30" id="22">I</button>
            <button class="t30" id="23">O</button>
            <button class="t30" id="24">P</button>
            <button class="t30" id="25">[</button>
            <button class="t30" id="26">]</button>
            <button class="t40" id="27">\</button>
        </div>
        <div class="ligne" id="">
            <button class="t50" id="28">▼</button>
            <button class="t30" id="29">A</button>
            <button class="t30" id="30">S</button>
            <button class="t30" id="31">D</button>
            <button class="t30" id="32">F</button>
            <button class="t30" id="33">G</button>
            <button class="t30" id="34">H</button>
            <button class="t30" id="35">J</button>
            <button class="t30" id="36">K</button>
            <button class="t30" id="37">L</button>
            <button class="t30" id="38">;</button>
            <button class="t30" id="39">"</button>
            <button class="t60" id="40">◄</button>
        </div>
        <div class="ligne" id="">
            <button class="t60" id="41">▲</button>
            <button class="t30" id="42">Z</button>
            <button class="t30" id="43">X</button>
            <button class="t30" id="44">C</button>
            <button class="t30" id="45">V</button>
            <button class="t30" id="46">B</button>
            <button class="t30" id="47">N</button>
            <button class="t30" id="48">M</button>
            <button class="t30" id="49">&lt;</button>
            <button class="t30" id="50">&gt;</button>
            <button class="t30" id="51">/</button>
            <button class="t80" id="52">▲</button>
        </div>
        <div class="ligne" id="">
            <button class="t40" id="53">ctr</button>
            <button class="t40" id="54">⊞</button>
            <button class="t40" id="55">alt</button>
            <button class="t180" id="56"></button>
            <button class="t40" id="57">alt</button>
            <button class="t40" id="58">⊞</button>
            <button class="t40" id="59">fn</button>
            <button class="t40" id="60">ctr</button>
        </div>
    </div>
    <div class="masse">
        <div class="div4" id="" >
            <h1 class="text_3" id="">key groups</h1>
            <div class="sd4-1" id="">
                <button class="img" id="Keys" onclick="repaint('Keys')"><img src="" class="img1" id="" title="image groups de touche 1"></button>
                <button class="img" id="Modifier" onclick="repaint('Modifier')"><img src="" class="img2" id="" title="image groups de touche 2"></button>
                <button class="img" id="OS" onclick="repaint('OS')"><img src="" class="img3" id="" title="image groups de touche 3"></button>
            </div>
        </div>
        <input type="Submit" value="suivant" onclick="BeforeNextPage()">
    </div>
    <div class="separ"></div>
    <div class="second1">
        <h1 class="texte_3">présentation produit</h1>
        <div class="sous1">
            <div class="sous1-1">
                <img class="contour" src="https://s3-alpha-sig.figma.com/img/d7dc/0182/6a5bb7b2f63445f7c0bdff097d4e0db7?Expires=1708300800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=bTDjp9GpWhWrFQGDR8LbyXaL7yuk8WxS3L0GmjddNWbSDKwdqoaH9gOOWyBq26E4rel3sNiSm5B1Df9h1AfyTIOaRyG6Mp3xcIoMlp~tcb5tKg8TsEjKW5Pvh7R3wDDI4T67vAX1c2cHggSVjGBZagT40Ns4-wfCYdbQtQuKsXCeO9JzUmp5mz8NLKghDGATMPVogRgQf~DamcmnIDjUyf0MqHsbUOV88S8SyRRqhzlQrXEU4vi279FHZHLEbeApNiyK-c7hflaXvx0oAmcNAgCspvOaRlfEUovOyxwTUNyby7Wk1HrCAsMNP4QLcoeCvYh2WWK137~VNv~EKHDciQ__" title="image de clavier">
                <h1 class="contour">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</h1>
            </div>
            <div class="sous1-1">
                <h1 class="contour">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</h1>
                <img class="contour" src="https://s3-alpha-sig.figma.com/img/c866/79fc/ce8e4541148153d697c195fb4c43a30e?Expires=1708300800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=STT24~zd3A~m8S3eACzp9Nzoh2MeKwdlnkNSwX1ysCDzKeYSMYpGpsduU1LjLv15hP9x9OyKp4AUlA4LEcBwrD8BKefC-2ncwgIPS49e20HQUt6EOGHtrcbOlsR7UOoh73aLicUDdSB9QmpAJs6c6-qbI-v4ffHZRjNOZ-oLPHpfGCs6fZMsfLbFmnz~p7UtRoPKgun~4ZEoOkyJzLTOeL8N597tdTsLVvuMQh9rDUiXZwkXHzNfqCzwV~lytAV9EbopTbrVI4HL9lH7AM6DCSxBUgFgleYZKKulbFNHpv~jjtJ8r-jpGQXJGIuOB0QRMWCdmpSvNKafP2jUswT-pw__" title="image de clavier">
            </div>
        </div>
    </div>
    <div class="second2">
        <h1 class="text_3">présentation produit</h1>
        <img src="https://s3-alpha-sig.figma.com/img/e8fa/aadd/129b25030cc3adce188231c347202786?Expires=1708300800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Wg9jSr0X-~LqEnsOEtVHDaPZ701KAMLonnso9RSvgGS1AETPGjA6FL7yVXReK4bO6p7KWenu~j6r6Jte5sFFd0KOuNcxZXa1WWPvEgfeF0Nxn6xdWTtMGP0LY84aupOUaK3Bb1ifRuZKNpJ~lKO6qR~8tvdVCCJL~i0pIQrBhv7L-tov5EYeabVILEHQe2I-gXD3KNRgNlyKdeRyhDHTcEHl~bKMhei-oMVK9RwyFR84Ho8VLqIVXTTKABtUdcu5tBVz3Hq1-DC8r2E4yFgqDXR9OicipRIEhKLwPiJ07czZlHXO0eJHbW0i79cpVHBvqgtRbIyNqcMMT-IUstC52Q__" class="img2" title="image de presentation du produit">
    </div>
    <div class="avie">
        <div class="av-no">
            <h1 class="text_3">&#149;Jean-Michel Jarre</h1>
            <h1 class="text_1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h1>
            <img src="../Assets/etoile.png" class="note" title="note de l'utilisateur">
        </div>
    </div>
<!-- _____________________________________________________________________________________________ -->
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

<script src="../script/app.js"></script>
<script src="../script/builder2.js"></script>

</body>
</html>