<?php

namespace olan\whiteboard\models;

use Yii;

/**
 * Model class to save Whiteboard Setting.
 */
class WhiteboardBackground extends \humhub\models\Setting
{
    var $bg_color;

    /**
     * Define Validation rules
     */
    public function rules()
    {
        return [
            [['bg_color'], 'required'],
            // ['API_url', 'url', 'defaultScheme' => 'https']
        ];
    }

    /**
     * Label values
     */
    public function attributeLabels()
    {
        return [
            'bg_color'  => 'Background Color',
            // 'API_user' => 'Username',
            // 'API_pass' => 'Password',
        ];
    }

    /**
     * Save the value in database
     */
    public function saveValue($space_id)
    {
        $module = Yii::$app->getModule('whiteboard');

        $module->settings->set($space_id . '-bg_color', $this->bg_color);

        return true;
    }

    /**
     * Get Value for the given key
     * @param string $key
     * @return string|null
     */
    public static function getValue($key)
    {
        return Yii::$app->getModule('whiteboard')->settings->get($key);
    }

}