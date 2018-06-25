<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTransaksi */
?>
<div class="master-transaksi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_mst_transaksi',
            'id_operator',
            'tanggal_generate',
            'Periode',
        ],
    ]) ?>

</div>
