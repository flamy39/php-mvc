<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des livres</title>
</head>
<body>
    <h1>Liste des livres</h1>
    <ul>
    <?php foreach ($livres as $livre): ?>
        <li>
            <?= htmlspecialchars($livre->getTitre()) ?> par <?= htmlspecialchars($livre->getAuteur()) ?> 
            - <a href="index.php?route=livre/details&id=<?= $livre->getId() ?>">Voir les détails</a>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>