<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="panel panel-info">
    	<div class="panel-heading">Tentang Kami</div>
    	<div class="panel-body">
    		<p>Sistem Billing Air Minum dibuat oleh Kelompok II Pemrograman Web kelas A</p>
		    <dl>
		    	<dt>Anggota Kelompok II :</dt>
		    	<dd>1. Achmad Arief Rahmana Susatyoadi</dd>
		    	<dd>2. Aulia Dyah Ayu</dd>
		    	<dd>3. Hafiz Abdurrahman S</dd>
		    	<dd>4. Maulida Gusnina</dd>
		    	<dd>5. Masdaliah Zainal</dd>
			</dl>
			<code>http://sistembilling.com</code>
    	</div>
    </div>
</div>
