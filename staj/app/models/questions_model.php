<?php

namespace APP\models;

use SRC\model\Database;
use PDO;


class QUESTIONS_Model extends Database
{
    //Question ve Questions Sayfası
    public function question($question_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_questions WHERE unique_id="' . $question_parsed_url[1] . '" and url="' . $question_parsed_url[2] . '"')->fetch(PDO::FETCH_ASSOC);
    }

    public function answers($question_id)
    {
        return $this->db->query('SELECT * FROM sy_answers WHERE question_id="' . $question_id . '" ORDER BY solution DESC,rate_point DESC')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rate_answers()
    {
        return $this->db->query('SELECT * FROM sy_rate_answers WHERE user_id="' . $_SESSION['user']['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tags()
    {
        return $this->db->query('SELECT * FROM sy_tags')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function questions()
    {
        return $this->db->query('SELECT * FROM sy_questions')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function questions_limit($start, $end, $filter)
    {
        return $this->db->query('SELECT * FROM sy_questions ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function question_pages()
    {
        $total_results = $this->db->query('SELECT * FROM sy_questions')->fetchAll();
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

    //Tag Sayfası
    public function tag_question_pages($tag_parsed_url)
    {
        $tag = $this->db->query('SELECT * FROM sy_tags WHERE id="' . $tag_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        $tag_questions = $this->db->query('SELECT * FROM sy_question_tags WHERE tag_id="' . $tag['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
        $questions = [];
        foreach ($tag_questions as $tag_question) :
            array_push($questions, $this->db->query('SELECT * FROM sy_questions WHERE id="' . $tag_question['question_id'] . '"')->fetch(PDO::FETCH_ASSOC));
        endforeach;
        return ceil(count($questions) / 7);
    }

    public function tag_questions_limit($start, $end, $filter, $tag_parsed_url)
    {
        $tag = $this->db->query('SELECT * FROM sy_tags WHERE id="' . $tag_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        $tag_questions = $this->db->query('SELECT * FROM sy_question_tags WHERE tag_id="' . $tag['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
        $questions_id = [];
        foreach ($tag_questions as $tag_question) :
            array_push($questions_id, $tag_question['question_id']);
        endforeach;
        return $this->db->query('SELECT * FROM sy_questions WHERE id IN (' . implode(',', $questions_id) . ') ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tag_questions_count($tag_parsed_url)
    {
        $tag = $this->db->query('SELECT * FROM sy_tags WHERE id="' . $tag_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        $tag_questions = $this->db->query('SELECT * FROM sy_question_tags WHERE tag_id="' . $tag['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
        return count($tag_questions);
    }

    public function tag($tag_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_tags WHERE id="' . $tag_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
    }

    public function follow($tag_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_follows WHERE tag_id="' . $tag_parsed_url[1] . '" and user_id="' . $_SESSION['user']['id'] . '"')->fetch(PDO::FETCH_ASSOC);
    }

    public function tags_limit($start, $end, $filter)
    {
        return $this->db->query('SELECT * FROM sy_tags ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tags_pages()
    {
        $total_results = $this->db->query('SELECT * FROM sy_tags')->fetchAll();
        return ceil(count($total_results) / 7);
    }

    //Anasayfa
    public function follow_questions_limit($start, $end, $filter)
    {
        $follows = $this->db->query('SELECT * FROM sy_follows WHERE user_id="' . $_SESSION['user']['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
        $tags_id = [];
        foreach ($follows as $follow) :
            array_push($tags_id, $follow['tag_id']);
        endforeach;
        $tag_questions = $this->db->query('SELECT * FROM sy_question_tags WHERE tag_id IN (' . implode(',', $tags_id) . ')')->fetchAll(PDO::FETCH_ASSOC);
        $questions_id = [];
        foreach ($tag_questions as $tag_question) :
            array_push($questions_id, $tag_question['question_id']);
        endforeach;
        return $this->db->query('SELECT * FROM sy_questions WHERE id IN (' . implode(',', array_unique($questions_id)) . ') ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }
    public function follow_questions_count()
    {
        $follows = $this->db->query('SELECT * FROM sy_follows WHERE user_id="' . $_SESSION['user']['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
        $tags_id = [];
        foreach ($follows as $follow) :
            array_push($tags_id, $follow['tag_id']);
        endforeach;
        $tag_questions = $this->db->query('SELECT * FROM sy_question_tags WHERE tag_id IN (' . implode(',', $tags_id) . ')')->fetchAll(PDO::FETCH_ASSOC);
        $questions_id = [];
        foreach ($tag_questions as $tag_question) :
            array_push($questions_id, $tag_question['question_id']);
        endforeach;
        return count($this->db->query('SELECT * FROM sy_questions WHERE id IN (' . implode(',', array_unique($questions_id)) . ')')->fetchAll(PDO::FETCH_ASSOC));
    }
    public function follow_question_pages()
    {
        $follows = $this->db->query('SELECT * FROM sy_follows WHERE user_id="' . $_SESSION['user']['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
        $tags_id = [];
        foreach ($follows as $follow) :
            array_push($tags_id, $follow['tag_id']);
        endforeach;
        $tag_questions = $this->db->query('SELECT * FROM sy_question_tags WHERE tag_id IN (' . implode(',', $tags_id) . ')')->fetchAll(PDO::FETCH_ASSOC);
        $questions_id = [];
        foreach ($tag_questions as $tag_question) :
            array_push($questions_id, $tag_question['question_id']);
        endforeach;
        $total_results = $this->db->query('SELECT * FROM sy_questions WHERE id IN (' . implode(',', array_unique($questions_id)) . ')')->fetchAll(PDO::FETCH_ASSOC);
        return ceil(count($total_results) / 7);
    }
    public function follows()
    {
        return $this->db->query('SELECT * FROM sy_follows WHERE user_id="' . $_SESSION['user']['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
    }
    //Search
    public function search_questions($search)
    {
        return $this->db->query('SELECT * FROM sy_questions WHERE title LIKE "' . $search . '"')->fetchAll(PDO::FETCH_ASSOC);
    }
    public function search_questions_limit($start, $end, $filter, $search)
    {
        return $this->db->query('SELECT * FROM sy_questions WHERE title LIKE "' . $search . '" ' . $filter . ' LIMIT ' . $start . ',' . $end . '')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search_question_pages($search)
    {
        $total_results = $this->db->query('SELECT * FROM sy_questions  WHERE title LIKE "' . $search . '"')->fetchAll();
        return ceil(count($total_results) / 7);
    }
    //Edit
    public function edit_question($tag_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_questions WHERE id="' . $tag_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
    }

    public function edit_tags($tag_parsed_url)
    {
        $question = $this->db->query('SELECT * FROM sy_questions WHERE id="' . $tag_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
        return $this->db->query('SELECT * FROM sy_question_tags WHERE question_id="' . $question['id'] . '"')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function edit_answer($tag_parsed_url)
    {
        return $this->db->query('SELECT * FROM sy_answers WHERE id="' . $tag_parsed_url[1] . '"')->fetch(PDO::FETCH_ASSOC);
    }
}
