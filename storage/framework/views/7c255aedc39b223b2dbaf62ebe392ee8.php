<div class="" id="viewPayrollPayment">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center d-none" id="deletePayment"><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?> <button class="delete primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button></h4>
                <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                   
                    <div class="table-responsive">
                    <table id="" class="table school-table-style" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="checkAll" class="common-checkbox" name="checkAll">
                                    <label for="checkAll"><?php echo app('translator')->get('common.select_all'); ?></label>
                                </th>
                                <th><?php echo app('translator')->get('hr.staff_no'); ?></th>
                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                <th><?php echo app('translator')->get('hr.role'); ?></th>
                                <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                <th><?php echo app('translator')->get('accounts.payment_method'); ?></th>
                                <th><?php echo app('translator')->get('hr.payment_date'); ?></th>
                                <th><?php echo app('translator')->get('common.created_by'); ?></th>                                         
                                <th><?php echo app('translator')->get('common.action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $payrollPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="payment_<?php echo e($payment->id); ?>">
                                    <td>
                                        <input data-id="<?php echo e(@$payment->id); ?>" type="checkbox" id="payment_payroll_id<?php echo e(@$payment->id); ?>" class="common-checkbox payment_payroll"  value="<?php echo e(@$payment->id); ?>">
                                        <label for="payment_payroll_id<?php echo e(@$payment->id); ?>"></label>
                                    </td>
                                    <td>
                                    <a href="<?php echo e(route('viewStaff', $generatePayroll->staffDetails->id)); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($generatePayroll->staffDetails->staff_no); ?></a>
                                    </td>
                                    <td><?php echo e($generatePayroll->staffDetails->full_name); ?></td>
                                    <td><?php echo e($generatePayroll->staffDetails->roles->name); ?></td>
                                    <td><?php echo e($payment->amount); ?></td>
                                    <td><?php echo e($payment->paymentMethod->method); ?></td>
                                    <td><?php echo e($payment->payment_date); ?></td>
                                    <td><?php echo e($payment->createdBy->full_name); ?> </td>
                                    <td>
                                        <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>                                         
                                            <a class="dropdown-item" target="_blank"
                                            href="<?php echo e(route('print-payroll-payment', $payment->id)); ?>"><?php echo app('translator')->get('common.print'); ?></a>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                    </td>
                                </tr>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    $("#checkAll").on("click", function() {
        $("input:checkbox").prop("checked", this.checked);
        $('#deletePayment').removeClass('d-none');
       
    });

    $("input:checkbox").on("click", function() {
        if (!$(this).is(":checked")) {
            $("#checkAll").prop("checked", false);
        }
        var numberOfChecked = $("input:checkbox:checked").length;
        var totalCheckboxes = $("input:checkbox").length;
        var totalCheckboxes = totalCheckboxes - 1;

        if (numberOfChecked == totalCheckboxes) {
            $("#checkAll").prop("checked", true);
        }
        if(numberOfChecked > 0){
            $('#deletePayment').removeClass('d-none');
        }else{
            $('#deletePayment').addClass('d-none');
        }
    });
   
    $(document).on('click', '.delete', function(){
        var ids = [];
        $("input[type=checkbox]").each(function() {
            if (this.checked && $(this).val() !='on') {                
                ids.push($(this).val())
            }
        });
        if(ids.length ==0) {
            toastr.warning('Please Selecte At least One', 'Warning');
            return;
        }
       $.ajax({
            type:'POST',
            data:{ids:ids},
            dataType:"json",
            url:"<?php echo e(route('delete-payroll-payment')); ?>",
            success:function(data){
                toastr.success(data.msg);
                jQuery.each(ids, function(i, val){
                    $('#payment_'+val).remove();
                });
                $('#deletePayment').removeClass('d-none');
            },
            error:function(){

            }
       })
    })
    $(document).on('click', '.cancel', function(){
        // $('input:checkbox').removeAttr('checked');
        $('input:checkbox').attr('checked',false);
        $('#deletePayment').addClass('d-none');
    });
</script><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\humanResource\payroll\view_payroll_payment_modal.blade.php ENDPATH**/ ?>