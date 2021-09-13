<?php

namespace APP\controllers;

use SRC\controller\Controller;
use SRC\lib\Request;
use DateTime;

class QUESTIONS_Controller extends Controller
{
    //Sorular Sayfası
    public function questions()
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $questions_model = $this->model('QUESTIONS_Model');
            $questions_count = $questions_model->questions();
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            if (!isset($_GET['page'])) :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date DESC");
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date DESC");
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date ASC");
                endif;
            else :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC");
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC");
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date ASC");
                endif;
            endif;
            $pages = $questions_model->question_pages();
            $this->View('signed_in/questions_view', [
                'questions' => $questions,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages
            ]);
        else :
            $questions_model = $this->model('QUESTIONS_Model');
            $questions_count = $questions_model->questions();
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            if (!isset($_GET['page'])) :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date DESC");
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date DESC");
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date ASC");
                endif;
            else :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC");
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC");
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date ASC");
                endif;
            endif;
            $pages = $questions_model->question_pages();
            $this->View('questions_view', [
                'questions' => $questions,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages
            ]);
        endif;
    }
    //Arama Sayfası
    public function search()
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $questions_model = $this->model('QUESTIONS_Model');
            $questions_count = $questions_model->search_questions($_GET['title']);
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            if (!isset($_GET['page'])) :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->search_questions_limit(0, 7, "ORDER BY create_date DESC", $_GET['title']);
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->search_questions_limit(0, 7, "ORDER BY create_date DESC", $_GET['title']);
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->search_questions_limit(0, 7, "ORDER BY create_date ASC", $_GET['title']);
                endif;
            else :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->search_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $_GET['title']);
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->search_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $_GET['title']);
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->search_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date ASC", $_GET['title']);
                endif;
            endif;
            $pages = $questions_model->search_question_pages($_GET['title']);
            $this->View('signed_in/search_view', [
                'questions' => $questions,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages
            ]);
        else :
            $questions_model = $this->model('QUESTIONS_Model');
            $questions_count = $questions_model->search_questions($_GET['title']);
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            if (!isset($_GET['page'])) :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->search_questions_limit(0, 7, "ORDER BY create_date DESC", $_GET['title']);
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->search_questions_limit(0, 7, "ORDER BY create_date DESC", $_GET['title']);
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->search_questions_limit(0, 7, "ORDER BY create_date ASC", $_GET['title']);
                endif;
            else :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->search_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $_GET['title']);
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->search_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $_GET['title']);
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->search_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date ASC", $_GET['title']);
                endif;
            endif;
            $pages = $questions_model->search_question_pages($_GET['title']);
            $this->View('search_view', [
                'questions' => $questions,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages
            ]);
        endif;
    }
    //Soru Sayfası
    public function question(Request $request, $question_parsed_url)
    {
        function time_elapsed_string($datetime, $full = false)
        {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = array(
                'y' => 'yıl',
                'm' => 'ay',
                'w' => 'hafta',
                'd' => 'gün',
                'h' => 'saat',
                'i' => 'dakika',
                's' => 'saniye',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v;
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' önce' : 'şimdi';
        }
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $questions_model = $this->model('QUESTIONS_Model');
            $question = $questions_model->question($question_parsed_url);
            if ($question == null) :
                http_response_code(404);
                require_once "../../app/templates/404.php";
                return;
            endif;
            $answers = $questions_model->answers($question['id']);
            $users = $questions_model->users();
            $time = time_elapsed_string($question['create_date']);
            $rate_answers = $questions_model->rate_answers();
            $tags = $questions_model->tags();
            $question_tags = $questions_model->question_tags($question['id']);
            $this->View('signed_in/question_view', [
                'question' => $question,
                'time' => $time,
                'answers' => $answers,
                'users' => $users,
                'rate_answers' => $rate_answers,
                'tags' => $tags,
                'question_tags' => $question_tags
            ]);
        else :
            $questions_model = $this->model('QUESTIONS_Model');
            $question = $questions_model->question($question_parsed_url);
            if ($question == null) :
                http_response_code(404);
                require_once "../../app/templates/404.php";
                return;
            endif;
            $answers = $questions_model->answers($question['id']);
            $users = $questions_model->users();
            $time = time_elapsed_string($question['create_date']);
            $tags = $questions_model->tags();
            $question_tags = $questions_model->question_tags($question['id']);
            $this->View('question_view', [
                'question' => $question,
                'time' => $time,
                'answers' => $answers,
                'users' => $users,
                'tags' => $tags,
                'question_tags' => $question_tags
            ]);
        endif;
    }
    //Tag Sayfası
    public function tag(Request $request, $tag_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $questions_model = $this->model('QUESTIONS_Model');
            $questions_count = $questions_model->questions();
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            $tag = $questions_model->tag($tag_parsed_url);
            $tag_questions_count = $questions_model->tag_questions_count($tag_parsed_url);
            if (!isset($_GET['page'])) :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->tag_questions_limit(0, 7, "ORDER BY create_date DESC", $tag_parsed_url);
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->tag_questions_limit(0, 7, "ORDER BY create_date DESC", $tag_parsed_url);
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->tag_questions_limit(0, 7, "ORDER BY create_date ASC", $tag_parsed_url);
                endif;
            else :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->tag_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $tag_parsed_url);
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->tag_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $tag_parsed_url);
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->tag_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date ASC", $tag_parsed_url);
                endif;
            endif;
            $pages = $questions_model->tag_question_pages($tag_parsed_url);
            $follow = $questions_model->follow($tag_parsed_url);
            $this->View('signed_in/tag_view', [
                'questions' => $questions,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages,
                'tag' => $tag,
                'tag_questions_count' => $tag_questions_count,
                'follow' => $follow
            ]);
        else :
            $questions_model = $this->model('QUESTIONS_Model');
            $questions_count = $questions_model->questions();
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            $tag = $questions_model->tag($tag_parsed_url);
            $tag_questions_count = $questions_model->tag_questions_count($tag_parsed_url);
            if (!isset($_GET['page'])) :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->tag_questions_limit(0, 7, "ORDER BY create_date DESC", $tag_parsed_url);
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->tag_questions_limit(0, 7, "ORDER BY create_date DESC", $tag_parsed_url);
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->tag_questions_limit(0, 7, "ORDER BY create_date ASC", $tag_parsed_url);
                endif;
            else :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->tag_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $tag_parsed_url);
                elseif ($_GET['filter'] == "newest") :
                    $questions = $questions_model->tag_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $tag_parsed_url);
                elseif ($_GET['filter'] == "oldest") :
                    $questions = $questions_model->tag_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date ASC", $tag_parsed_url);
                endif;
            endif;
            $pages = $questions_model->tag_question_pages($tag_parsed_url);
            $this->View('tag_view', [
                'questions' => $questions,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages,
                'tag' => $tag,
                'tag_questions_count' => $tag_questions_count
            ]);
        endif;
    }
    //Taglar Sayfası
    public function tags()
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $questions_model = $this->model('QUESTIONS_Model');
            $questions_count = $questions_model->tags();
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            if (!isset($_GET['page'])) :
                $tags = $questions_model->tags_limit(0, 7, "ORDER BY id DESC");
            else :
                $tags = $questions_model->tags_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY id DESC");
            endif;
            $pages = $questions_model->tags_pages();
            $this->View('signed_in/tags_view', [
                'tags' => $tags,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages
            ]);
        else :
            $questions_model = $this->model('QUESTIONS_Model');
            $questions_count = $questions_model->tags();
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            if (!isset($_GET['page'])) :
                $tags = $questions_model->tags_limit(0, 7, "ORDER BY id DESC");
            else :
                $tags = $questions_model->tags_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY id DESC");
            endif;
            $pages = $questions_model->tags_pages();
            $this->View('tags_view', [
                'tags' => $tags,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages
            ]);
        endif;
    }
    //Soru Düzenleme Sayfası
    public function question_edit(Request $request, $tag_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $questions_model = $this->model('QUESTIONS_Model');
            $edit_question = $questions_model->edit_question($tag_parsed_url);
            if ($_SESSION['user']['id'] != $edit_question['user_id']) :
                http_response_code(404);
                require_once "../../app/templates/404.php";
                return;
            endif;
            $edit_tags = $questions_model->edit_tags($tag_parsed_url);
            $tags = $questions_model->tags();
            $this->View('signed_in/question_edit_view', [
                'edit_question' => $edit_question,
                'edit_tags' => $edit_tags,
                'tags' => $tags
            ]);
        else :
            http_response_code(404);
            require_once "../../app/templates/404.php";
            return;
        endif;
    }

    public function answer_edit(Request $request, $tag_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $questions_model = $this->model('QUESTIONS_Model');
            $edit_answer = $questions_model->edit_answer($tag_parsed_url);
            if ($_SESSION['user']['id'] != $edit_answer['user_id']) :
                http_response_code(404);
                require_once "../../app/templates/404.php";
                return;
            endif;
            $this->View('signed_in/answer_edit_view', [
                'edit_answer' => $edit_answer
            ]);
        else :
            http_response_code(404);
            require_once "../../app/templates/404.php";
            return;
        endif;
    }
}
