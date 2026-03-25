<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Domain\Contact;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Surname;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\PhoneNumber;

class ContactTest extends TestCase
{
    public function testContactIsCreatedWithValidData(): void
    {
        $contact = new Contact(
            new Name('John'),
            new Surname('Doe'),
            new Email('john@example.com'),
            new PhoneNumber('600123123')
        );

        $this->assertInstanceOf(Contact::class, $contact);
    }

    public function testGetSurnameReturnsCorrectValue(): void
    {
        $contact = new Contact(
            new Name('John'),
            new Surname('Doe'),
            new Email('john@example.com'),
            new PhoneNumber('600123123')
        );

        $this->assertSame('Doe', $contact->getSurname());
    }

    public function testToStringReturnsCorrectFormat(): void
    {
        $contact = new Contact(
            new Name('John'),
            new Surname('Doe'),
            new Email('john@example.com'),
            new PhoneNumber('600123123')
        );

        $expected = 'Doe,John  📞 600123123 ✉️  john@example.com' . PHP_EOL;

        $this->assertSame($expected, (string) $contact);
    }
}