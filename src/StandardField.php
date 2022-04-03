<?php

declare(strict_types=1);

namespace SaaSFormation\Field;

use SaaSFormation\Field\Traits\ArrayCapable;
use SaaSFormation\Field\Traits\BooleanCapable;
use SaaSFormation\Field\Traits\DateTimeCapable;
use SaaSFormation\Field\Traits\FloatCapable;
use SaaSFormation\Field\Traits\IntegerCapable;
use SaaSFormation\Field\Traits\StringCapable;

class StandardField extends Field
{
    use StringCapable;
    use IntegerCapable;
    use BooleanCapable;
    use DateTimeCapable;
    use FloatCapable;
    use ArrayCapable;
}
