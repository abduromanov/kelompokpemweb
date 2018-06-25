<?php

use yii\helpers\Url;
// use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Riwayat Transaksi';
?>

<div class="jumbotron">
    <h1>Tunggakan</h1>
</div>
<br><br><br>

<?php
$id = Html::encode($searchModel->id_anggota);
$status = 'Belum Bayar';
$dataProvider = $searchModel->tunggakan($id, $status);

$counter = Yii::$app->db->createCommand("SELECT jumlah_bayar FROM transaksi_detail WHERE(status_bayar = 'Belum Bayar')")->queryAll();
$i = 0;
$total = 0;
foreach ($counter as $counters) {
    $bayar[] = ($counters['jumlah_bayar']);
    $total = $total + (int)$bayar[$i];
    $i++;
}

?>

<?php
$data = [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_trx_dtl',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_trx_mst',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_anggota',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jumlah_bulan_lalu',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jumlah_bulan_ini',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'harga_satuan_per_kubik',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tanggal_bayar',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status_bayar',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jumlah_bayar',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],
];
?>

<div class="operator-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => $data,         
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-stats"></i> Tunggakan',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>'Total Biaya Tunggakan : '.$total
            ]
        ])?>
    </div>
</div>