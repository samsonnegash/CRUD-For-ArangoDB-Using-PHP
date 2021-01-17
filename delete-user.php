<?php
//echo "text";

require_once(__DIR__.'/arangodb.php');
use ArangoDBClient\Statement as ArangoStatement;


try{

    $userId = $_GET['id'];
    //echo $userId;
   // echo $userName;
   $stmt = new ArangoStatement( 
    $arangodb,
    [
        

        'query' => 'REMOVE @key IN users',
        'bindVars' => [
               
        'key' => $userId,

        ]
     

        
    ] 
    );


    $cursor = $stmt->execute();
    echo "Deleted Sucessfully! Deleted Id Is: $userId";



   
  }catch(Exception $ex){
    echo "user not found, it may not exit or deleted befaure so enter another ID!";
  }
  