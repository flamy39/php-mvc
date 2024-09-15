<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du livre</title>
</head>
<body>
    <h1>Détails du livre</h1>
    <h2><?= htmlspecialchars($livre->getTitre()) ?></h2>
    <p>Auteur : <?= htmlspecialchars($livre->getAuteur()) ?></p>
    <p>Nombre de pages : <?= $livre->getNombrePages() ?></p>
    <a href="index.php?route=livre/list">Retour à la liste</a>
</body>
</html>