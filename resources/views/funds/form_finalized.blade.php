@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
        <div class="col-md-4">
            <div class="portlet light portlet-fit portlet-form ">
                <div class="portlet-title">
                    <div class="caption font-red">
                        <i class="icon-layers font-red"></i>
                        <span class="caption-subject bold uppercase">&nbsp;ขั้นตอนทุน</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <img src="{{ asset('img/funds/fund_step_5.png') }}" class="img-responsive center-block">
                    </div>
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>

        <div class="col-md-8">
            <div class="portlet light portlet-fit portlet-form ">
                <div class="portlet-title">
                    <div class="caption font-red">
                        <i class="icon-layers font-red"></i>
                        <span class="caption-subject bold uppercase">&nbsp;ส่งผลงานครั้งสุดท้าย</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="finalized_insert_update" method="post" id="form" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="request_id" value="{{ $request_id }}">

                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                กรุณาใส่เอกสารให้ครบทุกช่อง
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                ทำสัญญารับทุนสำเร็จ
                            </div>
                            <h3 class="form-section">เอกสารประกอบ</h3>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-5">บันทึกนำส่ง
                                </label>
                                <div class="col-md-5">
                                    {!!
                                        $upload ?
                                            $upload[0]->status == 'Reject'
                                            ? '<input type="file" class="form-control" name="file_12"/><span class="help-block">ไฟล์เก่าที่ไม่ผ่านการอนุมัติ <a href="'. route('base') . '/' . $upload[0]->file_path . '" download  title="ดาวน์โหลดเอกสาร"><span aria-hidden="true" class="icon-arrow-down"></span></a></span>'
                                            : $upload[0]->html
                                        : '<input type="file" class="form-control" name="file_12"/>'
                                    !!}
                                </div>
                                {!!
                                    $upload ?
                                        $upload[0]->status == 'Reject'
                                        ? '<label class="col-md-2 icon-close font-red" style="padding: 7px"> <b class="font-red">ไม่ผ่าน</b></label>'
                                        : null
                                    : null
                                !!}
                            </div>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-5">(ร่าง) รายงานวิจัยฉบับสมบูรณ์ 2 เล่ม
                                </label>
                                <div class="col-md-5">
                                    {!!
                                        $upload ?
                                            $upload[1]->status == 'Reject'
                                            ? '<input type="file" class="form-control" name="file_13"/><span class="help-block">ไฟล์เก่าที่ไม่ผ่านการอนุมัติ <a href="'. route('base') . '/' . $upload[1]->file_path . '" download  title="ดาวน์โหลดเอกสาร"><span aria-hidden="true" class="icon-arrow-down"></span></a></span>'
                                            : $upload[1]->html
                                        : '<input type="file" class="form-control" name="file_13"/>'
                                    !!}
                                </div>
                                {!!
                                    $upload ?
                                        $upload[1]->status == 'Reject'
                                        ? '<label class="col-md-2 icon-close font-red" style="padding: 7px"> <b class="font-red">ไม่ผ่าน</b></label>'
                                        : null
                                    : null
                                !!}
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-5 col-md-9">
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-check"></i>
                                            ตกลง
                                        </button>
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
        // Add class selected navigator
        $('#main_fund').addClass("active open");
        $('#main_fund a').append("<span class='selected'></span>");

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
                file_12: {
                    required: !0
                },
                file_13: {
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

    $('.img-responsive.center-block').on('dragstart', function(event) { event.preventDefault(); });
</script>
@endsection
