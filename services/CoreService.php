<?php

namespace app\services;

use InstagramScraper\Instagram;
use Yii;
use yii\imagine\Image;

class CoreService
{
    public $rglPromoId = "190704113507";
    public $rglHost = "https://api.rglservice.kz";
    public $rglApiKey = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1NjIyMTg1NTMsIm5iZiI6MTU2MjIxODU1MywicHJvbW9faWQiOiIxOTA3MDQxMTM1MDciLCJzb3VyY2UiOiJzaXRlIn0.KrES6W-UZlMJCz4MuhdngLMIOZLq9XCsGLWJEI1avvs";
    
    public function imageWithFrame($sourceImage, $frameImage, $savePath)
    {
        $image = Image::getImagine()->open($sourceImage);
        $sizes = $image->getSize();
        
        $frame = Image::getImagine()->open($frameImage);
        $frame->resize($sizes);
        
        $newImage = Image::watermark($image, $frame, [0,0]);
        $newImage->save(Yii::getAlias($savePath));
    }
    
    public function instagramTagsCheck($url)
    {
        $url=strtok($url,'?');
        $instagram = new Instagram();
        $media = $instagram->getMediaByUrl($url);
        $tags = $media->getCaption();
        $mytags = '#millermusicamplified#miller#efes#kazakhstan#almaty';
        if(strcmp(str_replace(' ', '', $tags),$mytags) == 0){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function getRglProfile($phone)
    {
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->rglHost}/v2/{$this->rglPromoId}/r/users/{$phone}/info",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array(
                "API-KEY: {$this->rglApiKey}",
                "Accept: */*",
            ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
            echo "cURL Error #:" . $err;
            die();
        } else {
            $res = json_decode($response, JSON_FORCE_OBJECT);
            return $res;
        }
    }
    
    public function createProfile($type, $lang, $phone, $last_name, $first_name, $middle_name, $age, $gender, $city, $bday, $email)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->rglHost}/v2/{$this->rglPromoId}/w/users/signup",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "promo_app_type={$type}&promo_language={$lang}&user_phone={$phone}&user_lastname={$last_name}&user_firstname={$first_name}&user_middlename={$middle_name}&user_age={$age}&user_gender={$gender}&user_city={$city}&user_birthday={$bday}&user_email={$email}",
            CURLOPT_HTTPHEADER => array(
                "API-KEY: {$this->rglApiKey}",
                "Accept: */*",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $res = json_decode($response, JSON_FORCE_OBJECT);
            return $res;
        }
    }
    
    public function getRatings()
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->rglHost}/v2/{$this->rglPromoId}/r/info/ratings/users",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "API-KEY: {$this->rglApiKey}",
                "Accept: */*",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $res = json_decode($response, JSON_FORCE_OBJECT);
            return $res;
        }
    }
    
    public function addPoints($phone, $points, $reason, $comment, $promo_language)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->rglHost}/v2/{$this->rglPromoId}/w/users/{$phone}/points/add",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "points={$points}&promo_app_type=web&reason={$reason}&comment={$comment}&promo_language={$promo_language}",
            CURLOPT_HTTPHEADER => array(
                "API-KEY: {$this->rglApiKey}",
                "Accept: */*",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $res = json_decode($response, JSON_FORCE_OBJECT);
            return $res;
        }
    }
}
