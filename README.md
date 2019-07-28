[![Latest Stable Version](https://poser.pugx.org/progjp/monobank-api/v/stable)](https://packagist.org/packages/progjp/monobank-api)
[![Total Downloads](https://poser.pugx.org/progjp/monobank-api/downloads)](https://packagist.org/packages/progjp/monobank-api)
[![License](https://poser.pugx.org/progjp/monobank-api/license)](https://packagist.org/packages/progjp/monobank-api)
[![composer.lock available](https://poser.pugx.org/phpunit/phpunit/composerlock)](https://packagist.org/packages/phpunit/phpunit)
# MonobankAPI Client

PHP client for MonoBank API services (https://api.monobank.ua/docs/)

- List of monobank currency rates
- Information about the client and the list of his accounts
- Get statements
- Set webhook

## Requirements

* PHP >=7.2
* ext-json
* ext-curl

## Install

Via Composer

`$ composer require progjp/monobank-api`

## Usage

#### Create MonobankAPI Client
```php
$client = new Client();
$monobank = new MonobankAPI($client, '<token>');
```

### Get statements

```php
$response = $monobank->call(new StatementRequest((new StatementDTO())
            ->setAccount('test')
            ->setFrom((new \DateTime('first day of this month'))->getTimestamp())
            ->setTo((new \DateTime('last day of this month'))->getTimestamp())
        ));
```

### Get client info

```php
$response = $monobank->call(new ClientInfoRequest());
```

### Set a webhook

```php
$response = $monobank->call(new WebHookRequest($webHookUrl));
```

### Delete a webhook

```php
$response = $monobank->call(new WebHookRequest(''));
```


### Get currency rates

```php
$client = new Client();
$monobank = new MonobankAPI($client);
$response = $monobank->call(new CurrencyRequest());
```

## Testing

Just run:

`$ composer test`

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.