<?php

declare(strict_types=1);

namespace SaaSFormation\Field\Traits;

trait StringCapable
{
    public function string(): string
    {
        $convertedValue = $this->value;

        if(is_bool($convertedValue)) {
            if($convertedValue) {
                $convertedValue = "true";
            } else {
                $convertedValue = "false";
            }
        } else {
            $convertedValue = (string)$convertedValue;
        }

        return $convertedValue;
    }

    public function stringOrNull(): ?string
    {
        $converted = $this->value;

        if(!is_null($converted)) {
            $converted = $this->string();
        }

        return $converted;
    }
}
