<?php
// Tout les donnée du formaulaire vont aller dans le $_POST
// le $_POST et un tyableaux assiciatiff 
// pour chaque input dnas le formaulaire 
// le name de linput devient la cle et la valeur est ce qui est ecrit
// dans linput


// ici nous allons verifier  que le nom de leçon soit ecrit correctement 
// c'est a dire , que la leçon ai au moin un caratere ( caine pas vide )
// de caractere est pas vide 
// cepandant nous ne voulons pas qu'elle soit vide alor nous inversons 
// a vec le !



 if(!empty($_POST["lesson_name"])){
  
  // LE TRY catch permet de lancer le code dans la partie TRY 
  // Si le code dans la partie TRY "bug" ou genere une erreur 
  // Cette erreur ira dans le catch et ser a atraper( catch)par un objet 
  // Exception .
  // Une Exception et unn objet stokant l erreure ,on peut recupere par 
  // Exemple le cose erreure ou son message 
  // Exemple de codeerreure  : could not find sql driver..
  // Par exemple dans un try nous voulons ouvrir un fichier mais ce fichier 
  // nexiste pas, alors le catch permet de cree ce fichier .
  // finalement le try catch permet une continute du code .
  try{
    /*
     PDO est un objet qui  permet de neutraliser les injections  SQLs
    */
    $pdo = new PDO('sqlite:'.dirname(__FILE__).'/data.sqlite');
    //  CODE POUR FAIRE PERSISTE LES DONNEDANS BDD
    // BDD = BASE DE DONNÉÉS
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $lessonName = $_POST["lesson_name"] ;
    $lessonCategory =$_POST["lesson_category"];
    date_default_timezone_set("Europe/Paris");
    $lessonContent =""; //le cours secrira quant nous le modifir    $lessonModdifyat =new DateTime();
    $date = new DateTime();//objet qui gere le temp .si date equivalente 
    //entre les parentesse , cela revient a gere une date equivalente 
    // a maintenant.
    // ici on chant le format de l heure pour passe dun format a une chaine de caracter,
    // par EX: (le '16/09/2024 10:54:54')
    $lessonModifyAt = $date->format("d-m-Y H:i:s");


    $sql ="INSERT INTO lesson (lesson_name, lesson_category, lesson_content, lesson_modify_at) VALUES (?,?,?,?)"; 
    $stmt =$pdo->prepare($sql);
    

    if($stmt->execute([$lessonName, $lessonCategory, $lessonContent, $lessonModifyAt]) ){
        //tout c est bien pasée
        header("Location:new_lesson.php");
        exit();
    }else{
      echo"Erreur lors de lenregistrement en base de donnée";
    }
  
    

    // En js quant on appelle une fonction ou un atribut d un objet
    // On utilise le point , par exemple voiture.porte
    // En php nous utilisson la -> 
    // En php les double :: permet de recupere des attributs 'statique ";

   
  
  } catch(Exception $e) {
    //  Ici nous recuperon l' erreur ( si il y en a ) du try 
    // les donnée de l' erreure sont envoyées dans l objet se de Exception
    // afin d'etre manipuler 
    echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
    //die() ou exit() sont des fonction qui pertmet  de quitter le script
    //tout ce qui est a la suite est ignore.
    //bien sur pour le cas suivant il faut entre dans le catch.
    //

    die();
  }
   echo"le nom est ecrit correctement";
}else{
   echo"le nom est vide";
}



 echo "<pre>";
 print_r($_POST);
 echo $_POST["lesson_name"];


                //exo ..

// Avec le formulaire de l' apprenantator ,je voudrais que verifier la 
//l a taile de la chaine de caractere de lesso_name 
// elle doit etre plus grande que 2  inferieur  a 50 
// si elle nest pas dand lintervalle de ces taille envoyrer  un message 
// "veuilliez ecrire corectement le titre du cours( 2 a 50 max)



 //if ($str = 'lesson_name');{
   // echo"veuilliez ecrire coretement le titre du cours ";
 
 //echo strlen($str); 

        //corection 

 // if(strlen( $_POST[ "lesson_name"]) > 2 && strlen($_POST ["lesson_name"]) <50){
  // / echo "houra !! gg!!";
//}else{
  //  $cara = strlen($_POST["lesson_name"]);
  //  echo" veuilliez ecrire corectement le titre du cours (2 a 50 caractere max";
   // echo "<br>";
   // echo "Actuellement $cara lettre.";
//};





