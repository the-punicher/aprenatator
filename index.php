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
            "<div class= 'flex-test container-vertical'>
                 <h3 classe='center'>$maj</h3>
                 <p >$lesson[lesson_category]</p>
                 <p class='date'> Derniere mise a jour: $lesson[lesson_modify_at]</p>
                 <p ><a href='lesson_read.php?id=$lesson[lesson_id]'>lire la leçon</a></p>
                <p ><a href='lesson.php?id=$lesson[lesson_id]'>modifier la leçon</a></p>

        </div>"; 
        }
    ?>
 
         
    </div>
</body>
</html>