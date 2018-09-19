<?php
namespace LORIS\StudyEntities\Candidate;

class Sex
{
    protected $sex;

    public function __construct(string $value)
    {
        if (preg_match('/Female|Male/', $value) !== 1) {
            throw new \DomainException('Value not supported by LORIS');
        }
        $this->sex = $value;
    }

    public function __toString(): string
    {
        return $this->sex;
    }
}

