<?php
// PHP code goes here
require 'vendor/autoload.php';
// echo "****PHP CLIENT STARTS runninshfkjshcsbcfklag ****<br>";

// phpinfo();
include_once dirname(__FILE__).'/GPBMetadata/Proto/zomatoServiceClient.php';
include_once dirname(__FILE__).'/GPBMetadata/Proto/nresponse.php';
include_once dirname(__FILE__).'/GPBMetadata/Proto/requestOne.php';
include_once dirname(__FILE__).'/GPBMetadata/Proto/requestAll.php';
include_once dirname(__FILE__).'/GPBMetadata/Proto/responseAllRes.php';
include_once dirname(__FILE__).'/GPBMetadata/Proto/Restaurant.php';
include_once dirname(__FILE__).'/GPBMetadata/Service.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// namespace Proto;
// echo "****PHP CLIENT STARTS running ****<br/>";

$app = new \Slim\App;

$client = new Proto\zomatoServiceClient('localhost:50051', [
    'credentials' => Grpc\ChannelCredentials::createInsecure(),
]);

echo "****PHP CLIENT START****<br/>";


// Define app routes
// $request = $_SERVER['REQUEST_URI'];

// switch ($request) {
//     case '/' :
//         echo "route starts";
//         break;
//     case '' :
//         echo "nothing";
//         break;
//     case '/about' :
//         echo "about";
//         break;
//     default:
//         echo "defualt";
//         break;
// }
function printResObject($resDetail){
    echo $resDetail->GetName()."<br>";
    echo round($resDetail->GetRating(),1)."<br>";
    echo $resDetail->GetCuisines()."<br>";
    echo $resDetail->GetAddress()."<br>";
    echo $resDetail->GetCFT()."<br>";
}

function setRestDetails($object){
    $object->setName("Birayani Blues");
    $object->setRating(4.0);
    $object->setCuisines("South Indian");
    $object->setAddress("Hyderabad");
    $object->setCFT(500);

}
function getRes($name){
    echo "********** restaurant details fetching, please wait!".$name." **************</br>";
    global $client;
    $object = new Proto\requestOne;
    $object->setName($name);
    list($resDetail, $status) = $client->getRes($object)->wait();
    printResObject($resDetail);  
}

function getAllRes(){
    echo "************** Fetching ALL restaurants **************<br>";
    global $client;
    $object = new Proto\requestAll;
    list($res, $status) = $client->getAllRes($object)->wait();
    $list = $res->GetResList();
    // print gettype($list);
    // print_r($list);
    foreach ($list as $value){
        printResObject($value);
    }
         


}

function editRes($resObject){
    echo "**************** editing the details ****************<br>";
    global $client;
    list($res, $status) = $client->editRes($resObject)->wait();
    echo $res->GetFlag()."UPDATED <br>";
    
}

function addRes($resObject){
    echo "************** adding the details *****************<br>";
    global $client;
    list($res, $status) = $client->addRes($resObject)->wait();
    echo $res->GetFlag()."ADDED <br>";
}

function main(){
    getRes("PITA PIT");
    $resObject = new Proto\Restaurant;
    setRestDetails($resObject);
    editRes($resObject);
    // $resObject->setName("New Restaurant");
    // addRes($resObject);
    getAllRes();
}

main();





?>