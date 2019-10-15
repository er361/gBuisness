<?php
/**
 * Created by PhpStorm.
 * User: Miracle-
 * Date: 15.10.2019
 * Time: 17:21
 */

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Author books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'author_name',
            'publish_year',
            'titles',
            'rating'
        ],
    ]); ?>


</div>