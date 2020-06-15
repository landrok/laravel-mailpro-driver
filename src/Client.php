<?php

namespace Landrok\Mailpro;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
	protected $apiKey;
	protected $clientId;
    protected $emailId;

	public function __construct(string $apiKey, int $clientId, int $emailId)
    {
        $this->apiKey   = $apiKey;
        $this->clientId = $clientId;
        $this->emailId  = $emailId;
    }

    /**
     * Send single message with Mailpro API
     *
     * @param array $body A Swift_Mime_SimpleMessage as array
     * @return \GuzzleHttp\Response
     */
	public function post(array $body)
    {
        $client = new GuzzleClient([
            'base_uri' => config('mailpro.api_url'),
            'timeout'  => 30.0,
        ]);

        $data = $body['body']['Messages'][0];

        $recipients = [];
        foreach ($data['To'] as $recipient) {
            $recipients[] = $recipient['Email'];
        }

        // Optional
        $optionals = [];
        if (isset($body['body']['Messages'][0]['ReplyTo'])) {
            $optionals['ReplyTo'] = $body['body']['Messages'][0]['ReplyTo'];
        }

        try {

            $response = $client->post(
                'send/addSingle.xml', [
                    'form_params' => [
                        'IdClient'   => $this->clientId,
                        'ApiKey'     => $this->apiKey,
                        'IdEmailExp' => $this->emailId,
                        'Subject'    => $data['Subject'],
                        'BodyHTML'   => $data['HTMLPart'],
                        'EmailData'  => implode(',', $recipients),
                    ] + $optionals
            ]);
            
        } catch (ClientException $e) {
            $response = $e->getResponse();
        } catch (ServerException $e) {
            $response = $e->getResponse();
        }

        return $response;
    }
}
