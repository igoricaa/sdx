<?php

namespace Sophia\Addon;

class Coinpayments
{
    static function deposit($cmd, $req = array())
    {
        // $public_key = 'b4c6ed4f55ceb38f36b1bd6eec38de0898738af9d0e90e4728c47e6ab544fb79';
        // $private_key = '3010bc97E8771771B47BC9683caA320f6ab56d3B5046B360D91FC0915f805956';
        
        // $public_key = 'dfa8e790cc5a2a5fef8bbd9bd4696780c11c62253e0f8987fb98bbcaf087a789';
        // $private_key = 'A7188EB8B767034bFB2647a27a1eb83a45aBc72cf9Edb074391afb39fAe16CED'
        
        $public_key = '669cd16eb600606ec47e7633924757fa66eddf161db7de2caf75264eef9aff6e';
        $private_key = '1b11362FD55c29e84baf42ED57a068f965A28be2C17A5D86BfAaD87df08ce5C9';
        $req['version'] = 1;
        $req['cmd'] = $cmd;
        $req['key'] = $public_key;
        $req['format'] = 'json';
        $post_data = http_build_query($req, '', '&');
        $hmac = hash_hmac('sha512', $post_data, $private_key);
        $ch = NULL;
        if ($ch === NULL) {
            $ch = curl_init('https://www.coinpayments.net/api.php');
            curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: ' . $hmac));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $data = curl_exec($ch);
        if ($data !== FALSE) {
            $dec = (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) ? json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING) : json_decode($data, TRUE);
            if ($dec !== NULL && count($dec))
                return $dec;
            return array('error' => 'Unable to parse JSON result (' . json_last_error() . ')');
        }
        return array('error' => 'cURL error: ' . curl_error($ch));
    }
}
