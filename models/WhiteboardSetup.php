<?php

namespace olan\whiteboard\models;

use Yii;

/**
 * Model class to save Whiteboard Setting.
 */
class WhiteboardSetup extends \humhub\models\Setting
{
    var $wb_url;

    /**
     * Define Validation rules
     */
    public function rules()
    {
        return [
            [['wb_url'], 'required'],
            // ['API_url', 'url', 'defaultScheme' => 'https']
        ];
    }

    /**
     * Label values
     */
    public function attributeLabels()
    {
        return [
            'wb_url'  => 'Whiteboard URL',
            // 'API_user' => 'Username',
            // 'API_pass' => 'Password',
        ];
    }

    public function attributeHints()
    {
        return [
            'wb_url'  => 'Provide Base URL of Whiteboard setup.',
            // 'API_user' => 'Akaunting setup Username (with API role enabled)',
            // 'API_pass' => 'Password of Akaunting user',
        ];
    }

    /**
     * Save the value in database
     */
    public function save($runValidation = true, $attributeNames = NULL)
    {
        $module = Yii::$app->getModule('whiteboard');

        $module->settings->set('wb_url', $this->wb_url);

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