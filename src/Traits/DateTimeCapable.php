<?php

namespace SaaSFormation\Field\Traits;

use SaaSFormation\Field\InvalidConversionException;

trait DateTimeCapable
{
    /**
     * @param string|null $format
     * @return \DateTime
     * @throws InvalidConversionException
     */
    public function datetime(?string $format = null): \DateTime
    {
        $converted = $this->value;

        if(!is_string($converted)) {
            throw new InvalidConversionException("$converted cannot be converted to datetime");
        }

        try {
            if($format) {
                $converted = \DateTime::createFromFormat($format, $converted);
            } else {
                $converted = new \DateTime($converted);
            }
        } catch(\Exception) {
            throw new InvalidConversionException("$converted cannot be converted to datetime");
        }

        return $converted;
    }
}
