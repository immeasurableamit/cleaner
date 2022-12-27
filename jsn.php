<?php

/**
* thimble.com Open API X-signature implementation
*
* @param string $appKey: The appkey thimble.com provided.
* @param string $secret: The secret thimble.com provided.
* @param string $timestamp: Epoch Unix Time Stamp.
* @param string $url: The request url, contains query string. For example:
*  a request to 'https://open-api.thimble.com/activities?q=1', the 'url' would be '/activities?q=1'.
* @param string/obejct $reqBody: The request body.

* @return string
*/

function signature($appKey, $secret, $timestamp, $url, $reqBody) {
  echo 'signature.appKey: ' . $appKey . PHP_EOL . '<br>';
  echo 'signature.secret: ' . $secret . PHP_EOL . '<br>';
  echo 'signature.timestamp: ' . $timestamp . PHP_EOL . '<br>';
  echo 'signature.url: ' . $url . PHP_EOL . '<br>';

  $bodyData = $reqBody;
  if (is_object($reqBody)) {
    $bodyData = json_encode($reqBody);
  }

  $data = $appKey . $url . $timestamp . $bodyData;

  $xsignature = hash_hmac('sha256', $data, $secret);
  echo 'signature.xsignature: ' . $xsignature . PHP_EOL . '<br>';
  return $xsignature;
}

function callAPI($method, $url, $data = false, $headers = false) {
  echo 'callAPI.method: ' . $method . PHP_EOL . '<br>';
  echo 'callAPI.url: ' . $url . PHP_EOL . '<br>';
  echo 'callAPI.data: ' . json_encode($data) . PHP_EOL . '<br>';
  echo 'callAPI.headers: ' . json_encode($headers) . PHP_EOL . '<br>';

  $curl = curl_init();
  switch ($method) {
    case 'POST':
      curl_setopt($curl, CURLOPT_POST, 1);

      if ($data)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      if ($headers)
          curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      break;
    default:
        if ($data)
          $url = sprintf('%s?%s', $url, http_build_query($data));
  }

  curl_setopt($curl, CURLOPT_URL, $url);
  // Optional Authentication:
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return $result;
}

// An example:
$appkey = 'PK8RAARN7'; 
$secret = '9648db46c7b94ed1bca1c6f253d3d5e5';
$timestamp = time();
$url = '/activities';
$reqBody = (object) [
  'q' => 'piano',
];

$headers = array();
$headers[] = 'appkey: ' . $appkey;
$headers[] = 'x-signature: ' . signature($appkey, $secret, $timestamp, $url, $reqBody);
$headers[] = 'x-timestamp: ' . $timestamp;

echo 'Response: ' . callAPI('POST', 'https://open-api.thimble.com/activities', $reqBody, $headers) . PHP_EOL . '<br>';

