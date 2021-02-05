<?php
  use kartik\select2\Select2;


  use yii\helpers\ArrayHelper;

  ?>
<td><?=$form->field($model, "[$key]jawaban")->textInput()->label(false)?>
  <?=$form->field($model, "[$key]id")->hiddenInput()->label(false) ?>
</td>
<td><?=$form->field($model, "[$key]nilai")->textInput([
                                 'type' => 'number'
                            ])->label(false)?>
</td>

<td>

    <a class="btn btn-sm btn-round btn-danger" data-action="delete" id='delete3'><span class="fa fa-trash"></span></a>
</td>