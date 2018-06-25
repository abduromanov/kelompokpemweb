<?php

use app\models\TransaksiDetail;
use yii\helpers\Url;
// use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\helpers\Html;
use kartik\detail\DetailView;
/* @var $this yii\web\View */

$this->title = 'Riwayat Transaksi';
?>

<div class="jumbotron">
    <h1>Tunggakan</h1><br>
<?php

$id = Html::encode($searchModel->id_anggota);
$dataProvider = $searchModel->search($id);
$query = (new \yii\db\Query())
    ->select(['*'])
    ->from('anggota')
    ->where(['id_anggota' => $id])
    ->all();

$getData = $query[0];
$name = $getData['nama_lengkap'];
$alamat = $getData['alamat'];
$noHP = $getData['nomor_telphone_hp'];

$query2 = (new \yii\db\Query())
    ->select(['*'])
    ->from('transaksi_detail')
    ->where(['id_anggota' => $id])
    ->all();

$sql = TransaksiDetail::find()->where(['id_anggota'=>$id,'status_bayar'=>'Belum Bayar'])->all();
if($sql == null){?>
    <div class="panel panel-success">
        <div class="panel-heading">WOW!</div>
        <div class="panel-body">Anda tidak memiliki tunggakan</div>
        <div class="panel-footer">
            <?=Html::a('Go Back', ['/transaksi/index'], ['class'=>'btn btn-primary'])?>
        </div>
    </div><?php
} else {
    $bulanLalu = $sql[0]->jumlah_bulan_lalu;
    $bulanIni = $sql[0]->jumlah_bulan_ini;
    $status = $sql[0]->status_bayar;

$attributes = [
    [
        'group'=>true,
        'label'=>'1 - Informasi Anggota',
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'id_anggota', 
                'label'=>'No. ID',
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'Nama', 
                'format'=>'raw', 
                'value'=>$name,
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ],
    [
        'columns' => [
            [
                'label'=>'Alamat',
                'value'=>$alamat,
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            [
                'label'=>'No. HP',
                'format'=>'raw', 
                'value'=>'<kbd>0'.$noHP.'</kbd>',
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
        ],
    ],
    [
        'group'=>true,
        'label'=>'2 - Detail Tagihan',
        'rowOptions'=>['class'=>'danger']
    ],
    [
        'columns' => [
            [
                'attribute'=>'jumlah_bulan_lalu', 
                'label'=>'No. ID',
                'value'=>$bulanLalu,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'jumlah_bulan_ini', 
                'value' =>$bulanIni,
                'format'=>'raw', 
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ],
    [
        'columns' => [
            [
                'label'=>'Status Pembayaran',
                'format'=>'raw',
                'value'=>'<span class="label label-danger">'.$status."</span>",
            ],
        ],
    ],
];

echo DetailView::widget([
        'model' => $searchModel,
        'attributes' => $attributes,
        'mode' => 'view',
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'hAlign'=>'right',
        'vAlign'=>'center',
        'fadeDelay'=>800,
    ]);
}
?>
</div>