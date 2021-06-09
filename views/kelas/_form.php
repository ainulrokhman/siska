<?php

use app\models\MataKuliah;
use app\models\Ruang;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mata_kuliah_id')->widget(Select2::className(),[
        'data' => MataKuliah::dropdownList(),
        'options' => ['placeholder' => 'Pilih Makul ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'jam_mulai')->textInput() ?>

    <?= $form->field($model, 'jam_selesai')->textInput() ?>

    <?= $form->field($model, 'ruang_id')->widget(Select2::className(),[
        'data' => Ruang::dropdownList(),
        'options' => ['placeholder' => 'Pilih Ruang ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
