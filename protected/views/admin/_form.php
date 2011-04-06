<div class="form">
<?php
$form=$this->beginWidget('CActiveForm', array(
  'id'=>'admin-form',
  'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>

<div class="row">
  <?php echo $form->labelEx($model,'lastname'); ?>
  <?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255)); ?>
  <?php echo $form->error($model,'lastname'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model,'firstname'); ?>
  <?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255)); ?>
  <?php echo $form->error($model,'firstname'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model,'email'); ?>
  <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
  <?php echo $form->error($model,'email'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model,'phone'); ?>
  <?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
  <?php echo $form->error($model,'phone'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model,'username'); ?>
  <?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>15)); ?>
  <?php echo $form->error($model,'username'); ?>
</div>

<div class="row">
  <?php echo $form->labelEx($model,'password'); ?>
  <?php echo $form->passwordField($model,'password',array('size'=>17,'maxlength'=>17)); ?>
  <?php echo $form->error($model,'password'); ?>
</div>

<?php if (!$model->isNewRecord): ?>
  <div class="row">
    <?php echo $form->labelEx($model,'status'); ?>
    <?php echo $form->textField($model,'status'); ?>
    <?php echo $form->error($model,'status'); ?>
  </div>
<?php endif; ?>

<div class="row buttons">
  <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->