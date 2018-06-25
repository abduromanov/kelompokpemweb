<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TransaksiDetail */
?>
<div class="transaksi-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_trx_dtl',
            'id_trx_mst',
            'id_anggota',
            'jumlah_bulan_lalu',
            'jumlah_bulan_ini',
            'harga_satuan_per_kubik',
            'tanggal_bayar',
            'status_bayar',
            'jumlah_bayar',
        ],
    ]) ?>

</div>
