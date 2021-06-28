<?php
/*
Consider the case of a hiring manager. It is impossible for one person to interview for each of the positions. 
Based on the job opening, she has to decide and delegate the interview steps to different people.

In plain words:

It provides a way to delegate the instantiation logic to child classes.
*/

/////////////////////////////////////////////////////////////////////
// Taking our hiring manager example above. First of all we have 
// an interviewer interface and some implementations for it
/////////////////////////////////////////////////////////////////////
interface Interviewer
{
    public function askQuestions();
}

class Developer implements Interviewer
{
    public function askQuestions()
    {
        echo 'Asking about design patterns!';
    }
}

class CommunityExecutive implements Interviewer
{
    public function askQuestions()
    {
        echo 'Asking about community building';
    }
}

/////////////////////////////////////////////////////////////////////
// Now let us create our HiringManager
/////////////////////////////////////////////////////////////////////
abstract class HiringManager
{

    // Factory method
    abstract protected function makeInterviewer(): Interviewer;

    public function takeInterview()
    {
        $interviewer = $this->makeInterviewer();
        $interviewer->askQuestions();
    }
}

/////////////////////////////////////////////////////////////////////
// Now any child can extend it and provide the required interviewer
/////////////////////////////////////////////////////////////////////
class DevelopmentManager extends HiringManager
{
    protected function makeInterviewer(): Interviewer
    {
        return new Developer();
    }
}

class MarketingManager extends HiringManager
{
    protected function makeInterviewer(): Interviewer
    {
        return new CommunityExecutive();
    }
}

/////////////////////////////////////////////////////////////////////
// and then it can be used as
/////////////////////////////////////////////////////////////////////
$devManager = new DevelopmentManager();
$devManager->takeInterview(); // Output: Asking about design patterns

$marketingManager = new MarketingManager();
$marketingManager->takeInterview(); // Output: Asking about community building.

?>