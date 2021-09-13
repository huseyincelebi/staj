<?php

use SRC\model\Database;

$database = new Database();
if (isset($_POST['action']) && isset($_POST['question_id']) && isset($_POST['answer_id'])) :
    $rate = $database->db->query('SELECT * FROM sy_rate_answers WHERE answer_id ="' . $_POST['answer_id'] . '" and user_id ="' . $_SESSION['user']['id'] . '"')->fetch(PDO::FETCH_ASSOC);
    if ($rate == null) :
        if ($_POST['action'] == 'like') :
            $query = $database->db->prepare("INSERT INTO sy_rate_answers(user_id,answer_id,rate_type) VALUES(:user_id,:answer_id,:rate_type)");
            $query->execute(array(":user_id" => $_SESSION['user']['id'], ":answer_id" => $_POST['answer_id'], ":rate_type" => '1'));
            $query = $database->db->prepare("UPDATE sy_answers SET rate_point=rate_point + 1 WHERE id='" . $_POST['answer_id'] . "'");
            $query->execute();
        elseif ($_POST['action'] == 'dislike') :
            $query = $database->db->prepare("INSERT INTO sy_rate_answers(user_id,answer_id,rate_type) VALUES(:user_id,:answer_id,:rate_type)");
            $query->execute(array(":user_id" => $_SESSION['user']['id'], ":answer_id" => $_POST['answer_id'], ":rate_type" => '-1'));
            $query = $database->db->prepare("UPDATE sy_answers SET rate_point=rate_point - 1 WHERE id='" . $_POST['answer_id'] . "'");
            $query->execute();
        endif;
    else :
        if ($_POST['action'] == 'like') :
            if ($rate['rate_type'] != 1) :
                $query = $database->db->prepare("DELETE FROM sy_rate_answers WHERE user_id ='" . $_SESSION['user']['id'] . "' and answer_id='" . $_POST['answer_id'] . "'");
                $query->execute();
                $query = $database->db->prepare("UPDATE sy_answers SET rate_point=rate_point + 1 WHERE id='" . $_POST['answer_id'] . "'");
                $query->execute();
            endif;
        elseif ($_POST['action'] == 'dislike') :
            if ($rate['rate_type'] != -1) :
                $query = $database->db->prepare("DELETE FROM sy_rate_answers WHERE user_id ='" . $_SESSION['user']['id'] . "' and answer_id='" . $_POST['answer_id'] . "'");
                $query->execute();
                $query = $database->db->prepare("UPDATE sy_answers SET rate_point=rate_point - 1 WHERE id='" . $_POST['answer_id'] . "'");
                $query->execute();
            endif;
        endif;
    endif;
    $rate = $database->db->query('SELECT * FROM sy_rate_answers WHERE answer_id ="' . $_POST['answer_id'] . '" and user_id ="' . $_SESSION['user']['id'] . '"')->fetch(PDO::FETCH_ASSOC);
    $answer = $database->db->query('SELECT * FROM sy_answers WHERE id ="' . $_POST['answer_id'] . '"')->fetch(PDO::FETCH_ASSOC);
    if (isset($rate['rate_type'])) :
        $answer['rate_type'] = $rate['rate_type'];
    else :
        $answer['rate_type'] = '0';
    endif;
    header('Content-Type: application/json');
    echo json_encode($answer);
endif;
