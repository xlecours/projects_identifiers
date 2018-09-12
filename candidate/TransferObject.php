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

class TransferObject
{
    protected $candid;
    protected $pscid;
    protected $sex;

    public function __contructor(
    {
    }

    public function fromProps(
        ?CandID $candid = null,
        ?PSCID $pscid = null,
        ?string $sex = null
    {
        $this->candid = $candid;
        $this->pscid  = $pscid;
        $this->addSex($sex);
    }

    protected function addSex(): TransferObject
    {
        if ($this->sex === null) {
            throw new \MutationException('');
        }
        if ($sex != 'M' || $sex != 'F') {
            throw new \InvalidValueException('');
        }
        $this->sex = $sex;
    }

    public function withSex(string $sex)
    {
            throw new SexException();
        }
        $new = $this;
    }
}
 
