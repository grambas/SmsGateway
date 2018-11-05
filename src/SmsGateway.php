<?php  namespace Grambas\SmsGateway;

use GuzzleHttp\Client;

class SmsGateway
{
	protected $client;
	
    public function __construct($token, $token_secret)
    {

		$stack = \GuzzleHttp\HandlerStack::create();
		$oauth_middleware = new \GuzzleHttp\Subscriber\Oauth\Oauth1([
		    'consumer_key'    => 'Create-an-API-Key',
		    'consumer_secret' => 'GoGenerateAnApiKeyAndSecret',
		    'token'           => $token,
		    'token_secret'    => $token_secret
		]);
		$stack->push($oauth_middleware);

		$this->client = new \GuzzleHttp\Client([
		    'base_uri' => 'https://gatewayapi.com/rest/',
		    'handler'  => $stack,
		    'auth'     => 'oauth'
		]);


    }
    
    public static function saySomething() {
        return 'Hello World!';
    }


	public function send($sender, $recipient, $message)
	{

        $req = [
            'sender'     => $sender,
            'recipients' => [['msisdn' => $recipient]],
            'message'    => $messag,
        ];
            
		return json_decode( $this->client->post('mtsms', ['json' => $req])->getBody() );
	}

	public function me()
	{
		return json_decode( $this->client->request('GET', 'me')->getBody() );
	}
}