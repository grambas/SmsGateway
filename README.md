# :SmsGateway


Basic https://gatewayapi.com/ API Container for Laravel 5.*


## Requirements
-  "guzzlehttp/guzzle": "~6.0"


## Install

Via Composer

``` bash
$ composer require grambas/SmsGateway dev-master
```

## Usage


Simple example to send sms
```
$client = new GatewayApiCom( 'API KEY','SECRET KEY'); // init client with api key and secret
$response = $client->send('SENDER NAME', '048139381038', 'Message content'); //send sms with paramters: sender name, phone nunbmer and message

if (  isset($response['ids']) ) { // if message is sent, then the system generates id. So if id exist, then the message is successfuly snent
    return "Message successfuly sent!  Cost: " . $response['usage']['total_cost'] . ' ' . $response['usage']['currency'];
}else{
    return 'Error acquired during sending message';
}

```

Check balance

``` 
$client = new GatewayApiCom( 'API KEY','SECRET KEY');
$check = $client->me();
return 'New balance: ' . $check['credit']  . ' ' . $check['currency'];


```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-packagist]: https://packagist.org/packages/grambas/football-data
[link-author]: https://github.com/grambas
