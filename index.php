<?php

    $pdo = new PDO('sqlite:'.dirname(__FILE__).'/data.sqlite');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $sql = "SELECT * FROM lesson ";
    // Ici on n'utilise pas prepare car nous  navons pas de donnée a envoyer
    //ICI nous utiliseront query
    $stmt = $pdo->query($sql);
    $lessons =$stmt->fetchAll();// Recupere tout eles lecon et les 
    //mest dans une variable sous forme de tableaux associatifs


    //var_dump($lessons);

?>
   
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Liste  des cours</title>
</head>
<body>
    <h1 class = "center">Liste des cours</h1>
    <div class="center">
    <a class="lien-bouton" href="new_lesson.php">Ecrire une nouvelle leçon</a>
    </div>

    <!--  Le container, contiendra tout les elements en flex -->
    <div class= "container">
      <?php
    
        foreach($lessons as $lesson ){
            $maj = mb_strtoupper($lesson['lesson_name']);
            echo 
            "<div class= flex-test>
                 <h3 class='center'><a class='link-card' href='lesson.php?id=$lesson[lesson_id]'>$maj</a></h3>
                 <p class='center'>$lesson[lesson_category]</p>
                 <p class='date'> Derniere mise a jour: $lesson[lesson_modify_at]</p>
        </div>"; 
        }
    ?>
 
         
    </div>
</body>
</html>