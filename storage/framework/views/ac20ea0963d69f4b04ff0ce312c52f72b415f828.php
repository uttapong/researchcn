<?php $__env->startSection('content'); ?>
<div class="row">
                        <div class="col-md-6">
                            <div class="portlet light " id="blockui_sample_1_portlet_body">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp sbold">ศูนย์วิจัยการการพยาบาลและพฤติกรรมศาสตร์</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique. </p>
                                    <p><a href="<?php echo e(route('rscn_home')); ?>" class="btn green" > Go</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-red-mint"></i>
                                        <span class="caption-subject font-red-mint sbold">งานวิจัยบริการวิชาการ และวิเทศน์สัมพันธ์</span>
                                        <p><a href="<?php echo e(route('rswk_home')); ?>" class="btn green" > Go</a></p>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique. </p>
                                </div>
                            </div>
                        </div>
                    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>