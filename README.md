
STEPS:
-----

>> Project includes tailwind.css with CDN inclusion which can be found in "partials/header.php"
    >> Used components can be found at URI: "https://tailwindui.com/components/preview"

>> Create the database with name: "php-webshop"
>> execute the queries within "database.txt"
    >> 1,2,3 seperately.

>> Within commandline tool, when at the root path of the project (.../WebShop-PHP-MySQL) execute the command:
"""
php -S localhost:8000
 - run php server
"""
>> Then: project can be reached via browser using the URI: "http://localhost:8000/"


>> An admin user is ready to use with login crediantials:
    >> email:    admin@local.test
    >> password: 12341234


>> Note:
    >> ERD last version has a change: should include "One to One" relationship for "Users" and "Addresses" instead of "One to Many" relationship.



>> Database connection executed at: "server/connection.php"
    >> "localhost"   >> Database server host
    >> "root"        >> Database username
    >> ""            >> Database password
    >> "php-webshop" >> Database name