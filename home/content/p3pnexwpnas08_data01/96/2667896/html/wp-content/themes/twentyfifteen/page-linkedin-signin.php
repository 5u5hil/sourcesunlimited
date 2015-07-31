<?php

$url = 'https://www.linkedin.com/uas/oauth2/accessToken';
$fields = array(
    'grant_type' => urlencode('authorization_code'),
    'code' => urlencode($_GET['code']),
    'redirect_uri' => urlencode('http://ivycamp.cruxservers.in/linkedin-signin/'),
    'client_id' => urlencode('75fcybemoqsci1'),
    'client_secret' => urlencode('ABj1SfJUvTH8mCPx')
);

//url-ify the data for the POST
foreach ($fields as $key => $value) {
    $fields_string .= $key . '=' . $value . '&';
}
rtrim($fields_string, '&');




$a = json_decode(curll($url, $fields, $fields_string), true);





$opts = array(
    'http' => array(
        'method' => "GET",
        'header' => "Authorization: Bearer " . $a['access_token']
    )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('https://api.linkedin.com/v1/people/~?format=json', false, $context);

echo $file;
$value = json_decode($file, true);
print_r($value);
echo $value['firstName'];
function curll($url, $fields, $fields_string) {
    //open connection
    $ch = curl_init();

//set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//execute post
    $result = curl_exec($ch);
 
//close connection
    curl_close($ch);

    return $result;
}

?>