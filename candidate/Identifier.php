<?php
namespace LORIS\StudyEntities\Candidate;

interface Identifier
{
    public function getType(): string;
    public function __toString(): string;
}

class ExternalID extends ValidatableIdentifier
{
    public function __construct($value)
    {
       parent::__construct($value);
    } 

    public function getType(): string
    {
        return 'ExternalID';
    }

    protected function validate(string $value): bool
    {
        // Who are we to know?
        return true;
    }
}


abstract class ValidatableIdentifier implements Identifier
{
    protected $value;

    abstract protected function validate(string $value): bool;

    public function __construct(string $value)
    {
        if (!$this->validate($value)) {
            throw new DomainException('The value is not valid');
        }
        $this->value = $value;
    }
}

