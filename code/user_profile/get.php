<?php
$pincode=$_POST['pincode'];
$data=file_get_contents('http://postalpincode.in/api/pincode/'.$pincode);
$data=json_decode($data);
if(isset($data->PostOffice['0'])){
    $arr['city']=$data->PostOffice['0']->Taluk;

    $arr['district']=$data->PostOffice['0']->District;
    $arr['state']=$data->PostOffice['0']->State;
    echo json_encode($arr);
}else{
    echo 'no';
}
