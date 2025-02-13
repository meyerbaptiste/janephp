<?php

namespace Docker\Api\Validator;

class SwarmSpecEncryptionConfigConstraint extends \Symfony\Component\Validator\Constraints\Compound
{
    protected function getConstraints($options): array
    {
        return [new \Symfony\Component\Validator\Constraints\Collection(['fields' => ['AutoLockManagers' => new \Symfony\Component\Validator\Constraints\Optional([new \Symfony\Component\Validator\Constraints\Type(['0' => 'bool'])])], 'allowExtraFields' => true])];
    }
}