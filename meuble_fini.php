<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meubles en kit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116153416-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116153416-1');
    </script>
</head>
<body>
<header>
    <!--INCLUDE NAV BARRE-->
    <?php
    $page = 'meuble_fini';
    require_once('includes/nav.inc.php');
    require_once('includes/init.inc.php');
    require_once('includes/functions.inc.php');

    $fini = $pdo->query("SELECT * FROM produits WHERE type ='fini'");
    $finis = $fini->fetchAll(PDO::FETCH_ASSOC);
    ?>
</header>

<main class="marg-auto width-90">

    <div class="row marg-top-30">
        <aside  class=" z-depth-1 brown lighten-5 hide-on-small-only left col s3 height-150 ">
            <ul class="collapsible brown lighten-5 z-depth-0 marron-text" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header brown lighten-5">Catégorie</div>
                <div class="collapsible-body brown lighten-5">
                    <form action="#">
                        <p>
                            <input type="checkbox" class="filled-in" id="filled-in-box-5"  />
                            <label for="filled-in-box-5">Bar</label>
                        </p>
                        <p>
                            <input type="checkbox" class="filled-in" id="filled-in-box"  />
                            <label for="filled-in-box">Lit/Sommier</label>
                        </p>
                        <p>
                            <input type="checkbox" class="filled-in" id="filled-in-box-1"  />
                            <label for="filled-in-box-1">Table à manger</label>
                        </p>
                        <p>
                            <input type="checkbox" class="filled-in" id="filled-in-box-2"  />
                            <label for="filled-in-box-2">Table basse</label>
                        </p>
                        <p>
                            <input type="checkbox" class="filled-in" id="filled-in-box-3"  />
                            <label for="filled-in-box-3">Canapé</label>
                        </p>
                        <p>
                            <input type="checkbox" class="filled-in" id="filled-in-box-4"  />
                            <label for="filled-in-box-4">Chaise</label>
                        </p>
                        <p>
                            <input type="checkbox" class="filled-in" id="filled-in-box-5"  />
                            <label for="filled-in-box-5">Transat</label>
                        </p>
                        <p>
                            <input type="checkbox" class="filled-in" id="filled-in-box-5"  />
                            <label for="filled-in-box-5">Végétaux</label>
                        </p>
                        <p>
                            <input type="checkbox" class="filled-in" id="filled-in-box-5"  />
                            <label for="filled-in-box-5">Rangement</label>
                        </p>
                    </form>

                </div>
                </li>
                <li>
                    <div class="collapsible-header brown lighten-5">Position</div>
                    <div class="collapsible-body brown lighten-5">
                        <form action="#">
                            <p>
                                <input name="group1" type="radio" id="test1" />
                                <label for="test1">Intérieur</label>
                            </p>
                            <p>
                                <input name="group1" type="radio" id="test2" />
                                <label for="test2">Extérieur</label>
                            </p>

                        </form>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header brown lighten-5">Matériaux</div>
                    <div class="collapsible-body brown lighten-5">
                        <form action="#">
                            <p>
                                <input name="group1" type="radio" id="test3" />
                                <label for="test3">Bois</label>
                            </p>
                            <p>
                                <input name="group1" type="radio" id="test4" />
                                <label for="test4">Plastique</label>
                            </p>
                            <p>
                                <input name="group1" type="radio" id="test5" />
                                <label for="test5">Métal</label>
                            </p>
                        </form>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header brown lighten-5">Prix</div>
                    <div class="collapsible-body brown lighten-5">
                        <p>
                            <input name="prix" type="radio" id="prix1" />
                            <label for="Prix">0€ à 50€</label>
                        </p>
                        <p>
                            <input name="prix" type="radio" id="prix2" />
                            <label for="Prix">50€ à 100€</label>
                        </p>
                        <p>
                            <input name="prix" type="radio" id="prix3" />
                            <label for="Prix">100€ et plus</label>
                        </p>
                    </div>
                </li>
            </ul>
        </aside>

        <?php foreach ($finis as $key=>$value) :?>
            <div class="col l3 s12 m6  marg-bot-30  center-align">
                <div class="brown lighten-5 z-depth-1 pad-10 height-350px flex-col flex-c-c">
                    <?php $tabPhotos = unserialize($value['image'])?>
                    <a href="detail_produit.php?id=<?=$value['id_produits']?>"><img src="photos/photo_produit/<?=$tabPhotos[0]?>" alt="photo produit" class="produits-photos"></a>
                    <h5 class="marron-text marg-top-30"><?=$value['titre']?></h5>
                    <h6 class="prix"><?=$value['prix']?> €</h6>
                </div>
            </div>
        <?php endforeach;?>

    </div>




    </div>
    <!-- <div class="row">
        <ul class="pagination col offset-s3 s8 center-align">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div> -->
</main>



<!-- FIN INCLUDE NAV BARRE-->
<?php
require_once('includes/footer.inc.php');?>
<!-- FIN INCLUDE FOOTER-->
</body>
<script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="script.js"></script>


</html>