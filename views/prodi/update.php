<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prodi */

$this->title = 'Update Prodi: ' . $model->prodi_id;
$this->params['breadcrumbs'][] = ['label' => 'Prodis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prodi_id, 'url' => ['view', 'id' => $model->prodi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prodi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
