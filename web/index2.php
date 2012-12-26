<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';
// header('Content-Type: text/html; charset=utf-8');

$app = new Silex\Application();

$app->get('/', function () {
    return 'selam';
});

/*
$blogPosts = array(
    1 => array(
        'date'      => '2011-03-29',
        'author'    => 'igorw',
        'title'     => 'Using Silex',
        'body'      => '...',
    ),
);

$test = false;

$app->get('/', function () use ($blogPosts) {
    $output = '';
    foreach ($blogPosts as $post) {
        $output .= $post['title'];
        $output .= '<br />';
        $output .= $post['author'];
    }

    return $output;
});

$app->get('/sin', function () {
    $output = 'Tuana Şeyma Eldem';

    return $output;
});

$app->get('/test', function () {
    $output = 'selam';
    return $output;
});

$app->get('/users/{id}', function ($id) use ($app, $test) {
    $user = ['name' => 'Tuana Şeyma Eldem'];
    // $user = false;

    if (!$user) {
        $error = array('message' => 'The user was not found.');
        return $app->json($error, 404);
    }

    return $app->json($user);
});
*/
$app->run();
