<?php

namespace APP\controllers;

use SRC\controller\Controller;
use SRC\lib\Request;

class MAIN_Controller extends Controller
{

    public function main()
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $questions_model = $this->model('QUESTIONS_Model');
            $follows = $questions_model->follows();
            if ($follows != null) :
                $questions_count = $questions_model->questions();
                $users = $questions_model->users();
                $questions_tags = $questions_model->questions_tags();
                $tags = $questions_model->tags();
                if (!isset($_GET['page'])) :
                    if (!isset($_GET['filter'])) :
                        $questions = $questions_model->follow_questions_limit(0, 7, "ORDER BY create_date DESC");
                    elseif ($_GET['filter'] == "newest") :
                        $questions = $questions_model->follow_questions_limit(0, 7, "ORDER BY create_date DESC");
                    elseif ($_GET['filter'] == "oldest") :
                        $questions = $questions_model->follow_questions_limit(0, 7, "ORDER BY create_date ASC");
                    endif;
                else :
                    if (!isset($_GET['filter'])) :
                        $questions = $questions_model->follow_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC");
                    elseif ($_GET['filter'] == "newest") :
                        $questions = $questions_model->follow_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date DESC");
                    elseif ($_GET['filter'] == "oldest") :
                        $questions = $questions_model->follow_questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY create_date ASC");
                    endif;
                endif;
                $pages = $questions_model->follow_question_pages();
                $follow_questions_count = $questions_model->follow_questions_count();
                $this->View('signed_in/main_view', [
                    'questions' => $questions,
                    'questions_count' => $questions_count,
                    'users' => $users,
                    'questions_tags' => $questions_tags,
                    'tags' => $tags,
                    'pages' => $pages,
                    'follow_questions_count' => $follow_questions_count,
                    'follows' => $follows
                ]);
            else :
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
                $this->View('signed_in/main_view', [
                    'follows' => $follows,
                    'questions' => $questions,
                    'questions_count' => $questions_count,
                    'users' => $users,
                    'questions_tags' => $questions_tags,
                    'tags' => $tags,
                    'pages' => $pages
                ]);
            endif;
        else :
            $this->View('main_view');
        endif;
    }
}
