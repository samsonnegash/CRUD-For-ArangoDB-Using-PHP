<?php

require_once(__DIR__.'/arangodb.php');
use ArangoDBClient\Statement as ArangoStatement;

//echo "<br>";

//echo "<center><h2>This is the user list:</h2></center>";

$userId = $_GET['id']; //it uses for me to get the data inside the link "localhost/all/nosql/test/get-user.php?id=A/UR14201/10"

//echo $userId; // to chack

$stmt = new ArangoStatement( 
    $arangodb,
    [
        'query' => 'FOR user IN @@collection
         FILTER user._key == @key RETURN user',

        'bindVars' => [
        '@collection' => 'users' ,
        'key' => $userId
        
    ]



    ]
);


$cursor = $stmt -> execute();
//print_r($cursor -> getAll()); is used to show only using  the value id
$data = $cursor -> getAll();

if( count($data) == 0 ){

    echo '<br>';
    echo '  <center>Sorry There Is No ID That Similar To This!</center>';
    exit();

  

}
$user = $data[0];
header('Content-Type: application/json'); // using display json format
http_response_code(200);  //display using json format

echo $user;


try{

  }catch(Exception $ex){
    echo $ex;
  }
  
  