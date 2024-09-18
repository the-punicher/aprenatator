<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- la valise php echo permet directement d ecrire du texte 
     permer directement ecrie entre les balise  -->
     <link rel="stylesheet" href="css/style.css">


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


?>

    <title><?=$lesson['lesson_name']?></title> 
    
<body>
</head> 

    <h1 class="center"><?= $lesson['lesson_name'] ?></h1>
    <p class="center"><?= 'Dernier modification le : ' . $lesson['lesson_modify_at'] ?></p>
    <p class="center"><?= 'categorie : ' . $lesson['lesson_category'] ?></p>

    <hr>

    <main><?= $lesson['lesson_content'] ?></main>
   
    
   

</body>
</html>