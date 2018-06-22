<?php
 $page = 'ajout_panier';

    require_once('includes/init.inc.php');
    require_once('includes/functions.inc.php');

// j'enregistre le produit ajouté au panier. Dans un tableau SESSION
// pour cela, je recupere les informations a partir de la BDD a l'aide de l'id.
if ( ! empty( $_POST['id_produits'] )
    && is_numeric( $_POST['id_produits'] )
    && ! empty( $_POST['quantite'] )
    && is_numeric( $_POST['quantite'] ) ) {

// je recupere les informations du produit a partir de la BDD et NON du formulaire. Car, si je recupere les informations a partir du formulaire, ceux-ci pourraient etre modifié par l'internaute (exemple, il pourrait modifier le prix)
    $produit = selectOne( 'produits', $_POST['id_produits'] );

// fonction qui ajoute le produit au panier, ainsi que la quantite demandee par l'internaute
    addToCart( $produit, $_POST['quantite'] );


    header('location:panier.php');
}

?>