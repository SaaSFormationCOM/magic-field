<?php

declare(strict_types=1);

namespace SaaSFormation\Field\Traits;

use SaaSFormation\Field\InvalidConversionException;

trait BooleanCapable
{
    /**
     * @return bool
     * @throws InvalidConversionException
     */
    public function boolean(): bool
    {
        $converted = $this->value;

        if(is_string($converted)) {
            if($converted === "true") {
                $converted = true;
            } elseif($converted === "false") {
                $converted = false;
            } else {
                throw new InvalidConversionException("It's not safe to convert $converted string to boolean");
            }
        } elseif(is_float($converted)) {
            throw new InvalidConversionException("It's not safe to convert a float value to boolean");
        } elseif(is_integer($converted)) {
            if($converted === 1) {
                $converted = true;
            } elseif($converted === 0) {
                $converted = false;
            } else {
                throw new InvalidConversionException("It's not safe to convert $converted integer to boolean");
            }
        }

        return $converted;
    }

    /**
     * @return string|null
     * @throws InvalidConversionException
     */
    public function booleanOrNull(): ?string
    {
        $converted = $this->value;

        if(!is_null($converted)) {
            $converted = $this->boolean();
        }

        return $converted;
    }
}
