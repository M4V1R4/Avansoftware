<?php
$conexion = new mysqli('localhost','isw613_user','secret','isw613_questionnaires');
if($conexion->connect_errno){
    $respuesta = [
        'error' => true
    ];
}else{
    $conexion->set_charset("utf8");
    $statement = $conexion->prepare("Select * FROM questions");
    $statement->execute();
    $resultados = $statement->get_result();

    $respuesta = [];

    while($fila = $resultados->fetch_assoc()){
        $pregunta = [
            'id' => $fila['id'],
            'questionnaire_id' => $fila['questionnaire_id'],
            'question_text' => $fila['question_text']
        ];
        array_push($respuesta,$pregunta);
    }
}

echo json_encode($respuesta);