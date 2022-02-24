<?php
    function sendNotification(){
        $url ="https://fcm.googleapis.com/fcm/send";

        $fields=array(
            "to"=>"fnNOprUPRq-db7hnO097rj:APA91bHqCCv4uMUfBGHQcnXM8B2_pt2efMOprThXDUvXK_jZg6ZYAsTF83gudNgpARhhR6kZIeYhLAmcFWGU5Q3qpW42r2B-EuvdmnzduHeX7oruun6yDeP6pJgkxTdaRBTOxBy5G4qF",
            "notification"=>array(
                "body"=>"Kishore Reddy",
                "title"=>"Morthala",
                "icon"=>"http://web.prismlabs.in/assets/img/avatars/logo-1.png",
                "image"=>"http://web.prismlabs.in/assets/img/avatars/logo-1.png",
            )
        );

        $headers=array(
            'Authorization: key=AAAAkNbMfC0:APA91bF7U2-MANOPAfMh7Uo5fn7EpcehsDtnjh6juCEctwmHJJuZ0t_g3_onNkPCv_0LGj4avp25wYlFtKVz3Xew1hoPpCDDxjKyTUuZ9KHCvxOO-xirLmwxEqOTxsKJcyRrmtRt9uUT',
            'Content-Type:application/json'
        );

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
        $result=curl_exec($ch);
        print_r($result);
        curl_close($ch);
    }
    sendNotification();
 ?>