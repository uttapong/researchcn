@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
                        <img src="{{ asset('img/funds/fund_step_2.png') }}" class="img-responsive center-block">
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
                        <span class="caption-subject bold uppercase">&nbsp;เบิกเงินงวดที่ 1</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="first_payment_insert_update" method="post" id="form" class="form-horizontal" enctype="multipart/form-data">
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
                                            ? '<input type="file" class="form-control" name="file_3"/><span class="help-block">ไฟล์เก่าที่ไม่ผ่านการอนุมัติ <a href="' . $upload[0]->file_path . '"><span aria-hidden="true" class="icon-arrow-down"></span></a></span>'
                                            : $upload[0]->html
                                        : '<input type="file" class="form-control" name="file_3"/>'
                                    !!}
                                </div>
                                {!!
                                    $upload ?
                                        $upload[0]->status == 'Reject'
                                        ? '<label class="col-md-2 icon-close font-red" style="padding: 7px"> <b class="font-red">ไม่ผ่าน</b></label>'
                                        : null
                                    : null
                                  : null
                                !!}
                            </div>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-5">สำเนาสัญญา
                                </label>
                                <div class="col-md-5">
                                    {!!
                                        $upload ?
                                            $upload[1]->status == 'Reject'
                                            ? '<input type="file" class="form-control" name="file_4"/><span class="help-block">ไฟล์เก่าที่ไม่ผ่านการอนุมัติ <a href="' . $upload[1]->file_path . '"><span aria-hidden="true" class="icon-arrow-down"></span></a></span>'
                                            : $upload[1]->html
                                        : '<input type="file" class="form-control" name="file_4"/>'
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
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-5">หน้าบุ๊คแบ๊งค์
                                </label>
                                <div class="col-md-5">
                                    {!!
                                        $upload ?
                                            $upload[2]->status == 'Reject'
                                            ? '<input type="file" class="form-control" name="file_5"/><span class="help-block">ไฟล์เก่าที่ไม่ผ่านการอนุมัติ <a href="' . $upload[2]->file_path . '"><span aria-hidden="true" class="icon-arrow-down"></span></a></span>'
                                            : $upload[2]->html
                                        : '<input type="file" class="form-control" name="file_5"/>'
                                    !!}
                                </div>
                                {!!
                                    $upload ?
                                        $upload[2]->status == 'Reject'
                                        ? '<label class="col-md-2 icon-close font-red" style="padding: 7px"> <b class="font-red">ไม่ผ่าน</b></label>'
                                        : null
                                    : null
                                !!}
                            </div>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-5">หนังสือรับรองจริยธรรมการวิจัยในคน
                                </label>
                                <div class="col-md-5">
                                    {!!
                                        $upload ?
                                            $upload[3]->status == 'Reject'
                                            ? '<input type="file" class="form-control" name="file_6"/><span class="help-block">ไฟล์เก่าที่ไม่ผ่านการอนุมัติ <a href="' . $upload[3]->file_path . '"><span aria-hidden="true" class="icon-arrow-down"></span></a></span>'
                                            : $upload[3]->html
                                        : '<input type="file" class="form-control" name="file_6"/>'
                                    !!}
                                </div>
                                {!!
                                    $upload ?
                                        $upload[3]->status == 'Reject'
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
        $('a[href="fund_form"]').hide();

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
                file_3: {
                    required: !0
                },
                file_4: {
                    required: !0
                },
                file_5: {
                    required: !0
                },
                file_6: {
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
