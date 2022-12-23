<?php
namespace Slackbot;
use JoliCode\Slack\ClientFactory;

class Controller {
	public function dispatch($channel, $search) {
        $openai = new Openai();
        $image_url = $openai->getImage($search);

        $fc = new FileCache();
        $new_url = $fc->write($search, $image_url);

        $client = ClientFactory::create($_ENV['SLACK_TOKEN']);
        $client->chatPostMessage([ 
            'channel' => $channel,
            'attachments' => json_encode([ 
                [ 
                    "fallback" => $search,
                    "text" => $search,
                    "image_url" => $new_url,
                ],
            ]),
        ]); 
	}
}
