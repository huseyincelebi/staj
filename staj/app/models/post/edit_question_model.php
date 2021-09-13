<?php

namespace APP\models\post;

use SRC\model\Database;
use PDO;


class EDIT_QUESTION_Model extends Database
{
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
            $question = $this->db->query('SELECT * FROM sy_questions WHERE id="' . $_POST['q_e_id'] . '"')->fetch(PDO::FETCH_ASSOC);
            header('Location: ../questions/' . $question['unique_id'] . '/' . url_converter($_POST['q_e_title']));
        endif;
    }
}
