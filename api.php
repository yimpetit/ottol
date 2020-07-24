<?php
 
        $url = "https://www.dhlottery.co.kr/common.do?method=getLottoNumber&drwNo=1";
 
        $is_post = false;
        $ch = curl_init();
 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);        
        $data=json_decode($response,true);
        var_dump($data);
        echo $data['drwNoDate'];

        


        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
 
        echo json_encode($data);

?>