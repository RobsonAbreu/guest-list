<?php

require 'vendor/autoload.php';
require 'ConnectionFactory.php';
require 'guestlist/guestListService.php';

$app = new \Slim\Slim();


$app->get('/guests', function() use ( $app ) {
    
    $guests = guestListService::guestList();
   $app->response()->header('Content-Type','application/json');
    echo json_encode($guests);

    
});
                                                                                                                                                                                                                  
    $app->get('/guests/:id', function($id) use ($app){
    $guests = getGuests();
    $index = array_search($id,array_column($guests,'id'));
    
    if ($index > -1){
        $app->response()->header('Content-Type','application/json');
        echo json_encode($guests[$index]);
    }
     else {
        $app->response()->setStatus(204);
        echo "Not found";
    }
});

$app->post('/guests', function() use ( $app ) {
    $guestJson = $app->request()->getBody();
    $guest = json_decode($guestJson);
    if($guest) {
        echo "{$guest->description} added";
    }
    else {
        $app->response()->setStatus(400);
        echo "Malformat JSON";
    }
    
   
});

$app->put('/guests/:id', function($id) use ( $app ) {
    echo $app->request()->getBody();
});



$app->run();

?>
