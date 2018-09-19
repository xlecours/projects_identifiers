<?php
namespace LORIS\StudyEntities\Candidate;

class SQLAccessor
{
    public function __construct(\Database $database)
    {
        $this->database = $database;
    }
    
    /**
     * @throws \RuntimeException When the candidate is
     */
    public function getCandidateByCandID(CandID $candid): TransferObject
    {
        $results = $this->database->pselect(
        '
          SELECT 
            CandID,
            PSCID,
            Sex
          FROM
            candidate
          WHERE
            CandID = :v_candid
        ',
            array('v_candid' => $candid->__toString())
        );

        if ($results === null) throw new \NotFound("Candidate not found");

        return (new TransferObject())->fromProps($results); // We might need a fromDBRow ??
    }
}
