<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo app('translator')->get('examplan::exp.admit_card'); ?></title>
    <!-- All Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="og:title" property="og:title" content="The Title of Your Article">
    <meta name="twitter:card" content="summary">
    <meta name="robots" content="noindex, nofollow">



    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo e(asset('Modules/ExamPlan/Public/assets/css/style.min.css')); ?>">

    <!--[if lt IE 9]>
        <script src="https://www.microsoft.com/en-us/download/details.aspx?id=38270"></script>
    <![endif]-->

</head>

<body id="pdf">
    <main style="width: 750px; margin: auto;">
   
        <div class="card-item border border-3 p-10">
            <table class="table w-full border p-10">
                <tr>
                    <td class="flex flex-wrap gap-2 items-center">
                        <div class="logo w-110">
                            <img src="<?php echo e(asset(generalSetting()->logo)); ?>" class="w-full" alt="<?php echo e(asset(generalSetting()->school_name)); ?>">
                        </div>
                        <div class="content">
                            <p class="fs-22 fw-bold text-black"><?php echo e(generalSetting()->school_name); ?></p>
                            <?php if($setting->admit_sub_title): ?>
                                <p class="fs-16 fw-bold text-red"><?php echo e(@$setting->admit_sub_title); ?></p>
                            <?php endif; ?>
                            <p class="fs-14 fw-bold text-black"><?php echo e(generalSetting()->address); ?></p>
                        </div>
                    </td>
                    <td class="text-end">
                        <p class="fs-24 fw-bold text-black"><?php echo app('translator')->get('examplan::exp.admit_card'); ?></p>
                        <p class="fs-14 fw-bold text-red"><?php echo e($admit->examType->title); ?> - <?php echo e(@generalSetting()->academic_Year->year); ?> </p>
                    </td>
                </tr>
            </table>
            <div class="h-10"></div>
            <table class="table w-full border p-10">
                <tr>
                    <td>
                        <?php if($setting->admission_no): ?>
                        <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.admission_number'); ?> : <span class="fs-14 fw-bold text-red"><?php echo e(@$admit->studentRecord->studentDetail->admission_no); ?></span></p>
                        <?php endif; ?> 
                    </td>
                    <td class="text-end">
                        <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.date'); ?> : <span class="fs-14 fw-bold text-red"><?php echo e(@dateConvert($admit->created_at)); ?></span></p>
                    </td>
                </tr>
            </table>
            <div class="h-10"></div>
            <div class="user border p-10 flex">
                <table class="table w-full border">
                    <tr class="border-bottom">
                        <td>
                            <?php if($setting->student_name): ?>
                            <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.student_name'); ?> : <span class="fs-14 fw-bold text-red"><?php echo e(@$admit->studentRecord->studentDetail->full_name); ?></span></p>
                            <?php endif; ?> 
                        </td>
                        <td class="text-end">
                            <?php if($setting->class_section): ?>
                            <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.class'); ?> : <span class="fs-14 fw-bold text-red"><?php echo e(@$admit->studentRecord->class->class_name); ?></span></p>
                            <?php endif; ?> 
                        </td>
                    </tr>
                    <tr class="border-bottom">
                        <td>
                            <?php if($setting->gaurdian_name): ?>
                            <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.father_name'); ?> : <span class="fs-14 fw-bold text-red"><?php echo e(@$admit->studentRecord->studentDetail->parents->guardians_name); ?></span></p>
                            <?php endif; ?> 
                        </td>
                        <td class="text-end">
                            <?php if($setting->class_section): ?>
                            <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.section'); ?> : <span class="fs-14 fw-bold text-red"><?php echo e(@$admit->studentRecord->section->section_name); ?></span></p>
                            <?php endif; ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if($setting->gaurdian_name): ?>
                            <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.mother_name'); ?> : <span class="fs-14 fw-bold text-red"><?php echo e(@$admit->studentRecord->studentDetail->parents->mothers_name); ?></span></p>
                            <?php endif; ?> 
                        </td>
                        <td class="text-end">
                            <?php if($setting->admission_no): ?>
                            <p class="fs-16 fw-bold text-black"><?php echo app('translator')->get('student.roll'); ?>: <span class="fs-14 fw-bold text-red"><?php echo e(@$admit->studentRecord->studentDetail->roll_no); ?></span></p>
                            <?php endif; ?> 
                        </td>
                    </tr>
                </table>
                <div class="profile flex items-center justify-center border">
                    <?php if($setting->student_photo): ?>
                    <img src="<?php echo e(asset(@$admit->studentRecord->studentDetail->student_photo ?? 'public/uploads/staff/demo/staff.jpg')); ?>" alt="<?php echo e(asset(@$admit->studentRecord->studentDetail->full_name)); ?>">
                    <?php endif; ?> 
                </div>
            </div>
            <div class="h-10"></div>
            <div class="border p-10 info">
                <?php echo @$setting->description; ?>

                
            </div>
            <div class="h-30"></div>
            <div class="signature text-end">
                <?php if($setting->principal_signature): ?>
                <div class="singnature_img">
                <img src="<?php echo e(asset($setting->principal_signature_photo)); ?>">
                </div>
                <p class="border-top fs-16 fw-normal text-black inline-block"> <?php echo app('translator')->get('examplan::exp.exam_controller'); ?> </p>
                <?php endif; ?> 
            </div>
        </div>
        
    </main>
    <script src="<?php echo e(asset('public/vendor/spondonit/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backEnd/js/pdf/html2pdf.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backEnd/js/pdf/html2canvas.min.js')); ?>"></script>

    <?php if( auth()->user()->role_id == 2 &&  $setting->student_download): ?>
<script>
      function generatePDF() {
          const element = document.getElementById('pdf');
          var opt = {
              margin:       0.2,
              pagebreak: { mode: ['avoid-all', 'css', 'legacy'], before: '#page2el' },
              filename:     '<?php echo e("Admit Card ".@$admit->examType->title); ?>',
              image:        { type: 'jpeg', quality: 100 },
              html2canvas:  { scale: 5 },
              jsPDF:        { unit: 'in', format: 'a4'}
          };
          html2pdf().set(opt).from(element).save().then(function(){
          });
      }
  
      $(document).ready(function(){
          generatePDF();
      })
</script>

<?php endif; ?>

<?php if( auth()->user()->role_id == 3 &&  $setting->parent_download): ?>
<script>
      function generatePDF() {
          const element = document.getElementById('pdf');
          var opt = {
              margin:       0.2,
              pagebreak: { mode: ['avoid-all', 'css', 'legacy'], before: '#page2el' },
              filename:     '<?php echo e("Admit Card ".@$admit->examType->title); ?>',
              image:        { type: 'jpeg', quality: 100 },
              html2canvas:  { scale: 5 },
              jsPDF:        { unit: 'in', format: 'a4'}
          };
          html2pdf().set(opt).from(element).save().then(function(){
          });
      }
  
      $(document).ready(function(){
          generatePDF();
      })
</script>

<?php endif; ?>

</body>

</html><?php /**PATH C:\xampp\htdocs\Modules\ExamPlan\Resources\views\studentAdmitCardDownload_two.blade.php ENDPATH**/ ?>