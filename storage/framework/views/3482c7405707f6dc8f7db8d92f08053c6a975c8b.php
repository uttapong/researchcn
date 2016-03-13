<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold"><?php echo e(trans('fund.current_funds-title')); ?></span>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php if(count($funds) == 0): ?>
                        <div class="text-center"><?php echo e(trans('fund.current_funds-not_have')); ?></div>
                    <?php else: ?>
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <tbody>
                                    <?php foreach($funds as $fund): ?>
                                        <tr>
                                            <td align="left">
                                                <?php echo e($fund->name); ?>

                                            </td>
                                            <td align="right">
                                                <?php if(count($fund->downloads) > 0): ?>
                                                    <button type="button" class="btn btn-primary" onclick="$('#files_'+<?php echo e($fund->id); ?>).toggle();">
                                                        <i class="fa fa-download"></i> Download files
                                                    </button>
                                                <?php endif; ?>
                                                <button type="button" data-id="<?php print ($fund->id) ?>" class="btn btn-info" data-singleton="true" data-toggle="confirmation" data-placement="top" data-btn-ok-label="ตกลง" data-btn-cancel-label="ยกเลิก" data-original-title="<?php echo e(trans('fund.current_funds-confirm_apply') . ' ' . $fund->name); ?>" <?php echo e($fund->registered ? 'disabled' : null); ?>>
                                                    <?php echo e($fund->registered ? trans('fund.current_funds-applied_btn') : trans('fund.current_funds-apply_btn')); ?>

                                                </button>
                                            </td>
                                        </tr>
                                        <tr id="files_<?php echo e($fund->id); ?>" style="display:none;padding: 0 5px 5px 5px;background-color: #efefef;">
                                            <td align="left" colspan="2">
                                                <?php if(count($fund->downloads) > 0): ?>
                                                    <div class="form-group margin-top-20">
                                                        <label class="control-label col-md-3">เอกสารสำหรับดาวน์โหลด</label>
                                                        <div class="col-md-8">
                                                            <?php foreach($fund->downloads as $download): ?>
                                                                <li class="file_list" id="download_<?php echo e($download->id); ?>">
                                                                    <div class="list-item-content">
                                                                        <div style="float:left">
                                                                            <a href="<?php echo e(route('base')); ?>/<?php echo e($download->file_path); ?>" download>
                                                                                <i class="fa fa-file"></i> <?php echo e($download->filename()); ?>

                                                                            </a>
                                                                            <p class='date'>
                                                                                <i class="fa fa-clock-o"></i> <?php echo e($download->created_at); ?>

                                                                            </p>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class='error'></div>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_fund, #sub1_fund').addClass("active open");
        $('#main_fund a, #sub1_fund a').append("<span class='selected'></span>");

        // Event on click confirm box
        $('[data-toggle="confirmation"]').on("confirmed.bs.confirmation", function () {
            window.location = "<?php echo e(route('base_rswk')); ?>/register_fund/" + $(this).attr("data-id");
        })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>