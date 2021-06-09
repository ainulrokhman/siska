<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Staff', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nip',
            'nama_lengkap',
            // 'alamat',
            // 'provinsi_id',
            //'kabupaten_id',
            //'kecamatan_id',
            //'kelurahan_id',
            //'no_hp',
            ['attribute' => 'jenis_kelamin_id', 'value' => 'jk.name'],
            //'tmp_lahir',
            //'tgl_lahir',
            //'pendidikan_id',
            //'jabatan_id',
            ['attribute' => 'jabatan_id', 'value' => 'jabatan.name'],
            //'tgl_bergabung',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
