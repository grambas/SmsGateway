# :FootballData


football-data.org API Container for Laravel 5.1, 5.2


## Requirements
-  "guzzlehttp/guzzle": "~6.0"


## Install

Via Composer

``` bash
$ composer require grambas/SmsGateway dev-master
```

## Usage


Add your api key to env. file

```
FootballData_API_KEY=
```
add to config/app.php 
``` 
'providers' => [
  Grambas\SmsGateway\SmsGatewayServiceProvider::class,
]

'aliases' => [
  'Football' => Grambas\SmsGateway\Facades\SmsGatewayFacade::class,
]
```

## Examples
```php



##FIXTURES/MATCHES

/**
 * List matches across (a set of) competitions.	
 *
 * @param array $filter [ 'competitions' => 'Integer /[0-9]+/', 'dateFrom' => 'yyyy-MM-dd', 'dateTo' => 'yyyy-MM-dd', 'status' => 'SCHEDULED | LIVE | IN_PLAY | PAUSED | FINISHED | POSTPONED | SUSPENDED | CANCELED' ]
 * @return Collection
 */
Football::getMatches(array $filter = [ 'competitions' => '', 'dateFrom' => '', 'dateTo' => '', 'status' => '' ])

/**
 * Show one particular match.	
 *
 * @param integer $matchID
 * @return Collection
 */
Football::getMatche(int $matchID)

```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-packagist]: https://packagist.org/packages/grambas/football-data
[link-author]: https://github.com/grambas
