Unit testing
=========

Introduction
------------

Installation
------------

PEAR installation is deprecated:
pear.phpunit.de will be shut down on December, 31 2014

Global installation:

```console
wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
sudo mv phpunit.phar /usr/local/bin/phpunit
phpunit --version
```

Composer installation:

```console
"require-dev": {
    "phpunit/phpunit": "4.2.*"
}
```

Accessing protected and private properties
------------

Testing abstract classes
------------

Generating MySql fixtures
------------
```console
mysqldump --xml -t test > /path/to/test/_fixtures/unit_test_tutorial.xml
```

Code coverage
------------

Testing db-connected classes
------------

