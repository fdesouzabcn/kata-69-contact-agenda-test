<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Surname;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\PhoneNumber;

class ValueObjectTest extends TestCase
{
    // ==================
    // Name
    // ==================

    public function testValidNameIsCreated(): void
    {
        $name = new Name('John');

        $this->assertSame('John', (string) $name);
    }

    public function testValidSurnameIsCreated(): void
    {
        $surname = new Surname('Doe');

        $this->assertSame('Doe', (string) $surname);
    }

    public function testValidEmailIsCreated(): void
    {
        $email = new Email('john@example.com');

        $this->assertSame('john@example.com', (string) $email);
    }

    public function testValidPhoneNumberIsCreated(): void
    {
        $phone = new PhoneNumber('600123123');

        $this->assertSame('600123123', (string) $phone);
    }


    public function testNameThrowsExceptionWhenEmpty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Name cannot be empty.');

        new Name('');
    }

    public function testSurnameThrowsExceptionWhenEmpty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Surname cannot be empty.');

        new Surname('');
    }

    public function testEmailThrowsExceptionWhenEmpty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid email address.');

        new Email('');
    }

    public function testPhoneNumberThrowsExceptionWhenInvalidChars(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid phone number.');

        new PhoneNumber('abc123');
    }
}