
# uFutureHouse Server #
uFutureHouse is a solution for the management of real estate that allows a modern web synchronized with your data and offer an API for mobile and desktop applications.

## Installation ##
### Database ###
1. Execute this SQL with root user (MySQL example). Change DB_PASSWORD by your password:
```sql
CREATE USER 'ufuturehouse'@'localhost' IDENTIFIED BY 'DB_PASSWORD';
 
GRANT USAGE ON *.* TO  'ufuturehouse'@'localhost' IDENTIFIED BY 'DB_PASSWORD' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
 
CREATE DATABASE IF NOT EXISTS  `ufuturehouse`;
 
GRANT ALL PRIVILEGES ON  `ufuturehouse`.* TO  'ufuturehouse'@'localhost';
```

### Commands ###
1. Execute composer:
```shell
composer install --no-dev --optimize-autoloader
```

2. Create database:
```shell
php app/console doctrine:database:create
```

3. Create database schema:
```shell
php app/console doctrine:schema:create
```

4. Generate catalogues:
```shell
php app/console doctrine:fixtures:load -n --fixtures=src/Ufu turelabs/Ufuturehouse/Server/HousingBundle/DataFixtures/ORM
```

5. Execute install command for generate superadmin user:
```shell
php app/console ufuturehouse:install
```

6. Clean cache:
```shell
php app/console cache:clear --env=prod --no-debug
```

## Code Quality Assurance ##

| SensioLabs Insight | Travis CI | Scrutinizer CI
| ------------------ | --------- | --------------
|[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c338a335-2b00-4c55-8367-ec43b020d559/big.png)](https://insight.sensiolabs.com/projects/c338a335-2b00-4c55-8367-ec43b020d559)|[![Build Status](https://travis-ci.org/avegao/ufuturehouse-server.svg?branch=master)](https://travis-ci.org/avegao/ufuturehouse-server)|[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/avegao/ufuturehouse-server/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/avegao/ufuturehouse-server/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/avegao/ufuturehouse-server/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/avegao/ufuturehouse-server/?branch=master)|
