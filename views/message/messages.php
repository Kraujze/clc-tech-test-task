<?php

/* @var $this yii\web\View */
/* @var $model app\models\CreateMessageForm */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Страница создания и просмотра сообщений!</h2>
    </div>

    <div class="body-messages">

        <?php $form = ActiveForm::begin(['method' => 'post','action' => ['message/create-message']]); ?>

        <?= $form->field($model, 'message') ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <h1>Сообщения</h1>
        <ul>
            <?php foreach ($messages as $message): ?>
                <li>
                    <?= Html::encode("[{$message['id']}]") ?>
                    <?= Html::encode(" — {$message['text']}") ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <?= LinkPager::widget(['pagination' => $pagination]) ?>

    </div>
</div>
