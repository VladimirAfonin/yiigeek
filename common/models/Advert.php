<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advert".
 *
 * @property integer $id
 * @property integer $price
 * @property string $address
 * @property integer $agent_detail
 * @property integer $bedroom
 * @property integer $livingroom
 * @property integer $parking
 * @property integer $kitchen
 * @property string $general_image
 * @property string $description
 * @property string $location
 * @property integer $hot
 * @property integer $sold
 * @property string $type
 * @property integer $recommend
 * @property integer $created_at
 * @property integer $update_at
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'agent_detail', 'bedroom', 'livingroom', 'parking', 'kitchen', 'hot', 'sold', 'recommend', 'created_at', 'update_at'], 'integer'],
            [['description'], 'string'],
            [['address'], 'string', 'max' => 255],
            [['general_image'], 'string', 'max' => 200],
            [['location'], 'string', 'max' => 30],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'address' => 'Address',
            'agent_detail' => 'Agent Detail',
            'bedroom' => 'Bedroom',
            'livingroom' => 'Livingroom',
            'parking' => 'Parking',
            'kitchen' => 'Kitchen',
            'general_image' => 'General Image',
            'description' => 'Description',
            'location' => 'Location',
            'hot' => 'Hot',
            'sold' => 'Sold',
            'type' => 'Type',
            'recommend' => 'Recommend',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

//    /**
//     * @inheritdoc
//     * @return AdvertQuery the active query used by this AR class.
//     */
//    public static function find()
//    {
//        return new AdvertQuery(get_called_class());
//    }
}
