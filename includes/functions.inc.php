<?php
/**
 * Created by PhpStorm.
 * User: Lucille
 * Date: 09/03/2018
 * Time: 12:05
 */
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   $string = preg_replace('/-+/', '-', $string); //si deux - on remplace par un seul
   preg_replace('/_+/', '_', $string); //si deux _ on remplace par un seul
   $string = strtolower($string);

   return $string;
}

function selectOne(string $table,int $id){
    global $pdo; //je récupère $pdo de l'extérieur de la fonction
    $rowToGet = $pdo->prepare('SELECT * FROM '.$table.' WHERE id_'.$table.'= :id');
    $rowToGet -> bindValue(':id', $id, PDO::PARAM_INT);
    $rowToGet -> execute();
    $row = $rowToGet -> fetch(PDO::FETCH_ASSOC);
    return $row;
}

function selectAll(string $table){
    global $pdo; //je récupère $pdo de l'extérieur de la fonction
    $rowsToGet = $pdo->query('SELECT * FROM '.$table);
    $rows = $rowsToGet -> fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addToCart(array $produit, $quantite) {
session_start();
    // si $_SESSION['cart'] existe et n'est pas vide ET l'indice ['id'] existe dans le tableau $_SESSION['cart']
    if(!empty($_SESSION['cart']) && array_key_exists('id', $_SESSION['cart'])) {
        // nous devons savoir si $produit['id'] que l'on souhaite ajouter est déjà présent dans la session du panier ou non.
        $positionProduit = array_search($produit['id_produits'],  $_SESSION['cart']['id']); // retourne un chiffre si le produit existe
    }

    // var_dump($positionProduit);
    if (isset($positionProduit) && $positionProduit !== false) // si le produit est déjà présent dans le panier
    {
        $_SESSION['cart']['quantite'][$positionProduit] += $quantite ; // nous allons précisement à l'indice de ce produit et nous ajoutons la nouvelle quantite (exemple: +1)
        $_SESSION['cart']['prix_total_produit'][$positionProduit] = $produit['prix'] * $_SESSION['cart']['quantite'][$positionProduit];
    }
    else         //Sinon si $produit['id'] du produit n'existe pas dans le panier, on ajoute $produit['id'] du produit dans un nouvel indice du tableau. les crochets [] permettent de mettre à l'indice suivant.
    {
        $_SESSION['cart']['id'][]        = $produit['id_produits'];
        $_SESSION['cart']['prix_total_produit'][]= $produit['prix'] * $quantite; // prix total selon la quantite
        $_SESSION['cart']['prix_unitaire'][]= $produit['prix']; // prix total selon la quantite
        $_SESSION['cart']['reference'][] = $produit['reference'];
        $_SESSION['cart']['titre'][]     = $produit['titre'];
        $_SESSION['cart']['quantite'][]  = $quantite;
        $_SESSION['cart']['image'][]     = $produit['image'];
    }
}


function deleteFromCart($productId) {
    if(!empty($_SESSION['cart']) && array_key_exists('id', $_SESSION['cart'])) {
        // nous devons savoir si $produit['id'] que l'on souhaite supprimer est présent dans la session du panier ou non.
        $positionProduit = array_search($productId,  $_SESSION['cart']['id']); // retourne un chiffre si le produit existe
    }

    if (isset($positionProduit) && $positionProduit !== false) // si le produit est déjà présent dans le panier
    {
        array_splice($_SESSION['cart']['id'], $positionProduit,1);
        array_splice($_SESSION['cart']['prix_total_produit'], $positionProduit,1);
        array_splice($_SESSION['cart']['prix_unitaire'], $positionProduit,1);
        array_splice($_SESSION['cart']['reference'], $positionProduit,1);
        array_splice($_SESSION['cart']['titre'], $positionProduit,1);
        array_splice($_SESSION['cart']['quantite'], $positionProduit,1);
        array_splice($_SESSION['cart']['image'], $positionProduit,1);
    }
}

//FONCTION SECURISATION ANTI-INJECTION SQL



?>