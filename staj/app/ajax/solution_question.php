<?php

use SRC\model\Database;

$database = new Database();
if (isset($_POST['action']) && isset($_POST['question_id']) && isset($_POST['answer_id'])) :
    $answer = $database->db->query('SELECT * FROM sy_answers WHERE id ="' . $_POST['answer_id'] . '"')->fetch(PDO::FETCH_ASSOC);
    $answers = $database->db->query('SELECT * FROM sy_answers WHERE question_id = "' . $_POST['question_id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
    $question = $database->db->query('SELECT * FROM sy_questions WHERE id ="' . $_POST['question_id'] . '"')->fetch(PDO::FETCH_ASSOC);
    if ($answer != null) :
        if ($question['solution'] == 0) :
            $query = $database->db->prepare("UPDATE sy_answers SET solution=1 WHERE id='" . $_POST['answer_id'] . "'");
            $query->execute();
            $query = $database->db->prepare("UPDATE sy_questions SET solution=1 WHERE id='" . $_POST['question_id'] . "'");
            $query->execute();
        elseif ($question['solution'] == 1 and $answer['solution'] == 1) :
            $query = $database->db->prepare("UPDATE sy_answers SET solution=0 WHERE id='" . $_POST['answer_id'] . "'");
            $query->execute();
            $query = $database->db->prepare("UPDATE sy_questions SET solution=0 WHERE id='" . $_POST['question_id'] . "'");
            $query->execute();
        else :
            $query = $database->db->prepare("UPDATE sy_answers SET solution=0 WHERE id='" . $answers[array_search(1, array_column($answers, 'solution'))]['id'] . "'");
            $oldsolution = $answers[array_search(1, array_column($answers, 'solution'))]['id'];
            $query->execute();
            $query = $database->db->prepare("UPDATE sy_answers SET solution=1 WHERE id='" . $_POST['answer_id'] . "'");
            $query->execute();
        endif;
    endif;
    $solution = $database->db->query('SELECT * FROM sy_questions WHERE id ="' . $_POST['question_id'] . '"')->fetch(PDO::FETCH_ASSOC);
    if (isset($oldsolution)) :
        $solution['oldsolution'] = $oldsolution;
    else :
        $solution['oldsolution'] = -1;
    endif;
    header('Content-Type: application/json');
    echo json_encode($solution);
endif;
