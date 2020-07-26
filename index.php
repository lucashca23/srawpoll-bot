<?php
set_time_limit(0);

include 'vendor/autoload.php';

$qtdVotos = 100000;

$array = [
    'content_id' => 'xws131gz',
    'checked_answers' => [
        '762rgcyf5zr1'
    ],
    'name' => null
];

for ($contador = 0; $contador <= $qtdVotos; $contador++)
{
    try
    {
        $response = \Httpful\Request::post('https://strawpoll.com/api/poll/vote')
                    //->useProxy('128.199.246.10', 44344)
                    ->expectsJson()
                    ->body($array)
                    ->sendsJson()
                    ->send();
        $objJson = $response->body;
        echo 'Voto '.$contador.' = '.$objJson->message.'<br>';
    }
    catch(Exception $e)
    {
        echo 'Falha! Voto '.$contador.' = Negado pelo servidor proxy<br>';    
    }
}
