<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un nouveau livre</title>
</head>
<body>
    <h1>Créer un nouveau livre</h1>
    <form action="index.php?route=livre/create" method="post">
        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>
        </div>
        <div>
            <label for="auteur">Auteur :</label>
            <input type="text" id="auteur" name="auteur" required>
        </div>
        <div>
            <label for="nombre_pages">Nombre de pages :</label>
            <input type="number" id="nombre_pages" name="nombre_pages" required>
        </div>
        <button type="submit">Créer</button>
    </form>
    <a href="index.php?route=livre/list">Retour à la liste</a>
</body>
</html>