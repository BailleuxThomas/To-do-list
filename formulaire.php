<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['tache'])) {
    $depart = trim(filter_input(INPUT_POST, 'tache', FILTER_SANITIZE_STRING));
    $document = file_get_contents("todo.json", true); //récupère le doc json
    $tableau = json_decode($document, true);
    $tableau[] = ["id" => sizeof($tableau),"name" => $depart, "archive" => true];
    $codejson = json_encode($tableau, JSON_UNESCAPED_UNICODE); //JSON_FORCE_OBJECT JSON_UNESCAPED_UNICODE\\
    $depart = fopen("todo.json", "w");
    fwrite($depart, $codejson);
    fclose($depart);
}

$document = file_get_contents("todo.json");
$parsed_json = json_decode($document, true);


if(isset($_POST['modification'])) {
    foreach ($_POST['modification'] as $id) {
        print_r($_POST['modification']);
        foreach ($parsed_json as $key => $value) {
           if($id == $value['id']){
            $parsed_json[$key]['archive'] = false;
            $newJsonString = json_encode($parsed_json);
           }
        }
    }
    file_put_contents('todo.json', $newJsonString);
};

?>


<!-- if ($value["archive"] == true) {
            $value["archive"] = false;
            $newJsonString = json_encode($value);
            file_put_contents($document, $newJsonString);
        } -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Formulaire</title>
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-3 p-0">
                        <form method="post" action="formulaire.php">
                            <h2>A FAIRE</h2>
                            <?php require "contenu.php";
                                echo $html1;?>
                            <input type="submit" value="Enregistrer">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-3 p-0">
                        <h2>ARCHIVE</h2>
                        <?php require "contenu.php";
                            echo $html2 ?>
                    </div>
                </div>
            </div>
        </div>




        <form method="post" action="formulaire.php">
            <div class="container-fluid">
                <div class="container">
                    <!-- Code crée par BAILLEUXTHOMAS TOUT DROITS RESERVES -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-3 p-0">
                            <h2>Ajouter une tâche</h2><br>
                            <p>la tâche à effectuer</p>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 ml-3">
                                <input type="textarea" name="tache"><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 ml-3">
                                <input type="submit" name="submit" value="Ajouter">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <canvas id="c"></canvas>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha364-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

</html>