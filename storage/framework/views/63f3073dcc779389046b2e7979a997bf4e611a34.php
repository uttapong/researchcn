<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet light portlet-fit portlet-form ">
                <div class="portlet-title">
                    <div class="caption font-red">
                        <i class="icon-plus font-red"></i>
                        <span class="caption-subject bold uppercase">&nbsp;เพิ่มทุนใหม่</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="fund_insert_save" id="form" class="form-horizontal" method="post">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                กรุณาใส่ข้อมูลให้ครบทุกช่อง
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                เพิ่มทุนใหม่สำเร็จ
                            </div>
                            <h3 class="form-section">Fund Info</h3>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">ชื่อทุน
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">รายละเอียดทุน
                                </label>
                                <div class="col-md-5">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <textarea class="form-control" rows="3" name="description" style="resize: none;"/></textarea>
                                    </div>
                                </div>
                            </div>

                            <h3 class="form-section">Fund Duration</h3>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">  วันที่เปิดรับสมัคร
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                        <input type="text" class="form-control" readonly="" name="apply_start" value="22-02-2016">
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button" style="height: 34px">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">วันสิ้นสุดรับสมัคร
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                            <input type="text" class="form-control" readonly="" name="apply_end" value="22-02-2016">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button" style="height: 34px">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr width="90%" style="margin: auto;" />
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">วันเริ่มต้นส่งเอกสาร
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                            <input type="text" class="form-control" readonly="" name="upload_start" value="22-02-2016">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button" style="height: 34px">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">วันสิ้นสุดส่งเอกสาร
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                            <input type="text" class="form-control" readonly="" name="upload_end" value="22-02-2016">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button" style="height: 34px">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr width="90%" style="margin: auto;" />
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">วันสิ้นสุดโครงการ
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                            <input type="text" class="form-control" readonly="" name="contract_end" value="22-02-2016">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button" style="height: 34px">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">ตกลง</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('a[href="fund_insert"]').hide();

        // Validate input value
        var e = $("#form"),
            r = $(".alert-danger", e),
            i = $(".alert-success", e);
        e.validate({
            errorElement: "span",
            errorClass: "help-block help-block-error",
            focusInvalid: !1,
            ignore: "",
            rules: {
                name: {
                    required: !0
                },
                apply_start: {
                    required: !0
                },
                apply_end: {
                    required: !0
                },
                upload_start: {
                    required: !0
                },
                upload_end: {
                    required: !0
                },
                contract_end: {
                    required: !0
                }
            },
            invalidHandler: function(e, t) {
                i.hide(), r.show(), App.scrollTo(r, -200)
            },
            errorPlacement: function(e, r) {
                var i = $(r).parent(".input-icon").children("i");
                i.removeClass("fa-check").addClass("fa-warning"), i.attr("data-original-title", e.text()).tooltip({
                    container: "body"
                })
            },
            highlight: function(e) {
                $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
            },
            unhighlight: function(e) {},
            success: function(e, r) {
                var i = $(r).parent(".input-icon").children("i");
                $(r).closest(".form-group").removeClass("has-error").addClass("has-success"), i.removeClass("fa-warning").addClass("fa-check")
            },
            submitHandler: function(e) {
                i.show(), r.hide(), e[0].submit()
            }
        })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>