<?php

namespace APP\models\post;

use SRC\model\Database;
use PDO;


class EDIT_ANSWER_Model extends Database
{
    public function edit_answer()
    {
        print_r($_POST);
        if (isset($_POST['edit_answer'])) :
            $query = $this->db->prepare("UPDATE sy_answers SET content='" . $_POST['a_e_data'] . "' WHERE id='" . $_POST['a_e_id'] . "'");
            $query->execute();
            $answer = $this->db->query('SELECT * FROM sy_answers WHERE id="' . $_POST['a_e_id'] . '"')->fetch(PDO::FETCH_ASSOC);
            $question = $this->db->query('SELECT * FROM sy_questions WHERE id="' . $answer['question_id'] . '"')->fetch(PDO::FETCH_ASSOC);
            header('Location: ../questions/' . $question['unique_id'] . '/' . $question['url']);
        endif;
    }
}
