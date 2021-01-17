<?php
//echo "text";

require_once(__DIR__.'/arangodb.php');
use ArangoDBClient\Statement as ArangoStatement;

try{

    $userId = $_GET['id'];
    $userName= $_POST['name'];
    //echo $userId;
   // echo $userName;
   $user['name'] = $_POST['name'];
   $stmt = new ArangoStatement( 
    $arangodb,
    [
        //'query' => 'UPDATE "66047" WITH {"name":"Biniam"} IN users' //object inside users for already defined ID

        'query' => 'UPDATE @key WITH @user IN users',
        'bindVars' => [
               
        'key' => $userId,
        'user' => $user

        ]
     

        
    ] 
    );


    $cursor = $stmt->execute();
    echo "Updated Sucessfully!";



   
  }catch(Exception $ex){
    echo $ex;
  }
  