<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<!-- modal dialog for display pop up login -->
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Login</h4>
</div>
<div class="modal-body">
    <!-- start ActiveForm -->
    <?php $form = ActiveForm::begin(['id' => 'login-form','enableClientValidation'=>'true']); ?>

    <?= $form->field($model, 'username',[
                                  'template' => "{label}\n{error}\n{input}\n{hint}\n",
                                  'errorOptions'=>['class'=>'help-block alert alert-danger','style'=>'display:none;']
                             ]
                    ) ?>
    
    <?= $form->field($model, 'password',[
                   'template' => "{label}\n{error}\n{input}\n{hint}\n",
                   'errorOptions'=>['class'=>'help-block alert alert-danger','style'=>'display:none;']
                ])->passwordInput() ?>
   <div class="modal-footer">
   <div class="form-group our-form-group">
             <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
   </div>
   <?php ActiveForm::end(); ?>
</div>
</div>
</div>