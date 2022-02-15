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

$f3->route('GET /survey', function($f3)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

    }
    $f3->set('questions', array('I was surprised that this was no standard quiz', 'I like fat free',
        'Today is for sure Monday', 'My cat is on my keyboard currentltljdfj'));

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