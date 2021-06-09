<?php

use app\models\LookUp;
use app\models\Prodi;
use app\models\Wilayah;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?php
        $prov = Wilayah::provinsiList();
        echo $form->field($model, 'provinsi_id', [
                'template' => '<div class="col-sm-6">{label}{input}{hint}{error}</div>'
            ])->widget(Select2::class,[
                'data' => $prov,
                'options' => ['placeholder' => 'Pilih Provinsi...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ]
            ])
    ?>

    <?php
        echo $form->field($model, 'kabupaten_id',[
                'template' => '<div class="col-sm-6">{label}{input}{hint}{error}</div>'
            ])->widget(DepDrop::classname(), [
                'options' => ['placeholder' => 'Pilih Kabupaten...'],
                'type' => DepDrop::TYPE_SELECT2,
                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                'pluginOptions'=>[
                    'depends'=>['mahasiswa-provinsi_id'],
                    'loadingText' => 'Loading...',
                    'url'=>Url::to(['wilayah/kabupaten'])
            ]
        ]);
    ?>

    <?php
        echo $form->field($model, 'kecamatan_id',[
                'template' => '<div class="col-sm-6">{label}{input}{hint}{error}</div>'
            ])->widget(DepDrop::classname(), [
                'options' => ['placeholder' => 'Pilih kecamatan...'],
                'type' => DepDrop::TYPE_SELECT2,
                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                'pluginOptions'=>[
                    'depends'=>[Html::getInputId($model, 'kabupaten_id')],
                    'loadingText' => 'Loading...',
                    'url'=>Url::to(['wilayah/kecamatan'])
            ]
        ]);
    ?>

    <?php
        echo $form->field($model, 'kelurahan_id',[
                'template' => '<div class="col-sm-6">{label}{input}{hint}{error}</div>'
            ])->widget(DepDrop::classname(), [
                'options' => ['placeholder' => 'Pilih Kelurahan...'],
                'type' => DepDrop::TYPE_SELECT2,
                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                'pluginOptions'=>[
                    'depends'=>[Html::getInputId($model, 'kecamatan_id')],
                    'loadingText' => 'Loading...',
                    'url'=>Url::to(['wilayah/kelurahan'])
            ]
        ]);
    ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>
    

    <?= $form->field($model, 'jenis_kelamin_id')->widget(Select2::className(),[
        'data' => LookUp::getDropDownParameter('jenis_kelamin'),
        'options' => ['placeholder' => 'Pilih Jenis Kelamin ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'tmp_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::className(),[
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'pendidikan_id')->widget(Select2::className(),[
        'data' => LookUp::getDropDownParameter('pendidikan'),
        'options' => ['placeholder' => 'Pilih Jenis Pendidikan ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'prodi_id')->widget(Select2::className(),[
        'data' => Prodi::dropdownList(),
        'options' => ['placeholder' => 'Pilih Prodi ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'foto')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
