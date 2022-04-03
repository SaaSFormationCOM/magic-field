<?php

declare(strict_types=1);

namespace SaaSFormation\Field;

abstract class Field
{
    protected mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }
}
