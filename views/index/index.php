<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\olan\wbowhiteboard\assets\Assets::register($this);

// $displayName = (Yii::$app->user->isGuest) ? Yii::t('WhiteboardModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
// $this->registerJsConfig("whiteboard", [
//     'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
//     'text' => [
//         'hello' => Yii::t('WhiteboardModule.base', 'Hi there {name}!', ["name" => $displayName])
//     ]
// ])

$this->registerCss('#whiteboard_iframe {background-color:' . $bg_color . ' !important}');

?>

<iframe id="whiteboard_iframe" src="<?= $wb_url ?>" frameborder="0" style="height:100%;width:100%;border-radius:4px;min-height:680px"></iframe>

<?php // to resize iframe base on document height
if(is_file(Yii::getAlias('@themes') . '/' . $this->theme->name . '/views/layouts/_iframe_resize.php'))
{
    echo $this->render('@themes' . '/' . $this->theme->name . '/views/layouts/_iframe_resize', ['ID_iframe' => 'whiteboard_iframe']);
}
