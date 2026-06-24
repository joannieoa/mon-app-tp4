<?php
require "../app/db.php";

// Si le formulaire est soumis
if (!empty($_POST)) {
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];

    $pdo->prepare("INSERT INTO produits (nom, prix) VALUES (?, ?)")
        ->execute([$nom, $prix]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Ajouter un produit</h2>

<form method="POST">
    <input name="nom" placeholder="Nom du produit">
    <input name="prix" placeholder="Prix">
    <button>Ajouter</button>
</form>

<hr>

<h2>Liste des produits</h2>

<?php
$produits = $pdo->query("SELECT * FROM produits")->fetchAll();

foreach ($produits as $p) {
    echo "<p>{$p['nom']} — {$p['prix']} $
        <a class='supprimer' href='supprimer.php?id={$p['id']}' onclick=\"return confirm('Supprimer ce produit ?')\">Supprimer</a>
    </p>";
}
?>

</body>
</html>

