<h1>DDD Generator</h1>

<p>
    生成DDD下的实体、仓储接口、仓储实现、仓储Trait
</p>
<?php $form=$this->beginWidget('CCodeForm', array('model'=>$model)); ?>
<div class="row sticky">
    <?php echo $form->labelEx($model,'dddPath'); ?>
    <?php echo $form->textField($model,'dddPath', array('size'=>65)); ?>
    <div class="tooltip">

    </div>
    <?php echo $form->error($model,'dddPath'); ?>
</div>
<div class="row sticky">
    <?php echo $form->labelEx($model,'namespacePrefix'); ?>
    <?php echo $form->textField($model,'namespacePrefix', array('size'=>128)); ?>
    <div class="tooltip">

    </div>
    <?php echo $form->error($model,'namespacePrefix'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'context'); ?>
    <?php echo $form->textField($model,'context', array('size'=>65)); ?>
    <div class="tooltip">

    </div>
    <?php echo $form->error($model,'context'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'entity'); ?>
    <?php echo $form->textField($model,'entity', array('size'=>65)); ?>
    <div class="tooltip">

    </div>
    <?php echo $form->error($model,'entity'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'entityFolderName'); ?>
    <?php echo $form->textField($model,'entityFolderName', array('size'=>65)); ?>
    <div class="tooltip">

    </div>
    <?php echo $form->error($model,'entityFolderName'); ?>
</div>

<div class="row sticky">
    <?php echo $form->labelEx($model,'iAggregateRoot'); ?>
    <?php echo $form->textField($model,'iAggregateRoot', array('size'=>200)); ?>
    <div class="tooltip">

    </div>
    <?php echo $form->error($model,'iAggregateRoot'); ?>
</div>
<div class="row sticky">
    <?php echo $form->labelEx($model,'baseEntity'); ?>
    <?php echo $form->textField($model,'baseEntity', array('size'=>200)); ?>
    <div class="tooltip">

    </div>
    <?php echo $form->error($model,'baseEntity'); ?>
</div>
<div class="row sticky">
    <?php echo $form->labelEx($model,'iRepository'); ?>
    <?php echo $form->textField($model,'iRepository', array('size'=>200)); ?>
    <div class="tooltip">

    </div>
    <?php echo $form->error($model,'iRepository'); ?>
</div>
<div class="row sticky">
    <?php echo $form->labelEx($model,'baseRepository'); ?>
    <?php echo $form->textField($model,'baseRepository', array('size'=>200)); ?>
    <div class="tooltip">

    </div>
    <?php echo $form->error($model,'baseRepository'); ?>
</div>
<?php $this->endWidget(); ?>
