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
//a vec le !



// if(!empty($_POST["lesson_name"])){
   // echo"le nom est ecrit correctement";
// }else{
  //  echo"le nom est vide";
// }



// echo "<pre>";
// print_r($_POST);
// echo $_POST["lesson_name"];


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

if(strlen( $_POST[ "lesson_name"]) > 2 && strlen($_POST ["lesson_name"]) <50){
    echo "houra !! gg!!";
}else{
    $cara = strlen($_POST["lesson_name"]);
    echo" veuilliez ecrire corectement le titre du cours (2 a 50 caractere max";
    echo "<br>";
    echo "Actuellement $cara lettre.";
};

