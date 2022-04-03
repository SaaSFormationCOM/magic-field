<?php

namespace SaaSFormation\Field\Traits;

use SaaSFormation\Field\InvalidConversionException;

trait ArrayCapable
{
    /**
     * @throws InvalidConversionException
     */
    public function array(): array {
        $converted = $this->value;

        if(!is_array($converted)) {
            $type = "";
            if(is_object($converted)) {
                $type = get_class($converted);
            } else {
                $type = gettype($converted);
            }
            throw new InvalidConversionException("It's not safe to convert $type to array");
        }

        return $converted;
    }

    /**
     * @return string|null
     * @throws InvalidConversionException
     */
    public function arrayOrNull(): ?string
    {
        $converted = $this->value;

        if(!is_null($converted)) {
            $converted = $this->array();
        }

        return $converted;
    }
}
