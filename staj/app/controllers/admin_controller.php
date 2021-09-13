<?php

namespace APP\controllers;

use SRC\controller\Controller;
use SRC\lib\Request;

class ADMIN_Controller extends Controller
{

    public function main()
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $this->View('signed_in/admin/admin_view');
        endif;
    }

    public function users()
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            if (!isset($_GET['page'])) :
                $users_limit = $admin_model->users_limit(0, 7, "ORDER BY id ASC");
            else :
                $users_limit = $admin_model->users_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY id ASC");
            endif;
            $users_page = $admin_model->users_page();
            $this->View('signed_in/admin/admin_users_view', [
                'users_limit' => $users_limit,
                'users_page' => $users_page
            ]);
        endif;
    }

    public function questions()
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            if (!isset($_GET['page'])) :
                $questions_limit = $admin_model->questions_limit(0, 7, "ORDER BY id ASC");
            else :
                $questions_limit = $admin_model->questions_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY id ASC");
            endif;
            $questions_page = $admin_model->questions_page();
            $this->View('signed_in/admin/admin_questions_view', [
                'questions_limit' => $questions_limit,
                'questions_page' => $questions_page
            ]);
        endif;
    }

    public function questions_delete(Request $request, $question_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            $admin_model->questions_delete($question_parsed_url);
        endif;
    }

    public function questions_edit(Request $request, $question_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            $admin_model->questions_edit($question_parsed_url);
            $questions_edit = $admin_model->questions_edit($question_parsed_url);
            $edit_tags = $admin_model->question_tags($question_parsed_url);
            $tags = $admin_model->tags();
            $this->View('signed_in/admin/admin_question_edit_view', [
                'questions_edit' => $questions_edit,
                'edit_tags' => $edit_tags,
                'tags' => $tags
            ]);
        endif;
    }

    public function tags()
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            if (!isset($_GET['page'])) :
                $tags_limit = $admin_model->tags_limit(0, 7, "ORDER BY id ASC");
            else :
                $tags_limit = $admin_model->tags_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY id ASC");
            endif;
            $tags_page = $admin_model->tags_page();
            $this->View('signed_in/admin/admin_tags_view', [
                'tags_limit' => $tags_limit,
                'tags_page' => $tags_page
            ]);
        endif;
    }

    public function tags_delete(Request $request, $question_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            $admin_model->tags_delete($question_parsed_url);
        endif;
    }

    public function tags_edit(Request $request, $question_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            $tags_edit = $admin_model->tags_edit($question_parsed_url);
            $this->View('signed_in/admin/admin_tag_edit_view', [
                'tags_edit' => $tags_edit
            ]);
        endif;
    }

    public function answers()
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            if (!isset($_GET['page'])) :
                $answers_limit = $admin_model->answers_limit(0, 7, "ORDER BY id ASC");
            else :
                $answers_limit = $admin_model->answers_limit((7 * ($_GET['page'] - 1)), 7, "ORDER BY id ASC");
            endif;
            $answers_page = $admin_model->answers_page();
            $this->View('signed_in/admin/admin_answers_view', [
                'answers_limit' => $answers_limit,
                'answers_page' => $answers_page
            ]);
        endif;
    }

    public function answers_delete(Request $request, $question_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            $admin_model->answers_delete($question_parsed_url);
        endif;
    }

    public function answers_edit(Request $request, $question_parsed_url)
    {
        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == true) :
            $admin_model = $this->model('ADMIN_Model');
            $answers_edit = $admin_model->answers_edit($question_parsed_url);
            $this->View('signed_in/admin/admin_answer_edit_view', [
                'answers_edit' => $answers_edit
            ]);
        endif;
    }
}
