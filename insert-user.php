<?php

require_once(__DIR__.'/arangodb.php');
use ArangoDBClient\Statement as ArangoStatement;


try{
  $stmt = new ArangoStatement(
    $arangodb,
    [ 
      'query'=>'INSERT {"samson":"Negash"} INTO users LET insertedUser = NEW RETURN insertedUser ', //users is the database u create a collection on arangodb server
    ]
  );

  $cursor= $stmt -> execute();
  $user = json_decode($cursor -> getAll()[0]);
 // var_dump($cursor -> getExtra());
 //print_r($cursor -> getAll()[0]);
 $key= $user->_key;

 header('Content-Type: application/json');
 http_response_code(200);
 echo '{"message": "user created", "key": " ' .$key. ' "}';
 
}catch(Exception $ex){
  echo $ex;
}





