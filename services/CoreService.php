<?php

namespace app\services;

use app\models\Users;
use InstagramScraper\Instagram;
use Yii;
use yii\base\Component;
use yii\imagine\Image;

class CoreService extends Component
{
    public $rglPromoId = "190716134705";
    public $rglHost = "https://api.rglservice.kz";
    public $rglApiKey = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1NjMyNjM0NzIsIm5iZiI6MTU2MzI2MzQ3MiwicHJvbW9faWQiOiIxOTA3MTYxMzQ3MDUiLCJzb3VyY2UiOiJzaXRlIn0.RSp2EFIXHtcWg3UAeFhSWdqlYwQyPmmKfa8KIMarOZg";
    
    public function registration($name, $phone, $mail, $psw, $city, $ref = null)
    {
        $model = new Users();
        $model->user_firstname = $name;
        $model->user_phone = $phone;
        $model->user_email = $mail;
        $model->user_password = $psw;
        $model->city = $city;
        
        if ($ref != null) {
            $model->user_refid = $ref;
            $this->refcheck($ref);
        }
        $model->save();
        
        return $model;
    }
    
    public function refCheck($ref)
    {
        $model = \Yii::$app->db->createCommand('select id, user_refid,user_phone, count(user_refid) as num from user group by user_refid having
        count(user_refid)>=5 and user_refid=' . $ref)->queryAll();
        
        $reason = 'Some reason';
        $comment = 'Some Comment';
        $promo_language = 'rus';
        $phone = $model[0]['user_phone'];
        
        for ($i = 0; $i < sizeof($model); $i++) {
//            $num = $model[$i]["user_refid"];
            if ($model[$i]["num"] % 2 == 0) {
                $points = 3;
            } else {
                $points = 0;
            }
            $this->addPoints($phone, $points, $reason, $comment, $promo_language);
//            \Yii::$app->db->createCommand('update miller set user_points = user_points +' . $points .'
//            where id =' . $num)->execute();
        }
    }
    
    public function imageWithFrame($sourceImage, $frameImage, $savePath)
    {
        $image = Image::getImagine()->open($sourceImage);
        $sizes = $image->getSize();
        
        $frame = Image::getImagine()->open($frameImage);
        $frame->resize($sizes);
        
        $newImage = Image::watermark($image, $frame, [0, 0]);
        $newImage->save(Yii::getAlias($savePath));
    }
    
    public function instagramTagsCheck($url)
    {
        $url = strtok($url, '?');
        $instagram = new Instagram();
        $media = $instagram->getMediaByUrl($url);
        $tags = $media->getCaption();
        $mytags = '#miller#millermusicamplified#genuinedraft';
        if (strcmp(str_replace(' ', '', $tags), $mytags) == 0) {
            return true;
        } else {
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
    
    public function registerCode($code, $phone, $transaction_id, $time)
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->rglHost}/v2/{$this->rglPromoId}/w/users/{$phone}/codes/redeem",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "promo_code={$code}&promo_language=ru&transaction_id={$transaction_id}&promo_app_type=web&promo_time={$time}",
            CURLOPT_HTTPHEADER => array(
                "API-Key: {$this->rglApiKey}",
                "Accept: */*",
                "Content-Type: application/x-www-form-urlencoded",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response, JSON_FORCE_OBJECT);
        }
    }
}
