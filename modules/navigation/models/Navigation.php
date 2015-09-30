<?php

namespace vendor\kuakling\myiicms\modules\navigation\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "web_navigation".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $detail
 * @property integer $user_id
 * @property integer $post_date
 * @property integer $update_date
 * @property string $attr_extra
 * @property string $display
 * @property integer $parent_id
 * @property integer $sort
 */
class Navigation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'web_navigation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'detail', 'user_id', 'post_date', 'update_date', 'attr_extra', 'display', 'parent_id', 'sort'], 'required'],
            [['detail', 'display'], 'string'],
            [['user_id', 'post_date', 'update_date', 'parent_id', 'sort'], 'integer'],
            [['name', 'title'], 'string', 'max' => 100],
            [['attr_extra'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'เรื่อง',
            'detail' => 'รายละเอียด',
            'user_id' => 'ผู้โพสต์',
            'post_date' => 'วันที่โพสต์',
            'update_date' => 'ปรับปรุงล่าสุด',
            'attr_extra' => 'Attributes',
            'display' => 'แสดง',
            'parent_id' => 'Parent ID',
            'sort' => 'เรียงลำดับ',
        ];
    }


    public static function getSiteMenuArray($role_id = 0)
    {
        unset(Yii::$app->session['siteMenuArray']);
        $result = [];
        if(!isset(Yii::$app->session['siteMenuArray'])){
            Yii::$app->session['siteMenuArray'] = self::getSiteMenuRecrusive($role_id);
        }

        $result = Yii::$app->session['siteMenuArray'];
        return $result;
    }

    private static function getSiteMenuRecrusive($parent)
    {

        $items = Navigation::find()
            ->where(['parent_id' => $parent])
            ->orderBy('sort')
            ->asArray()
            ->all();

        $result = []; 

        foreach ($items as $item) {
            $hasItems = self::getSiteMenuRecrusive($item['id']);
            $getExternalLink = substr($item['detail'], 0, 6);
            $urlto = Url::to(['/navigation/view','id'=>$item['id']]);
            if(strtoupper($getExternalLink) == '{LINK}')
                $urlto = substr($item['detail'], 6);
            if(count($hasItems) > 0){
                $result[] = [
                    'label' => $item['title'],
                    'url' => $urlto,
                    'linkOptions' => $item['attr_extra'],
                    'items' =>$hasItems,
                ];
            }else{
                $result[] = [
                    'label' => $item['title'],
                    'url' => $urlto,
                    'linkOptions' => $item['attr_extra'],
                ];
            }
        }
        return $result;
    }
}
