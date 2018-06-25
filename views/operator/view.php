<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Operator */
?>
<div class="operator-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_operator',
            'username',
            'password',
            'nama_lengkap',
        ],
    ]) ?>

</div>
