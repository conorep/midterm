<?php

function getQuestions()
{
    return array('I was surprised that this was no standard quiz', 'I like fat free',
        'Today is for sure Monday', 'My cat is on my keyboard currentltljdfj');
}

function validName($name)
{
    return strlen($name) >= 3;
}

function validAnswer($answers)
{
    $getQuestions = getQuestions();
    foreach($answers as $answer)
    {
        if(!in_array($answer, $getQuestions))
        {
            return false;
        }
    }
    return true;
}