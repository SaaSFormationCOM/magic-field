<?php

declare(strict_types=1);

namespace SaaSFormation\Field\Traits;

use SaaSFormation\Field\InvalidConversionException;

trait FloatCapable
{
    /**
     * @throws InvalidConversionException
     */
    public function float(): float
    {
        $converted = $this->value;

        if(is_bool($converted)) {
            throw new InvalidConversionException("It's not safe to convert a boolean to float");
        } elseif(is_string($converted)) {
            $converted = (float)$converted;
        }

        return $converted;
    }
}
