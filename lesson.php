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


    <form action="lesson_update.php" method='post'>    

    <label for="lesson_content"></label>
    <textarea name="lesson_content" id="content"><?= $lesson['lesson_content']?></textarea>

    <script src="node_modules/tinymce/tinymce.min.js" referrerpolicy="origin"> </script>
    <script>
        tinymce.init({
            selector:"#content",
            plugins:["fullsceen", "code", "emoticons","image", "lists", "searchreplace" ],
            toolbar:"fullscreen | undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | code | emoticons | image | numlist bullist | searchreplace",

            license_key:"uilgpxaa02zosgq3rjbd1j2rzzyc5vhq83vyyzc4ddq2zhxn",
            width:"100%",
            min_height:"100%",
            language_url:"js/fr_FR/langs/fr_FR.js",
            language:'fr_FR',
            setup: function(editor){
               editor.on("input", function (){
                //console.log(editor.getContent("content"));

                //ici on recupere id 
                const queryString= window.location.search;
                //QuerySting va recupere tous l url pare le symbole
                //?, exemple "?id=4"

                const urlParams = new URLSearchParams(queryString);

                const id = urlParams.get("id");

                // nous allons injecter le contenu dans un objet
                //formdata
                const formData = new FormData();
                formData.append("lesson_content", editor.getContent("content"))
                formData.append("lesson_id" ,id)

                // ajax Asyncronous Javascript and XML

                // AJAX => Fichier .php recupere les donnée, les traitent
                //=>le fichier php renvoi une reponse a l' ajax

                const data = {
                    method:"POST",
                    body: formData,
                }

                //le premeire ligne de lajax et lenvois 
                //des donnée.


                fetch("lesson_update.php", data)
                 .then(response => response.json())
                 .then(data => console.log(data))

               } )
            }
        });

          

    </script>

   

</body>
</html>