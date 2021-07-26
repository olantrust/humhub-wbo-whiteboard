<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use humhub\modules\space\modules\manage\widgets\DefaultMenu;
use humhub\modules\ui\form\widgets\ColorPicker;
use humhub\widgets\Button;
use yii\bootstrap\ActiveForm;

?>
<div class="panel panel-default">
    <div>
        <div class="panel-heading">
            <?= Yii::t('WboWhiteboardModule.manage', '<strong>Whiteboard</strong> Background Color Settings'); ?>
        </div>
    </div>

    <?= DefaultMenu::widget(['space' => $space]); ?>

    <div class="panel-body">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
            <div class="row">
                <div class="col-sm-6"><?= $form->field($model, 'bg_color')->textInput(['type' => 'color', 'maxlength' => true]); ?></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= Button::save()->submit()->cssClass('btn-success') ?>
                    </div>
                </div>
            </div>

            <?php /* ?>
            <?php //echo ColorPicker::widget(['model' => $model, 'attribute' => 'bg_color']); ?>

            <div id="<?= $containerId = 'whiteboard-background-color'; ?>" class="form-group space-color-chooser-edit">
                    <?= \humhub\widgets\ColorPickerField::widget([
                        'model'     => $model,
                        // 'field'     => 'color',
                        'attribute' => 'bg_color',
                        'container' => $containerId,
                    ]) ?>
            </div><?php /**/ ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>