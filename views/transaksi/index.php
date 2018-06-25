<?php

use yii\helpers\Url;
// use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\nav\NavX;
use kartik\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Info Tagihan';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin(['id' => 'searchId']); ?>

<div class="jumbotron">
    <h1>Info Tagihan</h1>
    <h4>Lihat Tunggakan dan Riwayat pembayaran anda disini</h4><br>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tunggakan"><i class="glyphicon glyphicon-stats"></i> Tunggakan</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#riwayat"><i class="glyphicon glyphicon-time"></i> Riwayat</button>
</div>

<?php $form = ActiveForm::begin(['action'=>'riwayat']);?>
<div class="modal fade" id="riwayat" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari berdasarkan ID</h4>
            </div>
            <div class="modal-body">
                <?= $form->field($searchModel, 'id_anggota',['showLabels'=>false])->textInput(['placeholder'=>'Masukkan ID anda']);?>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i> Cari', ['class'=>'btn btn-primary'])?>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>      
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php $form = ActiveForm::begin(['action'=>'tunggakan']);?>
<div class="modal fade" id="tunggakan" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari berdasarkan ID</h4>
            </div>
            <div class="modal-body">
                <?= $form->field($searchModel, 'id_anggota',['showLabels'=>false])->textInput(['placeholder'=>'Masukkan ID anda']);?>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i> Cari', ['class'=>'btn btn-primary'])?>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>      
    </div>
</div>
<?php ActiveForm::end(); ?>