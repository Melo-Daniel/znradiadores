<?php

  function enviarNotificacao($tokens,$msg){
    $url = "https://fcm.googleapis.com/fcm/send";

    $fields = array(
      'registration_ids' => $tokens,
      'data' => $msg
    );

    $headers = array(
      'Authorization:key = AAAApgD5Dog:APA91bF0oE5bktbU3EJajk4Tn51xoMsocGGoFEgU6wp0TgigPw5WbqEjeydmR4BzX2yKFOEmFACpfmnCOhtjlOzW2Kny-AqOp7MjMWKt2x5PIioq69wVD4EKk4Q2fFe4RB_YcX73nLqH',
      'Content-type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch);
    if($result === false){
      die('Curl falhou' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
  }

?>
