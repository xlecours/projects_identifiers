<?php
namespace LORIS\StudyEntities\Candidate;

interface Identifier
{
    public function getType(): string;
    public function __toString(): string;
}

abstract class ValidatableIdentifier implements Identifier
{
    protected $value;

    abstract static protected function validate(string $value): bool;

    public function __construct(string $value)
    {
        if (!static::validate($value)) {
            throw new \DomainException('The value is not valid');
        }
        $this->value = $value;
    }
}

class ExternalID extends ValidatableIdentifier
{
    public function getType(): string
    {
        return 'ExternalID';
    }

    static protected function validate(string $value): bool
    {
        // Who are we to know?
        return true;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}

