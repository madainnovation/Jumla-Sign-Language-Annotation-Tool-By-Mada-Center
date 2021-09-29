<?php


namespace App\Infrastructure\Interfaces;

interface ValidationInterface
{
    /**
     * @return array
     */
    public function getValidationRule():array;

    /**
     * @return array
     */
    public function getValidationMessage():array;
    public function exceptRule(array $keys);
    public function validate();
}
