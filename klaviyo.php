<?php

function klaviyo($url, $params, $api_public_key)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Klaviyo-API-Key ' . $api_public_key,
        'accept: application/json',
        'content-type: application/json',
        'revision: ' . date("Y-m-d"),
    ]);
    $server_output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ['header' => $httpcode, 'output' => json_decode($server_output, true)];
}
function add_to_list($user_id, $list_id, $api_public_key)
{
    $url = 'https://a.klaviyo.com/api/lists/' . $list_id . '/relationships/profiles/';
    $vars = '{"data": [{"type": "profile", "id": "' . $user_id . '" }]}';
    $klaviyo = klaviyo($url, $vars, $api_public_key);
    if($klaviyo['header'] == '204') return true;
    return json_encode($klaviyo);
}
function klaviyo_add_subscriber($details = [], $list_id, $api_public_key)
{
    $url = 'https://a.klaviyo.com/api/profiles/';
    $vars = '{"data": {"type": "profile", "attributes": ' . json_encode($details) . ' }}';
    $klaviyo = klaviyo($url, $vars, $api_public_key);
    if ($klaviyo['header'] == '201') return add_to_list($klaviyo['output']['data']['id'], $list_id, $api_public_key);
    return json_encode($klaviyo);
}
####EXAMPLE


// $list_id = 'SwDU9Q';
// $api_public_key = 'pk_377fa270c8f356c476df749433325827a5';
// $client = [
//     'email' => $post->email,
//     'first_name' => $post->firstname,
//     'last_name' => $post->lastname,
//     'location' => [
//         'country' => $post->country,
//         'city' => $post->city,
//         'address1' => $post->street,
//     ]
// ];
// $klaviyo = klaviyo_add_subscriber($client, $list_id, $api_public_key);


            // $klaviyo = null;
            // if ($klaviyo_new_subscriber) {
            //     $list_id = 'WQRgYe';
            //     $api_public_key = 'pk_47eb5e23956ed6a46cf1d06f5cf85f5557';
            //     $client = [
            //         'email' => $post->email,
            //         'first_name' => $post->firstname,
            //         'last_name' => $post->lastname,
            //         'location' => [
            //             'country' => $post->country,
            //             'city' => $post->city,
            //             'address1' => $post->street,
            //         ]
            //     ];
            //     $klaviyo = klaviyo_add_subscriber($client, $list_id, $api_public_key);
            // }