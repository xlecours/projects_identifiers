<?php

namespace LORIS\StudyEntities\Candidate;

class Controller 
{
    /**
     * @var Database
     */
    protected $sa;

    public function __construct(\Database $database)
    {
        $this->sa = new SQLAccessor($database);
    }

    public function getCandidateByCandID(CandID $candid): Candidate
    {
        return $this->sa->getCandidateByCandID($candid);
    }
}

