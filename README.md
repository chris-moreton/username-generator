# Simple username generator

This is a super-simple username generator, generating names such as "Juicy Falcon" or "Super Pink Osprey".

Add to project using Composer
-----------------------------

    composer require chris-moreton/username-generator
    
Usage
-----
    include 'vendor/autoload.php';

    use Netsensia\Usernames\Generator;
    
    $generator = new Generator();
    
    // create a username with two parts, e.g. Humble-Strawberry
    $username = $generator->generate(2);
    
Development
-----------

### Clone the repo and compose

    git clone git@github.com:chris-moreton/username-generator
    cd username-generator
    php composer.phar install

### Run the tests

    bin/phpspec run --format=pretty -vvv --stop-on-failure
