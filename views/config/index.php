<?php

use humhub\modules\verifiedIcon\Module;
use humhub\modules\ui\form\widgets\ActiveForm;
use yii\helpers\Html;
use yii\base\Theme;
use yii\helpers\Url;

?>
<div class="panel panel-default">
    <div class="panel-heading"><?= Yii::t('VerifiedIconModule.admin', '<b>Verified Icon</b> Configuration'); ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(['id' => 'configure-form']);?>
			
		    <?= $form->field($model, 'vrfdUsersIds'); ?>
		
	        <?= $form->field($model, 'vrfdSpacesIds'); ?>
		
        <div class="form-group">
            <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
