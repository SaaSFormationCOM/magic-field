<?php

declare(strict_types=1);

namespace SaaSFormation\Field\Traits;

trait IntegerCapable
{
    public function integer(): int
    {
        $converted = $this->value;

        if (is_float($converted)) {
            $converted = (int)round($converted, 0);
        } else {
            $converted = (int)$converted;
        }

        return $converted;
    }

    public function integerOrNull(): ?string
    {
        $converted = $this->value;

        if(!is_null($converted)) {
            $converted = $this->integer();
        }

        return $converted;
    }
}
