<?php

namespace vendor\kuakling\myiicms\models;

use Yii;

/**
 * This is the model class for table "web_modules".
 *
 * @property integer $module_id
 * @property string $name
 * @property string $class
 * @property string $title
 * @property string $icon
 * @property string $settings
 * @property integer $notice
 * @property integer $order_num
 * @property integer $status
 */
class Module extends \yii\db\ActiveRecord
{
    const STATUS_OFF= 0;
    const STATUS_ON = 1;

    public static function tableName()
    {
        return 'web_modules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'class', 'title', 'icon', 'settings'], 'required'],
            [['settings'], 'string'],
            [['notice', 'order_num', 'status'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['class', 'title'], 'string', 'max' => 128],
            [['icon'], 'string', 'max' => 32],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'module_id' => 'Module ID',
            'name' => 'Name',
            'class' => 'Class',
            'title' => 'Title',
            'icon' => 'Icon',
            'settings' => 'Settings',
            'notice' => 'Notice',
            'order_num' => 'Order Num',
            'status' => 'Status',
        ];
    }

    public static function findAllActive(){
        $result = [];
        $model = self::find()->where(['status' => self::STATUS_ON])->all();

        foreach ($model as $key => $module) {
            $result[$module->name] = (object)$module->attributes;
        }

        return $result;
    }
}
