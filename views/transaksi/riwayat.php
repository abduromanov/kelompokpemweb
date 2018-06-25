<?php

use app\models\Anggota;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Riwayat Transaksi';
?>

<div class="jumbotron">
    <h1>Riwayat Transaksi</h1>
</div>

<?php
$id = Html::encode($searchModel->id_anggota);
$dataProvider = $searchModel->search($id);
?>

<div class="operator-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),         
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-stats"></i> Tunggakan',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>'Anda dapat menyimpannya dengan menekan tombol Export'
            ]
        ])?>
    </div>
</div>