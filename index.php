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

$f3->route('GET|POST /survey', function($f3)
{
    //blank var for sticky question
    $surveyName = "";

    $f3->set('questions', getQuestions());

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $surveyName = $_POST['name'];
        //validate!
        if(validName($surveyName))
        {
            $_SESSION['surveyName'] = $surveyName;
        }
        else
        {
            $f3->set('errors["name"]', "Please enter your name.");
        }

        if(isset($_POST['questions']))
        {
            $surveyQuestions = $_POST['questions'];
            if(validAnswer($surveyQuestions))
            {
                $_SESSION['surveyQuestions'] = implode(", ", $surveyQuestions);
            }
            else
            {
                $f3->set('errors["questions"]', "Please enter valid answers.");
            }

        } else{
            $f3->set('errors["questions"]', "Please select at least one answer.");
        }

        //redirect user to next page if no errors
        if(empty($f3->get('errors')))
        {
            $f3->reroute('complete');
        }
    }

    $f3->set('name', $surveyName);

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