<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold"><?php echo e(trans('fund.applied_funds-title')); ?></span>
                    </div>
                    <!-- <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">สถานะ</label>
                            </label>
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option1">ขั้นตอน</label>
                            </label>
                        </div>
                    </div> -->
                </div>
                <div class="portlet-body">
                    <?php if(count($funds) == 0): ?>
                        <div class="text-center"><?php echo e(trans('fund.applied_funds-not_have')); ?></div>
                    <?php else: ?>
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> </th>
                                        <th> <?php echo e(trans('fund.applied_funds-table.title')); ?> </th>
                                        <th> <?php echo e(trans('fund.applied_funds-table.step')); ?> </th>
                                        <th> <?php echo e(trans('fund.applied_funds-table.status')); ?> </th>
                                        <th> <?php echo e(trans('fund.applied_funds-table.next_step')); ?> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($funds as $index=>$fund): ?>
                                        <tr>
                                            <td>
                                                <?php echo e($index + 1); ?>

                                            </td>
                                            <td>
                                                <?php echo e($fund->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($fund->currentStep); ?>

                                            </td>
                                            <td>
                                                <span class="label label-sm label-<?php echo e($fund->statusClass); ?>"> <?php echo e($fund->statusTitle); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $fund->nextStep
                                                        ? '<a href="' . $fund->linkNextStep . '?request_id=' . $fund->id . '">' . $fund->nextStep . ' ' .
                                                            '<span aria-hidden="true" class="icon-arrow-right"></span></a>'
                                                        : null,
                                                    $fund->status == 'approved_second_progress_report'
                                                        ? '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="' . $requestExtend['link'] . '?request_id=' . $fund->id . '">' . $requestExtend['step'] . ' ' .
                                                            '<span aria-hidden="true" class="icon-arrow-right"></span></a>'
                                                        : null; ?>

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
        $('#main_fund, #sub3_fund').addClass("active open");
        $('#main_fund a, #sub3_fund a').append("<span class='selected'></span>");
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>