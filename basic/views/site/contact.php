<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\widgets\ColorInput;
use kartik\widgets\DateTimePicker;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

    <div class="alert alert-success">
        Thank you for contacting us. We will respond to you as soon as possible.
    </div>

    <p>
        Note that if you turn on the Yii debugger, you should be able
        to view the mail message on the mail panel of the debugger.
        <?php if (Yii::$app->mailer->useFileTransport): ?>
        Because the application is in development mode, the email is not sent but saved as
        a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
        Please configure the <code>useFileTransport</code> property of the <code>mail</code>
        application component to be false to enable email sending.
        <?php endif; ?>
    </p>

    <?php else: ?>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?php
                echo $form->field($model, 'email')->widget(ColorInput::classname(), [
                'options' => [
                    'placeholder' => '赶紧选颜色',
                    'readonly' => true,
                    ],'pluginOptions' => [
                        'chooseText' => "别点我",
                        'cancelText' => "云姐真棒",
                    ],

                ]);?>
                <?php
                echo $form->field($model, 'name')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => '赶紧填时间','readonly'=>true],
                    'pluginOptions' => [
                        'uploadUrl' => Url::to(['/a']),
                        'format' => 'yyyy-mm-dd HH:ii:00',
                    ]
                ]);
                ?>
                <?php
                echo $form->field($model, 'subject[]')->widget(FileInput::classname(), [
                    'options'=>[
                        'multiple'=>true
                    ],
                    'pluginOptions' => [
                        'uploadUrl' => Url::to(['/site/file-upload']),
                        'dropZoneTitle' => "我是小提莫",
                        'maxFileCount' => 10,
                        'initialPreview'=>[
                            Html::img("/images/moon.jpg", ['class'=>'file-preview-image', 'alt'=>'The Moon', 'title'=>'The Moon']),
                            Html::img("/images/earth.jpg", ['class'=>'file-preview-image', 'alt'=>'The Earth', 'title'=>'The Earth']),
                        ],
                        'initialCaption'=>"The Moon and the Earth",
                        'overwriteInitial'=>false,
//                        'initialPreviewShowDelete' => true,
                    ]
                ]);
                ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'subject') ?>
                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <?php endif; ?>
</div>
