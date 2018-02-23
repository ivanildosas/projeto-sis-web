<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SugestaoPreco */

$this->title = 'Create Sugestao Preco';
$this->params['breadcrumbs'][] = ['label' => 'Sugestao Precos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sugestao-preco-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
