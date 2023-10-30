<?php
require __DIR__ . '/vendor/autoload.php';
use Orhanerday\OpenAi\OpenAi;

$key = "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";


$open_ai = new OpenAi($key);

$complete = $open_ai->completion(
    [
        'model' => 'text-davinci-003',
        'prompt' => 'What is a dog?',
        'temperature' => 0.9,
        'max_tokens' => 150,
        'frequency_penalty' => 0.0,
        'presence_penalty' => 0.6

    ]
);
var_dump($complete);
$complete = json_decode($complete, true);
echo $complete['choices'][0]['text'];
