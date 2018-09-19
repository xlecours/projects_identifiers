<?php
namespace LORIS\StudyEntities\Candidate;

interface Candidate
{
    public function getCandID(): CandID;
    public function getIdentifiers(): array; //Array of Identifiers
    public function getSex(): Sex;
}

