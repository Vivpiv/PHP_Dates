<?php
/**
 * Created by PhpStorm.
 * User: wilder20
 * Date: 28/09/18
 * Time: 14:12
 */

require "../src/TimeTravel.php";

$travel = new TimeTravel();

$startDateString = '1985-12-31';
$interval = '-1000000000 seconds';

$startTravel = new DateTime($startDateString);
$endTravel = new DateTime($startDateString);
$endTravel->add(DateInterval::createFromDateString($interval));

//Obtenir l'écart entre date de début de voyage et la date de fin sous un format Y-M-D...
echo $travel->getTravelInfo($startTravel,$endTravel);


//Obtenir la date d'arrivée
echo $travel->findDate($startTravel,$interval);


//Obtenir les dates "étape" pour revenir àla date départ
$step = new DatePeriod($endTravel,new DateInterval('P1M8D'),new DateTime($startDateString),DatePeriod::EXCLUDE_START_DATE);
$travel->backToFutureStepByStep($step);

var_dump($travel->backToFutureStepByStep($step));
