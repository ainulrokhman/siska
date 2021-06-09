<?php

use app\models\Fakultas;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use phpDocumentor\Reflection\Types\Self_;

/* @var $this yii\web\View */
/* @var $model app\models\Prodi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fakultas_id')->widget(Select2::className(),[
        'data' => Fakultas::dropdownList(),
        'options' => ['placeholder' => 'Pilih Fakultas ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
