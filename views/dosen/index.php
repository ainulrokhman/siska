<?php

use app\models\LookUp;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dosen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Dosen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nidn',
            'nama_lengkap',
            // 'alamat',
            //'kabupaten_id',
            //'kecamatan_id',
            //'kelurahan_id',
            // 'no_hp',
            [
                'attribute' => 'jenis_kelamin_id',
                'value' => 'jk.name'
            ],
            //'tmp_lahir',
            //'tgl_lahir',
            //'pendidikan_id',
            //'status_id',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>