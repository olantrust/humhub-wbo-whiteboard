<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$link = '<div class="input-group-addon">Please Insert Link</div>';
if(!empty($model->wb_url))
{
    $link = "<div class='input-group-addon'>". Html::a('View <i class="fa fa-external-link"></i>', $model->wb_url, ['target' => '_blank']) . "</div>";
}

?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?= Yii::t('WboWhiteboardModule.base', 'Whiteboard') ?></strong> <?= Yii::t('WboWhiteboardModule.base', 'configuration') ?></div>

        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'wb_url', [
                        'template' => "{label}\n<div class='input-group'>{input}
                            " . $link . "</div>\n{hint}\n{error}"
                    ])->textInput(['maxlength' => true])->label('Whiteboard URL (for use with Email and Contacts modules)'); ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('WboWhiteboardModule.base', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>