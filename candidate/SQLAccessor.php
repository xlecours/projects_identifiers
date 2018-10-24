<?php
namespace LORIS\StudyEntities\Candidate;

class SQLAccessor
{
    public function __construct(\Database $database)
    {
        $this->database = $database;
    }
    
    /**
     * @throws \NotFound When the candidate is missing
     */
    public function getCandidateByCandID(CandID $candid): TransferObject
    {
        $results = $this->database->pselectRow(
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

        $props = $this->propsFromDBRow($results);
        return (new TransferObject())->fromProps(...$props);
    }

    protected function propsFromDBRow(array $row): array
    {
        return array(
            new CandID($row['CandID']),
            new PSCID($row['PSCID']),
            new Sex($row['Sex'])
        );
    }
}
