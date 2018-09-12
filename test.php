<?php

require('./candidate/Controller.php');

// Add a ExternalID to an existing candidate
$d  = \Database::singleton();

$cc = new \LORIS\StudyEntities\Candidate\Controller($d);
$c1 = $cc->getCandidateByCandID(new CandID('1234'));

var_dump($candidate_controller);

