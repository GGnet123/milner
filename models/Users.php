<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $user_firstname
 * @property string $user_phone
 * @property string $user_email
 * @property string $user_password
 * @property string $city
 * @property int $user_refid
 * @property int $user_points
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_refid', 'user_points'], 'integer'],
            [['user_firstname', 'user_phone', 'user_email', 'user_password', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_firstname' => 'User Firstname',
            'user_phone' => 'User Phone',
            'user_email' => 'User Email',
            'user_password' => 'User Password',
            'user_refid' => 'User Refid',
            'user_points' => 'User Points',
        ];
    }
}
