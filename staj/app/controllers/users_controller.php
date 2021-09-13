<?php

namespace APP\controllers;

use SRC\controller\Controller;
use SRC\lib\Request;
use DateTime;

class USERS_Controller extends Controller
{
    //Kullanıcı Profili Görüntüleme Sayfası
    public function users(Request $request, $question_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $questions_model = $this->model('USERS_Model');
            $questions_count = $questions_model->questions($question_parsed_url);
            $answers_count = $questions_model->answers($question_parsed_url);
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            if (!isset($_GET['page'])) :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date DESC", $question_parsed_url);
                elseif ($_GET['filter'] == "questions") :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date DESC", $question_parsed_url);
                elseif ($_GET['filter'] == "answers") :
                    $questions = $questions_model->answers_limit(0, 7, "ORDER BY create_date DESC", $question_parsed_url);
                endif;
            else :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $question_parsed_url);
                elseif ($_GET['filter'] == "questions") :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $question_parsed_url);
                elseif ($_GET['filter'] == "answers") :
                    $questions = $questions_model->answers_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $question_parsed_url);
                endif;
            endif;
            if (!isset($_GET['filter']) or $_GET['filter'] != 'answers') :
                $pages = $questions_model->question_pages($question_parsed_url);
            else :
                $pages = $questions_model->answer_pages($question_parsed_url);
            endif;
            $username = $question_parsed_url[1];
            $answers_question = $questions_model->answers_question();
            $this->View('signed_in/users_view', [
                'questions' => $questions,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages,
                'username' => $username,
                'answers_question' => $answers_question,
                'answers_count' => $answers_count
            ]);
        else :
            $questions_model = $this->model('USERS_Model');
            $questions_count = $questions_model->questions($question_parsed_url);
            $answers_count = $questions_model->answers($question_parsed_url);
            $users = $questions_model->users();
            $questions_tags = $questions_model->questions_tags();
            $tags = $questions_model->tags();
            if (!isset($_GET['page'])) :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date DESC", $question_parsed_url);
                elseif ($_GET['filter'] == "questions") :
                    $questions = $questions_model->questions_limit(0, 7, "ORDER BY create_date DESC", $question_parsed_url);
                elseif ($_GET['filter'] == "answers") :
                    $questions = $questions_model->answers_limit(0, 7, "ORDER BY create_date DESC", $question_parsed_url);
                endif;
            else :
                if (!isset($_GET['filter'])) :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $question_parsed_url);
                elseif ($_GET['filter'] == "questions") :
                    $questions = $questions_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $question_parsed_url);
                elseif ($_GET['filter'] == "answers") :
                    $questions = $questions_model->answers_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC", $question_parsed_url);
                endif;
            endif;
            if (!isset($_GET['filter']) or $_GET['filter'] != 'answers') :
                $pages = $questions_model->question_pages($question_parsed_url);
            else :
                $pages = $questions_model->answer_pages($question_parsed_url);
            endif;
            $username = $question_parsed_url[1];
            $answers_question = $questions_model->answers_question();
            $this->View('users_view', [
                'questions' => $questions,
                'questions_count' => $questions_count,
                'users' => $users,
                'questions_tags' => $questions_tags,
                'tags' => $tags,
                'pages' => $pages,
                'username' => $username,
                'answers_question' => $answers_question,
                'answers_count' => $answers_count
            ]);
        endif;
    }
    //Kullanıcı Profili Düzenleme Sayfası
    public function users_edit(Request $request, $question_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $users_edit_model = $this->model('USERS_Model');
            $users_edit = $users_edit_model->user_edit($question_parsed_url);
            $this->View('signed_in/user_edit_view', [
                'users_edit' => $users_edit
            ]);
        else :

        endif;
    }
}
