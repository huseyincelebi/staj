<?php

namespace APP\models\post;

use SRC\model\Database;
use PDO;


class ANSWER_QUESTION_Model extends Database
{
    public function answer_question()
    {
        print_r($_POST);
        if (isset($_POST['answer_question'])) :
            $query = $this->db->prepare("INSERT INTO sy_answers(user_id,question_id,content) VALUES(:user_id,:question_id,:content)");
            $query->execute(array(":user_id" => $_SESSION['user']['id'], ":question_id" => $_POST['an_q_id'], ":content" => $_POST['an_q_data']));
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        endif;
    }
}
