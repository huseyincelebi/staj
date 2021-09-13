<?php

namespace APP\models;

use SRC\model\Database;
use PDO;


class ADMIN_Model extends Database
{
    public function users_limit($start, $end, $filter)
    {
        return $this->db->query('SELECT * FROM sy_users ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function users_page()
    {
        $total_results = $this->db->query('SELECT * FROM sy_users')->fetchAll();
        return ceil(count($total_results) / 7);
    }

    public function questions_limit($start, $end, $filter)
    {
        return $this->db->query('SELECT * FROM sy_questions ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function questions_page()
    {
        $total_results = $this->db->query('SELECT * FROM sy_questions')->fetchAll();
        return ceil(count($total_results) / 7);
    }

    public function questions_delete($question_parsed_url)
    {
        $query = $this->db->prepare("DELETE FROM sy_question_tags WHERE question_id='" . $question_parsed_url[1] . "'");
        $query->execute();
        $query = $this->db->prepare("DELETE FROM sy_questions WHERE id='" . $question_parsed_url[1] . "'");
        $query->execute();
        $query = $this->db->prepare("DELETE FROM sy_answers WHERE question_id='" . $question_parsed_url[1] . "'");
        $query->execute();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function questions_edit($question_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_questions WHERE id="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
    }

    public function question_tags($question_parsed_url)
    {
        $question = $this->db->query('SELECT * FROM sy_questions WHERE id="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        return $this->db->query('SELECT * FROM sy_question_tags WHERE question_id="' . $question['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tags()
    {
        return $this->db->query('SELECT * FROM sy_tags')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function edit_question()
    {
        print_r($_POST);
        if (isset($_POST['edit_question'])) :
            function url_converter($s)
            {
                $tr = array('ş', 'Ş', 'ı', 'I', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'Ç', 'ç', '(', ')', '/', ':', ',');
                $eng = array('s', 's', 'i', 'i', 'i', 'g', 'g', 'u', 'u', 'o', 'o', 'c', 'c', '', '', '-', '-', '');
                $s = str_replace($tr, $eng, $s);
                $s = strtolower($s);
                $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
                $s = preg_replace('/\s+/', '-', $s);
                $s = preg_replace('|-+|', '-', $s);
                $s = preg_replace('/#/', '', $s);
                $s = str_replace('.', '', $s);
                $s = trim($s, '-');
                return $s;
            }
            $query = $this->db->prepare("DELETE FROM sy_question_tags WHERE question_id='" . $_POST['q_e_id'] . "'");
            $query->execute();
            $tags_id = array();
            foreach (array_unique(array_map('trim', explode(',', $_POST['q_e_token']))) as $tag_name) :
                $query = $this->db->prepare("SELECT * FROM sy_tags Where name=?");
                $query->execute(array($tag_name));
                $tag = $query->fetch(PDO::FETCH_ASSOC);
                if ($query->rowCount() > 0) {
                    array_push($tags_id, $tag['id']);
                } else {
                    $query = $this->db->prepare("INSERT INTO sy_tags(name) VALUES(:name)");
                    $query->execute(array(":name" => $tag_name));
                    array_push($tags_id, $this->db->lastInsertId());
                }
            endforeach;
            $query = $this->db->prepare("UPDATE sy_questions SET title='" . $_POST['q_e_title'] . "',content='" . $_POST['q_e_data'] . "',url='" . url_converter($_POST['q_e_title']) . "' WHERE id='" . $_POST['q_e_id'] . "'");
            $query->execute();
            foreach ($tags_id as $tag_id) :
                $query = $this->db->prepare("INSERT INTO sy_question_tags(question_id,tag_id) VALUES(:question_id,:tag_id)");
                $query->execute(array(":question_id" => $_POST['q_e_id'], ":tag_id" => $tag_id));
            endforeach;
            header('Location: ../../admin/questions');
        endif;
    }

    public function tags_limit($start, $end, $filter)
    {
        return $this->db->query('SELECT * FROM sy_tags ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tags_page()
    {
        $total_results = $this->db->query('SELECT * FROM sy_tags')->fetchAll();
        return ceil(count($total_results) / 7);
    }

    public function tags_delete($question_parsed_url)
    {
        $tags = $this->db->query('SELECT * FROM sy_question_tags WHERE tag_id="' . $question_parsed_url[1] . '"')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($tags as $tag) :
            $query = $this->db->prepare("DELETE FROM sy_questions WHERE id='" . $tag['question_id'] . "'");
            $query->execute();
        endforeach;
        $query = $this->db->prepare("DELETE FROM sy_question_tags WHERE tag_id='" . $question_parsed_url[1] . "'");
        $query->execute();
        $query = $this->db->prepare("DELETE FROM sy_tags WHERE id='" . $question_parsed_url[1] . "'");
        $query->execute();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function tags_edit($question_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_tags WHERE id="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
    }

    public function edit_tag()
    {
        print_r($_POST);
        if (isset($_POST['edit_tag'])) :
            $query = $this->db->prepare("UPDATE sy_tags SET name='" . $_POST['t_e_name'] . "' WHERE id='" . $_POST['t_e_id'] . "'");
            $query->execute();
            header('Location: ../../admin/tags');
        endif;
    }

    public function answers_limit($start, $end, $filter)
    {
        return $this->db->query('SELECT * FROM sy_answers ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function answers_page()
    {
        $total_results = $this->db->query('SELECT * FROM sy_answers')->fetchAll();
        return ceil(count($total_results) / 7);
    }

    public function answers_delete($question_parsed_url)
    {
        $answer = $this->db->query('SELECT * FROM sy_answers WHERE id="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        $question = $this->db->query('SELECT * FROM sy_questions WHERE id="' . $answer['question_id'] . '"')->fetch(PDO::FETCH_ASSOC);
        if ($question['solution'] == 1) :
            $query = $this->db->prepare("UPDATE sy_questions SET solution=0 WHERE id='" . $answer['question_id'] . "'");
            $query->execute();
        endif;
        $query = $this->db->prepare("DELETE FROM sy_answers WHERE id='" . $question_parsed_url[1] . "'");
        $query->execute();
        $query = $this->db->prepare("DELETE FROM sy_rate_answers WHERE answer_id='" . $question_parsed_url[1] . "'");
        $query->execute();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function answers_edit($question_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_answers WHERE id="' . $question_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
    }

    public function edit_answer()
    {
        print_r($_POST);
        if (isset($_POST['edit_answer'])) :
            $query = $this->db->prepare("UPDATE sy_answers SET content='" . $_POST['a_e_data'] . "' WHERE id='" . $_POST['a_e_id'] . "'");
            $query->execute();
            header('Location: ../../admin/answers');
        endif;
    }
}
