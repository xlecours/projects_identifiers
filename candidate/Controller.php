<?php

namespace LORIS\StudyEntities\Candidate;

class Controller 
{
    /**
     * @var Database
     */
    protected $dao;

    public function __construct(\Database $database)
    {
        $this->sa = new SQLAccessor($database);
    }

    public function getCandidateByCandID(CandID $candid): Candidate
    {
        return $this->sa->getCandidateByCandID($candid);
    }

    public function addIdentifier(Candidate $c, Identifier $i): Candidate
    {
        $c = $c->withIdentifier($i);
        if ($i->isInvalid()) throw new \InvalidIdentifierException();

        $this->database->prepare();

        //$cdto = $this->cdao->addIdentifier($c->asDTO(), $i);
        //return new Candidate($cdto);
    }

    public function getCandidateByIdentifier(Identifier $identifier): Candidate
    {
        $candid = $identifier->toCandID();
        $arrayCandidate = $this->database->pselectRow(
            'SELECT
               CandID,
               PSCID,
               Sex
            from candidate WHERE Candid = :v_candid',
            array('v_candid' => $candid)
        );
        $two = (new TransferObject())->fromProps(
            new CandID($arrayCandidate['CandID']),
            new PSCID($arrayCandidate['PSCID']),
            $arrayCandidate['Sex']
        );
        return $this->getCandidateFromArray($two);
    }

    protected function getCandidateFromArray(TransferObject $transferObject): Candidate
    {
        
    }

    protected function saveCandidate() {}
}
