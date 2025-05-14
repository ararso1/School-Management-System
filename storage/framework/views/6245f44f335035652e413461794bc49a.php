

<div class="container-fluid mt-30">
    <div class="student-details">
        <div class="student-meta-box">
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
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
                            <table id="" class="school-table-data school-table shadow-none" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                        <th><?php echo app('translator')->get('student.student_name'); ?></th>
                                        <th><?php echo app('translator')->get('exam.marks'); ?></th>
                                        <th><?php echo app('translator')->get('homework.comments'); ?></th>
                                        <th><?php echo app('translator')->get('homework.home_work_status'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
    
                                    <?php $__currentLoopData = $homework_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td width="8%"><?php echo e($value->studentInfo!=""?$value->studentInfo->admission_no:""); ?></td>
                                        <td width="15%"><?php echo e($value->studentInfo!=""?$value->studentInfo->full_name:""); ?></td>
                                        <td width="15%"><?php echo e($value->marks); ?></td>
    
                                        <td width="15%">
                                            <?php if($value->teacher_comments == 'G'): ?>
                                            <a class=""><button class="primary-btn small fix-gr-bg"> <?php echo app('translator')->get('homework.good'); ?> </button></a>
                                            <?php else: ?>
                                            <a class=""><button class="primary-btn small tr-bg"><?php echo app('translator')->get('homework.not_good'); ?> </button></a>
                                            <?php endif; ?>
                                        </td>
    
                                        <td width="15%">
                                            <?php if($value->complete_status == 'C'): ?>
                                            <a class=""><button class="primary-btn small fix-gr-bg"> <?php echo app('translator')->get('homework.complete'); ?> </button></a>
                                            <?php else: ?>
                                            <a class=""><button class="primary-btn small tr-bg"> <?php echo app('translator')->get('homework.incomplete'); ?> </button></a>
                                            <?php endif; ?>
                                        </td>
    
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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
                    <div class="col-lg-4">
                        <h4 class="stu-sub-head"><?php echo app('translator')->get('homework.summery'); ?></h4>
                        <div class="student-meta-box">

                            <div class="single-meta">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="name">
                                            <?php echo app('translator')->get('homework.home_work_date'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="value text-left">
                                         <?php if(isset($homeworkDetails)): ?>
                                                                                    
                                            <?php echo e($homeworkDetails->homework_date != ""? dateConvert($homeworkDetails->homework_date):''); ?>


                                         <?php endif; ?>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="single-meta">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="name">
                                        <?php echo app('translator')->get('homework.submission_date'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="value text-left">
                                     <?php if(isset($homeworkDetails)): ?>                                   
                                                                            
                                        <?php echo e($homeworkDetails->submission_date != ""? dateConvert($homeworkDetails->submission_date):''); ?>


                                     <?php endif; ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="value text-left">
                                    <?php echo app('translator')->get('homework.evaluation_date'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="name">
                                    <?php if($homeworkDetails->evaluation_date != ""): ?>                                  
                                                                        
                                    <?php echo e($homeworkDetails->evaluation_date != ""? dateConvert($homeworkDetails->evaluation_date):''); ?>


                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="single-meta">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="name">
                                        <?php echo app('translator')->get('homework.evaluation_date'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="value text-left">
                                     <?php if(isset($homeworkDetails)): ?>                                   
                                                                            
                                        <?php echo e($homeworkDetails->evaluation_date != ""? dateConvert($homeworkDetails->evaluation_date):''); ?>


                                     <?php endif; ?>
                                 </div>
                             </div>
                         </div>
                     </div>


                     <div class="single-meta">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="name">
                                    <?php echo app('translator')->get('homework.created_by'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="value text-left">
                                 <?php if(isset($homeworkDetails)): ?>
                                 <?php echo e($homeworkDetails->users->full_name); ?>

                                 <?php endif; ?>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="single-meta">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="name">
                                <?php echo app('translator')->get('homework.evaluated_by'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="value text-left">
                                <?php if(isset($homeworkDetails)): ?>
                                <?php echo e($homeworkDetails->users->full_name); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-meta">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="name">
                                <?php echo app('translator')->get('common.class'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="value text-left">
                             <?php if(isset($homeworkDetails)): ?>
                             <?php echo e($homeworkDetails->classes->class_name); ?>

                             <?php endif; ?>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="single-meta">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="name">
                            <?php echo app('translator')->get('common.section'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="value text-left">
                          <?php if(isset($homeworkDetails)): ?>
                          <?php echo e($homeworkDetails->sections->section_name); ?>

                          <?php endif; ?>
                      </div>
                  </div>
              </div>
          </div>

          <div class="single-meta">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="name">
                        <?php echo app('translator')->get('common.subjects'); ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="value text-left">
                      <?php if(isset($homeworkDetails)): ?>
                      <?php echo e($homeworkDetails->subjects->subject_name); ?>

                      <?php endif; ?>
                  </div>
              </div>
          </div>
      </div>

      <div class="single-meta">
            <div class="row">
                <div class="col-lg-6">
                    <div class="value text-left">
                        <?php echo app('translator')->get('exam.marks'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="name">
                        
                        <?php echo e($homeworkDetails->marks); ?>

                       
                    </div>
                </div>
            </div>
        </div>

      <div class="single-meta">
          <div class="row">
              <div class="col-lg-6">
                  <div class="value text-left">
                      <?php echo app('translator')->get('common.attach_file'); ?>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="name">
                      <?php if($homeworkDetails->file != ""): ?>

                       <a href="<?php echo e(asset('/'.$homeworkDetails->file)); ?>" download>
                              <?php echo app('translator')->get('common.download'); ?> <span class="pl ti-download"></span></a>
                              
                       
                      <?php endif; ?>
                  </div>
              </div>
          </div>
      </div>

      <div class="single-meta">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="name">
                    <?php echo app('translator')->get('common.description'); ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="value text-left">
                  <?php if(isset($homeworkDetails)): ?>
                  <?php echo e($homeworkDetails->description); ?>

                  <?php endif; ?>
              </div>
          </div>
      </div>
  </div>

</div>
</div>

</div>

</div>

</div>
</div>
</div>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
    $('.school-table-data').DataTable({
        bLengthChange: false,
        language: {
            search: "<i class='ti-search'></i>",
            searchPlaceholder: 'Quick Search',
            paginate: {
                next: "<i class='ti-arrow-right'></i>",
                previous: "<i class='ti-arrow-left'></i>"
            }
        },
        buttons: [ ],
        columnDefs: [
        {
            visible: false
        }
        ],
        responsive: true
    });

    // for evaluation date

    $('#evaluation_date_icon').on('click', function() {
        $('#evaluation_date').focus();
    });

    $('.primary_input_field.date').datepicker({
        autoclose: true
    });

    $('.primary_input_field.date').on('changeDate', function(ev) {
        $(this).focus();
    });

</script>
<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\viewEvaluationReport.blade.php ENDPATH**/ ?>