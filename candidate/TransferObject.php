<?php
/**
 * This is a container for all Canddiate properties.
 *
 * There should be limited logic in it.
 * It's purpose is to be tranferable accross the application
 * for the using class to know nothing about candidates class 
 * functionnality. It only contains data about a candidate.
 */

namespace LORIS\StudyEntities\Candidate;

class TransferObject implements Candidate
{
    protected $candid;
    protected $pscid;
    protected $sex;

    public function __construct()
    {
    }

    public function fromProps(
        ?CandID $candid,
        ?PSCID $pscid, // Kept here because the column is not nullable, for now. Should be an array of identifier.
        ?Sex $sex
    ): TransferObject {
        $new = clone($this);
        $new->candid = $candid;
        $new->pscid  = $pscid;
        $new->sex = $sex;
        return $new;
    }

    public function fromDBRow(array $row): TransferObject
    {
        $new = clone($this);
        $new->candid = $row['CandID'];
        $new->pscid  = $row['PSCID'];
        $new->sex = $row['Sex'];
        return $new;
    }

    public function getCandID(): CandID
    {
        return $this->candid;
    }

    public function getIdentifiers(): array
    {
        return array($this->candid, $this->pscid);
    }

    public function getSex(): Sex
    {
        return $this->sex;
    }
}
 
