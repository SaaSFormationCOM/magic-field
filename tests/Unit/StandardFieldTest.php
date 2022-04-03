<?php

declare(strict_types=1);

namespace SaaSFormation\Field\Tests\Unit;

use SaaSFormation\Field\InvalidConversionException;
use SaaSFormation\Field\StandardField;
use PHPUnit\Framework\TestCase;

class StandardFieldTest extends TestCase
{
    private \DateTime $expectedDatetime;

    protected function setUp(): void
    {
        $this->expectedDatetime = new \DateTime('2020-01-01 10:00:00');
    }

    /**
     * @test
     * @return void
     */
    public function checkStringReturnsAProperStringFromAString(): void
    {
        // Arrange
        $value = "This is a test";
        $expectedConvertedValue = $value;

        // Act
        $converted = (new StandardField($value))->string();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkStringReturnsAProperStringFromAnInteger(): void
    {
        // Arrange
        $value = 1;
        $expectedConvertedValue = "1";

        // Act
        $converted = (new StandardField($value))->string();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkStringReturnsAProperStringFromAFloat(): void
    {
        // Arrange
        $value = 1.05;
        $expectedConvertedValue = "1.05";

        // Act
        $converted = (new StandardField($value))->string();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkStringReturnsAProperStringFromABooleanTrue(): void
    {
        // Arrange
        $value = true;
        $expectedConvertedValue = "true";

        // Act
        $converted = (new StandardField($value))->string();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkStringReturnsAProperStringFromABooleanFalse(): void
    {
        // Arrange
        $value = false;
        $expectedConvertedValue = "false";

        // Act
        $converted = (new StandardField($value))->string();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkIntegerReturnsAProperIntegerFromAnInteger(): void
    {
        // Arrange
        $value = 2;
        $expectedConvertedValue = 2;

        // Act
        $converted = (new StandardField($value))->integer();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkIntegerReturnsAProperIntegerFromAString(): void
    {
        // Arrange
        $value = "2";
        $expectedConvertedValue = 2;

        // Act
        $converted = (new StandardField($value))->integer();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkIntegerReturnsAProperIntegerFromABooleanTrue(): void
    {
        // Arrange
        $value = true;
        $expectedConvertedValue = 1;

        // Act
        $converted = (new StandardField($value))->integer();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkIntegerReturnsAProperIntegerFromABooleanFalse(): void
    {
        // Arrange
        $value = false;
        $expectedConvertedValue = 0;

        // Act
        $converted = (new StandardField($value))->integer();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkIntegerReturnsAProperIntegerFromAFloatRoundingDown(): void
    {
        // Arrange
        $value = 1.25;
        $expectedConvertedValue = 1;

        // Act
        $converted = (new StandardField($value))->integer();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkIntegerReturnsAProperIntegerFromAFloatRoundingUp(): void
    {
        // Arrange
        $value = 1.50;
        $expectedConvertedValue = 2;

        // Act
        $converted = (new StandardField($value))->integer();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkBooleanReturnsAProperBooleanFromABooleanTrue(): void
    {
        // Arrange
        $value = true;
        $expectedConvertedValue = true;

        // Act
        $converted = (new StandardField($value))->boolean();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkBooleanReturnsAProperBooleanFromABooleanFalse(): void
    {
        // Arrange
        $value = false;
        $expectedConvertedValue = false;

        // Act
        $converted = (new StandardField($value))->boolean();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkBooleanReturnsAProperBooleanFromAStringTrue(): void
    {
        // Arrange
        $value = "true";
        $expectedConvertedValue = true;

        // Act
        $converted = (new StandardField($value))->boolean();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkBooleanReturnsAProperBooleanFromAStringFalse(): void
    {
        // Arrange
        $value = "false";
        $expectedConvertedValue = false;

        // Act
        $converted = (new StandardField($value))->boolean();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkBooleanThrowsAnExceptionWhenAnInvalidStringIsProvided(): void
    {
        // Arrange
        $this->expectException(InvalidConversionException::class);
        $value = "foo";

        // Act
        (new StandardField($value))->boolean();

        // Assert
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkBooleanReturnsAProperBooleanFromAnInteger1(): void
    {
        // Arrange
        $value = "true";
        $expectedConvertedValue = 1;

        // Act
        $converted = (new StandardField($value))->boolean();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkBooleanReturnsAProperBooleanFromAnInteger0(): void
    {
        // Arrange
        $value = "false";
        $expectedConvertedValue = 0;

        // Act
        $converted = (new StandardField($value))->boolean();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkBooleanThrowsAnExceptionWhenAnInvalidIntegerIsProvided(): void
    {
        // Arrange
        $this->expectException(InvalidConversionException::class);
        $value = 2;

        // Act
        (new StandardField($value))->boolean();

        // Assert
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkBooleanThrowsAnExceptionWhenAFloatIsProvided(): void
    {
        // Arrange
        $this->expectException(InvalidConversionException::class);
        $value = 1.0;

        // Act
        (new StandardField($value))->boolean();

        // Assert
    }

    public function validDateTimeDataProvider(): array
    {
        return [
            ['2020-01-01 10:00:00', null],
            ['01-01-2020 10:00:00', 'd-m-Y H:i:s']
        ];
    }

    /**
     * @test
     * @dataProvider validDateTimeDataProvider
     * @param mixed $value
     * @param string|null $format
     * @return void
     * @throws InvalidConversionException
     */
    public function checkAProperDateTimeIsReturnedWhenAProperDateTimeValueIsProvided(mixed $value, ?string $format): void
    {
        // Arrange

        // Act
        $dateTime = (new StandardField($value))->datetime($format);

        // Assert
        $this->assertEquals($this->expectedDatetime, $dateTime);
    }

    public function invalidDateTimeDataProvider(): array
    {
        return [
            [1],
            [2.5],
            [false],
            [true],
            ["date"]
        ];
    }

    /**
     * @test
     * @dataProvider invalidDateTimeDataProvider
     * @param mixed $value
     * @return void
     * @throws InvalidConversionException
     */
    public function checkAnExceptionIsThrownWhenAnInvalidDateTimeValueIsProvided(mixed $value): void
    {
        // Arrange
        $this->expectException(InvalidConversionException::class);

        // Act
        (new StandardField($value))->datetime();

        // Assert
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkFloatReturnsAProperFloatFromAFloat(): void
    {
        // Arrange
        $value = 1.25;
        $expectedConvertedValue = 1.25;

        // Act
        $converted = (new StandardField($value))->float();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkFloatReturnsAProperFloatFromString(): void
    {
        // Arrange
        $value = "1.25";
        $expectedConvertedValue = 1.25;

        // Act
        $converted = (new StandardField($value))->float();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     * @throws InvalidConversionException
     */
    public function checkFloatReturnsAProperFloatFromAnInteger(): void
    {
        // Arrange
        $value = 3;
        $expectedConvertedValue = 3.0;

        // Act
        $converted = (new StandardField($value))->float();

        // Assert
        $this->assertEquals($expectedConvertedValue, $converted);
    }

    /**
     * @test
     * @return void
     */
    public function checkFloatThrowsAnExceptionWhenABooleanIsProvided(): void
    {
        // Arrange
        $value = true;
        $this->expectException(InvalidConversionException::class);

        // Act
        (new StandardField($value))->float();

        // Assert
    }

    public function validArrayDataProvider(): array
    {
        return [
            [[]],
            [['foo' => 'bar']],
            [['foo' => ['bar']]]
        ];
    }

    /**
     * @test
     * @dataProvider validArrayDataProvider
     * @param mixed $value
     * @return void
     * @throws InvalidConversionException
     */
    public function checkArrayReturnsArrayWhenAnArrayIsProvided(mixed $value)
    {
        // Arrange

        // Act
        $result = (new StandardField($value))->array();

        // Assert
        $this->assertIsArray($result);
    }

    public function invalidArrayDataProvider(): array
    {
        return [
            ['foo', 'string'],
            [1, 'integer'],
            [1.5, 'double'],
            [true, 'boolean'],
            [false, 'boolean'],
            [new \DateTime(), 'DateTime']
        ];
    }

    /**
     * @test
     * @dataProvider invalidArrayDataProvider
     * @param mixed $value
     * @return void
     * @throws InvalidConversionException
     */
    public function checkArrayThrowsExceptionWhenAnInvalidArrayIsProvided(mixed $value, string $type)
    {
        // Arrange
        $this->expectException(InvalidConversionException::class);
        $this->expectErrorMessage("It's not safe to convert $type to array");

        // Act
        (new StandardField($value))->array();

        // Assert
    }
}
