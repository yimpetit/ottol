<?php
  include 'db.php';
  
  $no = $_POST['no'];
  
  $url = "https://www.dhlottery.co.kr/common.do?method=getLottoNumber&drwNo=".$no;

  $is_post = false;
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, $is_post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $response = curl_exec($ch);        
  $data=json_decode($response,true);
  var_dump($data);

  $drwNo = $data['drwNo'];
  $drwNoDate = $data['drwNoDate'];
  $drwNo1 = $data['drwtNo1'];
  $drwNo2 = $data['drwtNo2'];
  $drwNo3 = $data['drwtNo3'];
  $drwNo4 = $data['drwtNo4'];
  $drwNo5 = $data['drwtNo5'];
  $drwNo6 = $data['drwtNo6'];
  $bnusNo = $data['bnusNo'];
  $firstAccumamnt = $data['firstAccumamnt'];
  $firstPrzwnerCo = $data['firstPrzwnerCo'];
  $firstWinamnt = $data['firstWinamnt'];
  $returnValue = $data['returnValue'];
  $totSellamnt = $data['totSellamnt'];

  $sql = "INSERT INTO `ottol`(`drwNo`, `drwNoDate`, `drwNo1`, `drwNo2`, `drwNo3`, `drwNo4`, `drwNo5`, `drwNo6`, `bnusNo`, `firstAccumamnt`, `firstPrzwnerCo`, `firstWinamnt`, `returnValue`, `totSellamnt`) VALUES ($drwNo,'$drwNoDate',$drwNo1,$drwNo2,$drwNo3,$drwNo4,$drwNo5,$drwNo6,$bnusNo,$firstAccumamnt,$firstPrzwnerCo,$firstWinamnt,'$returnValue',$totSellamnt)";

  echo $sql;

  mysqli_query($db,$sql);
  mysqli_close($db);

?>