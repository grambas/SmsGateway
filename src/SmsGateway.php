<?php  namespace Grambas\SmsGateway;

use GuzzleHttp\Client;

class SmsGateway
{
    protected $client;

    public function __construct($token, $token_secret)
    {

        $stack = \GuzzleHttp\HandlerStack::create();
        $oauth_middleware = new \GuzzleHttp\Subscriber\Oauth\Oauth1([
            'consumer_key' => $token,
            'consumer_secret' => $token_secret,
            'token' => '',
            'token_secret' => ''
        ]);

        $stack->push($oauth_middleware);

        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://gatewayapi.com/rest/',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);


    }

    public static function saySomething()
    {
        return 'Hello World!';
    }


    /**
     * Send message
     * @return array
     * array:2 [▼
     * "ids" => array:1 [▼
     * 0 => 547420628
     * ]
     * "usage" => array:3 [▼
     * "countries" => array:1 [▼
     * "DE" => 1
     * ]
     * "currency" => "EUR"
     * "total_cost" => 0.0575
     * ]
     * ]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($sender, $recipient, $message)
    {

        $req = [
            'sender' => $sender,
            'recipients' => [['msisdn' => $recipient]],
            'message' => $message,
        ];
        // dd($req);
        $resposne = $this->client->post('mtsms', ['json' => $req, 'http_errors' => false]);
        return json_decode($resposne->getBody(), true);
    }


    /**
     * Get basic information about account balance
     * @return array
     *      "credit" => 1.5025
     *       "currency" => "EUR"
     *       "id" => 6700
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function me()
    {

        $response = $this->client->request('GET', 'me', ['http_errors' => false]);

        return json_decode($response->getBody(), true);
   
