# FieldMagic

FieldMagic is a library to convert mixed values into desired typed values -when doable.

It is very useful, for instance, when reading JSON body requests in controllers.

## Installation

Use composer to require the library:

```bash
composer require saasformation/field-magic
```

## Getting started

Let's imagine you have the following array with data (maybe from a json_decode call):

```php
$data = [
    'name' => 'John',
    'birthdate' => '1990-02-03',
    'height' => 177,
    'alive' => true,
    'highSchoolQualificationsAverage' => 4.56,
    'professions' => [
        'computing engineer',
        'soldier'
    ]
];
```

Now, you can do the following:

```php
$name = (new StandardField($data['name']))->string();
$birthdate = (new StandardField($data['birthdate']))->datetime();
$height = (new StandardField($data['height']))->integer();
$alive = (new StandardField($data['alive']))->boolean();
$highSchoolQualificationsAverage = (new StandardField($data['highSchoolQualificationsAverage']))->float();
$professions = (new StandardField($data['professions']))->array();
```

Two advantages:

1. You now have the value typed.
2. If any of the source values were not compatible with type changing, an InvalidConversionException would be thrown.

If you were going to get data from a JSON body request in a controller, you could do something as cool as this:

```php
abstract class BaseController {
    protected function field(string $path): StandardField {
        return new StandardField($this->getFromBodyRequestByPath($path));
    }
}

class Controller extends BaseController {
    public function doSomething(): Response {
        $this->commandBus->handle(
            new CreatePersonCommand(
                $this->field('data.attributes.name')->string(),
                $this->field('data.attributes.birthdate')->datetime(),
                $this->field('data.attributes.height')->integer(),
                $this->field('data.attributes.alive')->boolean(),
                $this->field('data.attributes.highSchoolQualificationsAverage')->float(),
                $this->field('data.attributes.professions')->array(),
            )
        )
    }
}
```

## Adding a new converter

Sometimes you don't have enough with the StandardField converters available.

To add a new one, you have to create a new trait:

```php
trait MyConverterCapable {
    public function addOneToInteger(): integer {
        return (int)$this->value + 1;
    }
}
```

Bear in mind ```$this->value``` is a mixed value, so for production proposes you may validate data better than in this example.

Now, you need to create a new Field class. If you want to have all the StandardField converters also available, you can inherit from
StandardField. If not, directly from Field:

```php
class MyConverterField extends StandardField
{
    use MyConverterCapable;
}
```

Now you can just use the new Field based class the same way as the StandardField one:

```php
$addedInteger = (new MyConverterField(1)->addOneToInteger(); // 2
```
