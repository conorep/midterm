<?php
//output buffering for var dump and troubleshooting
/*ob_start();*/

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');
require('model/validations.php');

session_start();

//instance of Base for f3
$f3 = Base::instance();

$f3->route('GET /', function()
{
    $views = new Template();
    echo $views->render('views/quizhome.html');
});

$f3->route('GET /quiz', function()
{
    $views = new Template();
    echo $views->render('views/quizquestions.html');
});

$f3->route('GET /complete', function()
{
    $views = new Template();
    echo $views->render('views/quizcomplete.html');
});

//run it!
$f3->run();

/*
Conor
SDEV328 Midterm Quiz
index.php
*/