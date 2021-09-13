<?php

namespace APP\models;

use SRC\model\Database;
use PDO;


class USERS_Model extends Database
{

    public function question($question_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_questions WHERE unique_id="' . $question_parsed_url[1] . '" and url="' . $question_parsed_url[2] . '"')->fetch(PDO::FETCH_ASSOC);
    }

    public function answers($question_parsed_url)
    {
        $user = $this->db->query('SELECT * FROM sy_users WHERE username="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        return $this->db->query('SELECT * FROM sy_answers WHERE user_id="' . $user['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rate_answers()
    {
        return $this->db->query('SELECT * FROM sy_rate_answers WHERE user_id="' . $_SESSION['user']['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tags()
    {
        return $this->db->query('SELECT * FROM sy_tags')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function questions($question_parsed_url)
    {
        $user = $this->db->query('SELECT * FROM sy_users WHERE username="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        return $this->db->query('SELECT * FROM sy_questions WHERE user_id="' . $user['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function answers_question()
    {
        return $this->db->query('SELECT * FROM sy_questions')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function questions_limit($start, $end, $filter, $question_parsed_url)
    {
        $user = $this->db->query('SELECT * FROM sy_users WHERE username="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        return $this->db->query('SELECT * FROM sy_questions WHERE user_id="' . $user['id'] . '" ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function answers_limit($start, $end, $filter, $question_parsed_url)
    {
        $user = $this->db->query('SELECT * FROM sy_users WHERE username="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        return $this->db->query('SELECT * FROM sy_answers WHERE user_id="' . $user['id'] . '" ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function question_pages($question_parsed_url)
    {
        $user = $this->db->query('SELECT * FROM sy_users WHERE username="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        $total_results = $this->db->query('SELECT * FROM sy_questions  WHERE user_id="' . $user['id'] . '"')->fetchAll();
        return ceil(count($total_results) / 7);
    }

    public function answer_pages($question_parsed_url)
    {
        $user = $this->db->query('SELECT * FROM sy_users WHERE username="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        $total_results = $this->db->query('SELECT * FROM sy_answers  WHERE user_id="' . $user['id'] . '"')->fetchAll();
        return ceil(count($total_results) / 7);
    }

    public function question_tags($question_id)
    {
        return $this->db->query('SELECT * FROM sy_question_tags WHERE question_id="' . $question_id . '"')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function questions_tags()
    {
        return $this->db->query('SELECT * FROM sy_question_tags')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function users()
    {
        return $this->db->query('SELECT * FROM sy_users')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function user_edit($question_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_users WHERE id="' . $_SESSION['user']['id'] . '"')->fetch(PDO::FETCH_ASSOC);
    }
}
