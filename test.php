<?php

require_once('./candidate/Candidate.php');
require_once('./candidate/TransferObject.php');
require_once('./candidate/SQLAccessor.php');
require_once('./candidate/Controller.php');
require_once('./candidate/Identifier.php');
require_once('./candidate/CandID.php');
require_once('./candidate/Sex.php');

use \LORIS\StudyEntities\Candidate\Controller;
use \LORIS\StudyEntities\Candidate\CandID;

class Database {
    public function pselectRow($q,$p) {
        return array(
            'CandID' => 123456,
            'PSCID'  => 'ABC123',
            'Sex'    => 'Female'
        );
    }
}

class NotFound extends \Exception {}

// Add a ExternalID to an existing candidate
$cc = new Controller(new Database());
$c1 = $cc->getCandidateByCandID(new CandID('123456'));
var_dump($c1);

$i  = new ExternalID('This is not wrong!');
$c1 = $cc->addCandidateIdentifer($c1, $i);

