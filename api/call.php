<?php

//header('Content-type: application/json');
require("../dbinfo.php");
require 'twilio/Services/Twilio.php';
 
    // Twilio REST API version
    $version = "2010-04-01";
 
    // Set our Account SID and AuthToken
    $sid = 'ACf3d52fbb0c1cfae6ac6834edb5ab4d1a';
    $token = '5ac983cbb4f15ba5c253984cbfadad02';
     
    // A phone number you have previously validated with Twilio
    $phonenumber = '6505294677';
     
    // Instantiate a new Twilio Rest Client
    $client = new Services_Twilio($sid, $token, $version);
 
    try {
        // Initiate a new outbound call
        $call = $client->account->calls->create(
            $phonenumber, // The number of the phone initiating the call
            '2062579909', // Congress-person call
            'http://127.0.0.1/' // TODO!!
        );
        echo 'Started call: ' . $call->sid;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }


?>