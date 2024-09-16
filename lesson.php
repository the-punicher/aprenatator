<?php

//var_dump($_GET);

$pdo = new PDO('sqlite:'.dirname(__FILE__).'/data.sqlite');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// On verifie que l ' id est valide cest a dire quil a une valeur.
if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM  lesson WHERE lesson_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt ->execute([$id]);
        $lesson = $stmt->fetch(); //recupere la leçon selectionée
}

    

var_dump($lesson);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>