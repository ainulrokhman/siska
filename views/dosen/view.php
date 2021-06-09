<?php

use app\models\LookUp;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dosen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dosen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nidn',
            'nama_lengkap',
            'alamat',            
            [
                'attribute' => 'provinsi.nama',
                'label' => 'Provinsi'
            ],
            [
                'attribute' => 'kabupaten.nama',
                'label' => 'Kabupaten'
            ],
            [
                'attribute' => 'kecamatan.nama',
                'label' => 'Kecamatan'
            ],
            [
                'attribute' => 'kelurahan.nama',
                'label' => 'Kelurahan'
            ],
            'no_hp',
            'jk.name',
            'tmp_lahir',
            [
                'attribute' => 'tgl_lahir',
                'format' => 'html',
                'value' => function($model){
                    return date('d/M/Y', strtotime($model->tgl_lahir))
                    . " <small class='label bg-green'>$model->umur Tahun</div>";
                }
            ],
            [
                'attribute' => 'pendidikan.name',
                'label' => 'Pendidikan'
            ],
            [
                'attribute' => 'status.name',
                'label' => 'Status Dosen'
            ],
            [
                'attribute' => 'foto_path',
                'format' => 'html',
                'value' => function($model){
                    return '<img src="'
                    .Url::base().$model->foto_path
                    .'" alt="" class="img-fluid img-thumbnail col-sm-4">';
                }
            ],
            'user_id',
        ],
    ]) ?>
</div>
