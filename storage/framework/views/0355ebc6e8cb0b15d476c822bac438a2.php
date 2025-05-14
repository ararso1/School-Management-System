<?php
   $name = '';
    $id         = !empty($id) ? $id : '';
    
    if( !empty($repeater_id) ){
        if( !empty($parent_rep) ){
            $name = "$parent_rep".'['.$repeater_id.']['.$index.']['.$id.']';
        }else{
            $name = "$repeater_id".'['.$index.']['.$id.']';
        }
    }else{
        $name = $id;
    }
?>
<?php if( !empty($repeater_type) && $repeater_type == 'single' ): ?>
        <div class="op-rangecollpase">
            <div class="op-textcontent op-rangeslider">
                <div class="op-rangeval">
                    <span class="range-min"></span>
                    <span class="range-max"></span>
                </div>
                <div class="range-slider" data-format="<?php echo e(!empty($options['format'])  ? $options['format'] : ''); ?>"  data-min_value="<?php echo e(!empty($value['min'])  ? $value['min'] : ''); ?>" data-max_value="<?php echo e(!empty($value['max'])  ? $value['max'] : ''); ?>" data-option_min="<?php echo e(!empty($options['min'])  ? $options['min'] : 1); ?>" data-option_max="<?php echo e(!empty($options['max'])  ? $options['max'] : 100); ?>"></div>
            </div>         
            <div class="op-inputrangewrap form-group-wrap">
                <div class="op-rangeinput form-group-half">
                    <label class="op-range-label" for=""><?php echo e(__('optionbuilder::option_builder.min_value')); ?></label>
                    <input type="number" <?php if(!empty($parent_rep)): ?> data-parent_rep="<?php echo e($parent_rep); ?>" <?php endif; ?> data-id="<?php echo e($id ?? ''); ?>"  name="<?php echo e($name); ?>[min]" />
                </div>
                <div class="op-rangeinput form-group-half">
                    <label class="op-range-label" for=""><?php echo e(__('optionbuilder::option_builder.max_value')); ?></label>
                        <input type="number" <?php if(!empty($parent_rep)): ?> data-parent_rep="<?php echo e($parent_rep); ?>" <?php endif; ?> data-id="<?php echo e($id ?? ''); ?>"  name="<?php echo e($name); ?>[max]" />
                </div>
            </div>
        </div> 
<?php else: ?>
    <li class="form-group-wrap">
        <?php if( !empty($label_title) ): ?>
            <div class="form-group-half">
                <div class="op-textcontent">
                    <h6>
                        <?php echo $label_title; ?>

                        <?php if( empty($repeater_id) && config('optionbuilder.developer_mode') == 'yes' ): ?>
                            <span class="op-alert">setting(‘<?php echo e($tab_key); ?>.<?php echo e($id); ?>’)</span>
                        <?php endif; ?>
                    </h6>
                    <?php if( !empty( $label_desc) ): ?>
                        <em><?php echo $label_desc; ?></em>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="form-group-half">
            <div class="op-rangecollpase">
                <div class="op-textcontent op-rangeslider">
                    <div class="op-rangeval">
                        <span class="range-min"></span>
                        <span class="range-max"></span>
                    </div>
                    <div class="range-slider" data-format="<?php echo e(!empty($options['format'])  ? $options['format'] : ''); ?>"  data-min_value="<?php echo e(!empty($value['min'])  ? $value['min'] : ''); ?>" data-max_value="<?php echo e(!empty($value['max'])  ? $value['max'] : ''); ?>" data-option_min="<?php echo e(!empty($options['min'])  ? $options['min'] : 1); ?>" data-option_max="<?php echo e(!empty($options['max'])  ? $options['max'] : 100); ?>"></div>
                </div>         
                <div class="op-inputrangewrap form-group-wrap op-textcontent">
                    <div class="op-rangeinput form-group-half">
                        <label  class="op-range-label" for=""><?php echo e(__('optionbuilder::option_builder.min_value')); ?></label>
                        <input type="number" <?php if(!empty($parent_rep)): ?> data-parent_rep="<?php echo e($parent_rep); ?>" <?php endif; ?> data-id="<?php echo e($id ?? ''); ?>"  name="<?php echo e($name); ?>[min]" />
                    </div>
                    <div class="op-rangeinput form-group-half">
                        <label  class="op-range-label" for=""><?php echo e(__('optionbuilder::option_builder.max_value')); ?></label>
                         <input type="number" <?php if(!empty($parent_rep)): ?> data-parent_rep="<?php echo e($parent_rep); ?>" <?php endif; ?> data-id="<?php echo e($id ?? ''); ?>"  name="<?php echo e($name); ?>[max]" />
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\packages\larabuild\optionbuilder\resources\views\components\range_slider.blade.php ENDPATH**/ ?>