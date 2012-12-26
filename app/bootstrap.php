<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__.'/app.sqlite',
    ),
));

$app->get('/', function () use ($app) {
    return $app['twig']->render('home.twig', array());
});

$app->get('/about/{name}', function ($name) use ($app) {
    return $app['twig']->render('about.twig', array(
        'name' => $name,
    ));
});

$app->get('/user/{id}/{username}', function ($id, $username) use ($app) {
    $sql = "SELECT * FROM users WHERE id = ? AND username = ?";
    $user = $app['db']->fetchAssoc($sql, array((int) $id, $username));

    return $app['twig']->render('users.twig', array(
        'user' => $user,
    ));
});

$app->run();
