<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('reports.previous_result'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style type="text/css">
        .single-report-admit table tr th {
            border: 1px solid #a2a8c5 !important;
            vertical-align: middle;
        }

        #grade_table th {
            border: 1px solid black;
            text-align: center;
            background: #351681;
            color: white;
        }

        #grade_table td {
            color: black;
            text-align: center !important;
            border: 1px solid black;
        }

        hr {
            margin: 0;
        }

        .table-bordered {
            border: 1px solid #a2a8c5;
        }

        .single-report-admit table tr th {
            font-weight: 500;
        }

        #grade_table th {
            border: 1px solid #dee2e6;
            border-top-style: solid;
            border-top-width: 1px;
            text-align: left;
            background: #351681;
            color: white;
            background: #f2f2f2;
            color: var(--base_color);
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            border-top: 0px;
            padding: 5px 4px;
            background: transparent;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
        }

        #grade_table td {
            color: #828bb2;
            padding: 0 7px;
            font-weight: 400;
            background-color: transparent;
            border-right: 0;
            border-left: 0;
            text-align: left !important;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
        }

        .single-report-admit table tr th {
            border: 0;
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
            text-align: left
        }

        .single-report-admit table thead tr th {
            border: 0 !important;
        }

        .single-report-admit table tbody tr:first-of-type td {
            border-top: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

        .single-report-admit table tr td {
            vertical-align: middle;
            font-size: 12px;
            color: #828BB2;
            font-weight: 400;
            border: 0;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
            text-align: left
        }

        .single-report-admit table tbody tr th {
            border: 0 !important;
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

        .single-report-admit table.summeryTable tbody tr:first-of-type td,
        .single-report-admit table.comment_table tbody tr:first-of-type td {
            border-top: 0 !important;
        }

        /* new  style  */
        .single-report-admit {}

        .single-report-admit .student_marks_table {
            background: -webkit-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -moz-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -o-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
        }

        .search-btn {
            height: 44px;
        }
    </style>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('reports.previous_result'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                    <a href="#"><?php echo app('translator')->get('reports.previous_result'); ?></a>
                </div>
            </div>
    </section>
    <section class="admin-visitor-area mb-40">
        <div class="container-fluid p-0">
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'previous-student-record', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'admissionNoSearch'])); ?>

                    <div class="row align-items-end">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <div class="col-lg-6 col-xl-6 col-md-6">
                            <div class="primary_input">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('student.admission_number'); ?><span
                                        class="text-danger"> *</span></label>
                                <input
                                    class="primary_input_field form-control<?php echo e($errors->has('admission_number') ? ' is-invalid' : ''); ?>"
                                    type="text" name="admission_number"
                                    id="admission_no_id"
                                    value="<?php echo e(isset($admission_number) ? $admission_number : old('admission_number')); ?>">
                                <?php if($errors->has('admission_number')): ?>
                                    <span class="text-danger" role="alert">
                                        <?php echo e($errors->first('admission_number')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <span class="text-danger admission_number_error"
                                role="alert"></span>
                        </div>

                        <div class="col-lg-6 col-xl-6 col-md-6 mt-30-md md_mb_20" id="selectRecordDiv">
                            <label class="primary_input_label" for=""><?php echo e(__('common.select_record')); ?> <span class="required"></span></label>
                            <select
                                class="primary_select form-control<?php echo e($errors->has('record') ? ' is-invalid' : ''); ?> select_record"
                                id="record" name="record">
                                <option data-display="<?php echo app('translator')->get('common.select_record'); ?> *" value=""><?php echo app('translator')->get('common.select_record'); ?></option>
                            </select>
                            <div class="pull-right loader loader_style" id="studentRecordPre">
                                <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                    alt="loader">
                            </div>
                            <?php if($errors->has('record')): ?>
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong><?php echo e($errors->first('record')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search"></span>
                                <?php echo app('translator')->get('common.search'); ?>
                            </button>
                        </div>
                    </div>

                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </section>

    <div class="showPreviousResult">
        <div class="text-center loader" id="studentPrevDataLoader">
            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
        </div>
    </div>

    <?php if(isset($promotes)): ?>
        <?php echo $__env->make('backEnd.reports.previous_result_file', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('submit', '#admissionNoSearch', function(e) {
            e.preventDefault();
            $("#record").find("option").remove();
            $("#record").append(
                $("<option>", {
                    value: '',
                    text: "<?php echo app('translator')->get('common.select_record'); ?>",
                })
            );
            $("#record").niceSelect('update');
            let i = 0;
            $('.showPreviousResult').html('');
            $('.admission_number_error').html('');
            let admissionNoSearch = $(this);
            const submit_url = admissionNoSearch.attr('action');
            const method = admissionNoSearch.attr('method');
            const formData = new FormData(admissionNoSearch[0]);
            $.ajax({
                url: submit_url,
                type: method,
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() {
                    $('#studentRecordPre').addClass('pre_loader');
                    $('#studentRecordPre').removeClass('loader');
                },
                success: function(response) {
                    if (response == 'not_valid') {
                        toastr.warning("No Data Found", "Warning", {
                            timeOut: 5000,
                        });
                    } else {
                        $.each(response, function(i, item) {
                            if (item.length) {
                                $("#record").find("option").remove();
                                $("#selectRecordDiv ul").find("li").not(":first").remove();
                                $.each(item, function(i, record) {
                                    let className = record.class.class_name;
                                    let sectionName = record.section.section_name;
                                    let academicYear = record.academic.year;
                                    $("#record").append(
                                        $("<option>", {
                                            value: record.id,
                                            text: className + " - " +
                                                sectionName + " - " +
                                                academicYear,
                                        })
                                    );
                                });
                                $("#record").niceSelect('update');
                            } else {
                                $("#selectRecordDiv .current").html("SELECT RECORD");
                                $("#record").find("option").not(":first").remove();
                                $("#selectRecordDiv ul").find("li").not(":first").remove();
                            }
                        });
                    }
                },
                error: function(xhr) {
                    $('.admission_number_error').html(xhr.responseJSON.errors.admission_number);
                },
                complete: function() {
                    i--;
                    if (i <= 0) {
                        $('#studentRecordPre').removeClass('pre_loader');
                        $('#studentRecordPre').addClass('loader');
                    }
                }
            });
        });

        $(document).on('change', '#record', function(e) {
            e.preventDefault();
            var i = 0;
            $('.showPreviousResult').html('');
            let recordId =  $("#admission_no_id").val();
            let url = '<?php echo e(route('previous-class-results-view')); ?>';
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    recordId: recordId,
                },
                beforeSend: function() {
                    $('#studentPrevDataLoader').addClass('pre_loader');
                    $('#studentPrevDataLoader').removeClass('loader');
                },
                success: function(response) {
                    $('.showPreviousResult').html(response.html);
                },
                error: function(xhr) {

                },
                complete: function() {
                    i--;
                    if (i <= 0) {
                        $('#studentPrevDataLoader').removeClass('pre_loader');
                        $('#studentPrevDataLoader').addClass('loader');
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views\backEnd\reports\previousClassResults.blade.php ENDPATH**/ ?>