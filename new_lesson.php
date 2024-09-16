<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter une leçon</title>
</head>
<body>
    <h1 class="center" >Ajoute une leçon </h1>

    <form action="lesson_validation.php" method="post">

    <label for="lesson_name"> Nom de la leçon</label>
    <input type="text" name="lesson_name">

    <label for="lesson_category">Categorie de la leçon </label>
        <select name="lesson_category">
            <option value="html"> HTML</option>
            <option value="css">CSS</option>
            <option value="js">JS</option>
            <option value="php">PHP</option>
            <option value="sql">SQL</option>
            <option value="popo">Programation Orienté Objet</option>
            <option value="algo">Algoritmie</option>
            <option value="merise">Methode de Merise</option>
            <option value="framework">framework</option>
            <option value="securite">Sécurité</option>
        </select>
    
    <input type="submit" value="Ajouter le cours">

    
    </form>

    <div class="center marge">
        <a class="lien-bouton " href="index.php">Retour a page  principale</a>

    </div>
</body>
</html>