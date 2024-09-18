<?php

$pdo = new PDO('sqlite:'.dirname(__FILE__).'/data.sqlite');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);




//on verifie que les donnee son envoyer corectement 
if(isset($_POST["lesson_content"])&& isset($_POST["lesson_id"]) ){

$content = $_POST["lesson_content"];
$id = $_POST['lesson_id'];

$date =new DateTime();
$lessonModifyAt = $date->format("d-m-y H:i:s");

$content =$_POST["lesson_content"];
$id = $_POST['lesson_id'];
$sql = "UPDATE lesson SET  lesson_content=?, lesson_modify_at=? WHERE  lesson_id=?";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$content, $lessonModifyAt, $id])){
    echo json_encode("ok");
}else {
    echo json_encode("erreur lors de la mise en BDD");
}

//var_dump($test);

// Ici cest la reponse 

}else{
    echo json_decode("probleme lors de la reception des données");
}