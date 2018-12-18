<?php

$html1 = $html2 = "";

if ($parsed_json) {
    foreach ($parsed_json as $key => $value) {
        if ($value["archive"] == 1) {
            $html1 .= '<input type=checkbox name=modification[] value='.$value["id"] .'> <label>' .$value["name"]. '</label><br>';
        } else if ($value["archive"] == 0) {
            $html2 .= '<label><s>' . $value["name"].'</s></label><br>';
        }
    }
} else {
    $html1 .= "Pas encore de tâche enregistrée";
}


?>








<!-- $html1 = $html2 = "";

if ($parsed_json) {
    foreach ($parsed_json as $key => $value) {
        if ($value["archive"] == true) {
            $html1 .= '<input type=checkbox name=false[] value='.$value->id .'> <label>' .$value["name"]. '</label><br>';
        } else if ($value["archive"] == false) {
            $html2 .= '<label><s>' . $value["name"].'</s></label><br>';
        }
    }
} else {
    $html1 .= "Pas encore de tâche enregistrée";
}
?>

$value->archive == true -->
