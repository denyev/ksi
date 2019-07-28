<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\VacanciesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'title', [
            'labelOptions' => [
                    'class' => 'bmd-label-floating'
            ]
        ])
    ?>

    <?= $form->field($model, 'date', [
            'labelOptions' => [
                    'class' => 'bmd-label-floating'
            ]
        ])
        ->widget(DatePicker::className(), [
            'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => [
                'class' => 'form-control',
                'placeholder' => 'гггг-мм-дд'
            ],
        ])
    ?>

    <?= $form->field($model, 'city', [
            'labelOptions' => [
                'class' => 'bmd-label-floating'
            ]
        ])
    ?>

    <?= $form->field($model, 'company', [
            'labelOptions' => [
                    'class' => 'bmd-label-floating'
            ]
        ])
    ?>

    <?= $form->field($model, 'salary', [
            'labelOptions' => [
                    'class' => 'bmd-label-floating'
            ]
        ])
    ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'response_id') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Поиск'), ['class' => 'btn btn-outline-primary']) ?>
        <?= Html::a(Yii::t('app', 'Сброс'), ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
