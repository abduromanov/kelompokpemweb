<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */
?>
<div class="anggota-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_anggota',
            'no_kk',
            'alamat:ntext',
            'nomor_telphone_hp',
            'nomor_telphone_rumah',
            'nama_lengkap',
            'status_anggota',
        ],
    ]) ?>

</div>
