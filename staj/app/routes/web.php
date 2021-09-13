<?php

use SRC\route\Route;
use SRC\controller\Controller;

$router = new Route;

$router->route(
    route: '/',
    routemethod: 'GET',
    controllermethod: 'main',
    controller: 'MAIN_Controller'
);

$router->route(
    route: '/questions',
    routemethod: 'GET',
    controllermethod: 'questions',
    controller: 'QUESTIONS_Controller'
);

$router->route(
    route: '/search',
    routemethod: 'GET',
    controllermethod: 'search',
    controller: 'QUESTIONS_Controller'
);

$router->route(
    route: '/users/:a',
    routemethod: 'GET',
    controllermethod: 'users',
    controller: 'USERS_Controller'
);

$router->route(
    route: '/user/edit',
    routemethod: 'GET',
    controllermethod: 'users_edit',
    controller: 'USERS_Controller'
);

$router->route(
    route: '/tags',
    routemethod: 'GET',
    controllermethod: 'tags',
    controller: 'QUESTIONS_Controller'
);

$router->route(
    route: '/tags/:d',
    routemethod: 'GET',
    controllermethod: 'tag',
    controller: 'QUESTIONS_Controller'
);

$router->route(
    route: '/questions/:d/:a',
    routemethod: 'GET',
    controllermethod: 'question',
    controller: 'QUESTIONS_Controller'
);

$router->route(
    route: '/questions/edit/:d',
    routemethod: 'GET',
    controllermethod: 'question_edit',
    controller: 'QUESTIONS_Controller'
);

$router->route(
    route: '/questions/answer/edit/:d',
    routemethod: 'GET',
    controllermethod: 'answer_edit',
    controller: 'QUESTIONS_Controller'
);

/* POST İşlemleri İçin Router Tanımlanması */
$router->group(
    group: '/post',
    routes: function () use ($router) {
        $router->route(
            route: '/sign_up',
            routemethod: 'POST',
            routefunction: function () {
                $sign_up_model = (new Controller)->model('post\SIGN_UP_Model');
                $sign_up_model->sign_up();
            }
        );
        $router->route(
            route: '/sign_in',
            routemethod: 'POST',
            routefunction: function () {
                $sign_in_model = (new Controller)->model('post\SIGN_IN_Model');
                $sign_in_model->sign_in();
            }
        );
        $router->route(
            route: '/sign_out',
            routemethod: 'GET',
            routefunction: function () {
                unset($_SESSION['user']);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        );
        $router->route(
            route: '/ask_question',
            routemethod: 'POST',
            routefunction: function () {
                $ask_question_model = (new Controller)->model('post\ASK_QUESTION_Model');
                $ask_question_model->ask_question();
            }
        );
        $router->route(
            route: '/edit_question',
            routemethod: 'POST',
            routefunction: function () {
                $edit_question_model = (new Controller)->model('post\EDIT_QUESTION_Model');
                $edit_question_model->edit_question();
            }
        );
        $router->route(
            route: '/edit_answer',
            routemethod: 'POST',
            routefunction: function () {
                $edit_answer_model = (new Controller)->model('post\EDIT_ANSWER_Model');
                $edit_answer_model->edit_answer();
            }
        );
        $router->route(
            route: '/edit_profile',
            routemethod: 'POST',
            routefunction: function () {
                $edit_user_model = (new Controller)->model('post\EDIT_USER_Model');
                $edit_user_model->edit_user();
            }
        );
        $router->route(
            route: '/answer_question',
            routemethod: 'POST',
            routefunction: function () {
                $answer_question_model = (new Controller)->model('post\ANSWER_QUESTION_Model');
                $answer_question_model->answer_question();
            }
        );
        $router->route(
            route: '/follow_tag',
            routemethod: 'POST',
            routefunction: function () {
                $answer_question_model = (new Controller)->model('post\FOLLOW_TAG_Model');
                $answer_question_model->follow_tag();
            }
        );
        $router->route(
            route: '/unfollow_tag',
            routemethod: 'POST',
            routefunction: function () {
                $answer_question_model = (new Controller)->model('post\FOLLOW_TAG_Model');
                $answer_question_model->unfollow_tag();
            }
        );
        $router->route(
            route: '/rate_answer',
            routemethod: 'POST',
            routefunction: function () {
                require_once '../../app/ajax/rate_answer.php';
            }
        );
        $router->route(
            route: '/solution_question',
            routemethod: 'POST',
            routefunction: function () {
                require_once '../../app/ajax/solution_question.php';
            }
        );
        $router->route(
            route: '/fetch_all_tags',
            routemethod: 'GET',
            routefunction: function () {
                require_once '../../app/ajax/fetch_all_tags.php';
            }
        );
    }
);

$router->group(
    group: '/admin',
    routes: function () use ($router) {
        $router->route(
            route: '/',
            routemethod: 'GET',
            controllermethod: 'main',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/users',
            routemethod: 'GET',
            controllermethod: 'users',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/questions',
            routemethod: 'GET',
            controllermethod: 'questions',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/questions/:d',
            routemethod: 'GET',
            controllermethod: 'questions_edit',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/questions/:d/delete',
            routemethod: 'GET',
            controllermethod: 'questions_delete',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/questions/edit',
            routemethod: 'POST',
            routefunction: function () {
                $edit_question_model = (new Controller)->model('ADMIN_Model');
                $edit_question_model->edit_question();
            },
            middleware: 'admin'
        );
        $router->route(
            route: '/tags',
            routemethod: 'GET',
            controllermethod: 'tags',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/tags/:d',
            routemethod: 'GET',
            controllermethod: 'tags_edit',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/tags/:d/delete',
            routemethod: 'GET',
            controllermethod: 'tags_delete',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/tags/edit',
            routemethod: 'POST',
            routefunction: function () {
                $edit_question_model = (new Controller)->model('ADMIN_Model');
                $edit_question_model->edit_tag();
            },
            middleware: 'admin'
        );
        $router->route(
            route: '/answers',
            routemethod: 'GET',
            controllermethod: 'answers',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/answers/:d',
            routemethod: 'GET',
            controllermethod: 'answers_edit',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/answers/:d/delete',
            routemethod: 'GET',
            controllermethod: 'answers_delete',
            controller: 'ADMIN_Controller',
            middleware: 'admin'
        );
        $router->route(
            route: '/answers/edit',
            routemethod: 'POST',
            routefunction: function () {
                $edit_question_model = (new Controller)->model('ADMIN_Model');
                $edit_question_model->edit_answer();
            },
            middleware: 'admin'
        );
    }
);

$router->dispatch();
