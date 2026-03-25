# kata-contact-agenda-test

Kata 69 per l'especialitat fullstackPHP 4-12-25

Donat el codi font d'exemple(relatiu a la [kata anterior](https://github.com/CloudSalander/kata-contact-agenda)) o la teva pròpia solució,pensa i programa tests automatitzats.

---

## Running the Tests

This project uses [PHPUnit 11](https://phpunit.de/) for automated testing, managed via [Composer](https://getcomposer.org/).

### Requirements

- PHP 8.1 or higher
- Composer 2.x

### Installation

If you have just cloned the repository, install the dependencies first:
```bash
composer install
```

### Running All Tests
```bash
vendor/bin/phpunit
```

### Expected Output
```
...
OK (20 tests, 31 assertions)
```

### Test Structure
```
test/
    ShowContactsTest.php    # Agenda contact listing (tutor reference)
    AgendaTest.php          # Core tests: add, remove, search
    ContactTest.php         # Core tests: creation and valid sting format
    ValueObjectTest.php     # Core tests: creation and  hrows exception when empty
```

