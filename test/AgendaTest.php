<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Domain\Agenda;
use App\Domain\Contact;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Surname;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\PhoneNumber;

class AgendaTest extends TestCase
{
    public function testAgendaIsEmptyOnCreation(): void
    {
        $agenda = new Agenda();

        $this->assertEmpty($agenda->getContacts());
    }

    public function testContactIsCorrectlyAdded(): void
    {
        $agenda = new Agenda();

        $contact = new Contact(
            new Name('John'),
            new Surname('Doe'),
            new Email('john@example.com'),
            new PhoneNumber('600123123')
        );

        $agenda->add($contact);

        $this->assertCount(1, $agenda->getContacts());
        $this->assertSame($contact, $agenda->getContacts()[0]);
    }

    public function testAddMultipleContactsIncreasesCount(): void
    {
        $agenda = new Agenda();

        $agenda->add(new Contact(
            new Name('John'),
            new Surname('Doe'),
            new Email('john@example.com'),
            new PhoneNumber('600123123')
        ));

        $agenda->add(new Contact(
            new Name('Jane'),
            new Surname('Smith'),
            new Email('jane@example.com'),
            new PhoneNumber('600456456')
        ));

        $this->assertCount(2, $agenda->getContacts());
    }

    public function testContactIsCorrectlyRemoved(): void
    {
        $agenda = new Agenda();

        $agenda->add(new Contact(
            new Name('John'),
            new Surname('Doe'),
            new Email('john@example.com'),
            new PhoneNumber('600123123')
        ));

        $agenda->add(new Contact(
            new Name('Jane'),
            new Surname('Smith'),
            new Email('jane@example.com'),
            new PhoneNumber('600456456')
        ));

        $agenda->removeContactById(0);

        $this->assertCount(1, $agenda->getContacts());
        $this->assertArrayHasKey(0, $agenda->getContacts());
    }

    public function testSearchBySurnameReturnsMatch(): void
    {
        $agenda = new Agenda();

        $contact = new Contact(
            new Name('John'),
            new Surname('Doe'),
            new Email('john@example.com'),
            new PhoneNumber('600123123')
        );

        $agenda->add($contact);

        $this->assertCount(1, $agenda->searchBySurname('Doe'));
        $this->assertCount(1, $agenda->searchBySurname('Do'));
    }

    public function testSearchBySurnameReturnsEmptyWhenNoMatch(): void
    {
        $agenda = new Agenda();

        $contact = new Contact(
            new Name('John'),
            new Surname('Doe'),
            new Email('john@example.com'),
            new PhoneNumber('600123123')
        );

        $agenda->add($contact);

        $this->assertEmpty($agenda->searchBySurname('NoMatch'));
    }
}