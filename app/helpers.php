<?php

use Intervention\Image\Facades\Image;

function UploadImage($path, $image, $model, $request)
{


    $thumbnail = $request;
    $destinationPath = $path;
    $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
    $thumbnail->move($destinationPath, $filename);
    // $thumbnail->resize(1080, 1080);
    $thumbnail = Image::make(public_path() . '/'.$path.'/' . $filename);
    // $thumbnail->resize(1080,1080);
    // $thumbnail = Image::make(base_path() . '/'.$path.'/' . $filename); //for server
//    $thumbnail->insert(base_path('/images/logo.png'), 'bottom-left', -10, -5)->save(base_path($path.'/' . $filename)); //base_path() for server
    $model->$image = $filename;
    $model->save();
}
function UploadImage2($path, $image, $model, $request)
{

    $thumbnail = $request;
    $destinationPath = $path;
    $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
    $thumbnail->move($destinationPath, $filename);
    // $thumbnail->resize(1080, 1080);
    $thumbnail = Image::make(base_path() . '/'.$path.'/' . $filename)->getRealPath();
    // $thumbnail->resize(1080,1080);
//    $thumbnail = Image::make(base_path() . '/'.$path.'/' . $filename); //for server
    // $thumbnail->insert(public_path('/images/logo.png'), 'bottom-left', -10, -5)->save(public_path($path.'/' . $filename)); //base_path() for server
    $model->$image = $filename;
    $model->save();
}
if (!function_exists('whats_send')) {
    function whats_send($mobile, $message, $country_code)
    {

        $mobile = $country_code . $mobile;

        $params=array(
            'token' => 'rouxlvet3m3jl0a3',
            'to' =>$mobile,
            'body' => $message
            );
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.ultramsg.com/instance31865/messages/chat",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => http_build_query($params),
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
              ),
            ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

        }
    }
}
if (!function_exists('send_sms_code_msg')) {
    function send_sms_code_msg($msg, $phone, $country_code)
    {
        $phone = $country_code . $phone;
        $url = "http://62.150.26.41/SmsWebService.asmx/send";
        $params = array(
            'username' => 'Electron',
            'password' => 'LZFDD1vS',
            'token' => 'hjazfzzKhahF3MHj5fznngsb',
            'sender' => '7agz',
            'message' => $msg,
            'dst' => $phone,
            'type' => 'text',
            'coding' => 'unicode',
            'datetime' => 'now'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $result = curl_exec($ch);
        if (curl_errno($ch) !== 0) {
            error_log('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
        }
        curl_close($ch);

    }
}

if (!function_exists('send_sms_code')) {
    function send_sms_code($msg, $phone, $country_code)
    {

        whats_send($phone, $msg, $country_code);
      //  send_sms_code_msg($msg, $phone, $country_code);
    }
}

if (!function_exists('send_push_notification')) {
    function send_push_notification($type ,$book_id,$token,$title,$description){
        $serverkey = 'AAAAFN778j8:APA91bFt1GglZf07Po-5ccwa8tYHuaIz0ymvDZCeDKJ2bxpaNrj2eM1TbON3_EdkhjkcH9IhKsaTOUv0mHSXHWQ-O2t61J6OwgoBmzoftKS-1uKBzTmwlGs0kkGClVYcP0TTXtFArxIT';// this is a Firebase server key
        $data = array(
                    'to' => $token,
                    'notification' =>
                            array(
                            'body' => $description,
                            'title' => $title),
                            "data"=> array(
                                    "book_id"=> $book_id,
                                    "type" => $type

                                    ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://fcm.googleapis.com/fcm/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: key='.$serverkey));
        $output = curl_exec ($ch);
        $result=json_decode($output);
        curl_close ($ch);
    }
}

?>
