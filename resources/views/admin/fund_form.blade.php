@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit portlet-form">
                <div class="portlet-title">
                    <div class="caption font-red">
                        <i class="{{ $fund ? 'fa fa-edit' : 'icon-plus' }} font-red"></i>
                        <span class="bold">&nbsp;{{ $fund ? 'แก้ไขทุน' : 'เพิ่มทุนใหม่' }}</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="fund_insert_update" method="post" id="form" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $fund ? $fund->id : null }}">

                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                กรุณาใส่ข้อมูลให้ครบทุกช่อง
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                {{ $fund ? 'แก้ไขทุนสำเร็จ' : 'เพิ่มทุนใหม่สำเร็จ' }}
                            </div>
                            <h3 class="form-section">Fund Info</h3>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">ชื่อทุน
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="name" value="{{ $fund ? $fund->name : null }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">ประเภทของทุน
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <select id="fund_type" class="form-control" name="type">
                                            <option value="">----- &nbsp;กรุณาเลือก&nbsp; -----</option>
                                            <option value="บทความวิจัย">บทความวิจัย</option>
                                            <option value="ผลงานวิชาการ">ผลงานวิชาการ</option>
                                            <option value="ตำรา">ตำรา</option>
                                            <option value="สิ่งประดิษฐ์">สิ่งประดิษฐ์</option>
                                            <option value="รางวัล">รางวัล</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">รายละเอียดทุน
                                </label>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <textarea class="form-control" rows="4" name="description" style="resize: none;"/>{{ $fund ? $fund->description : null }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @if($fund->downloads)
                            <div class="form-group margin-top-20">
                              <label class="control-label col-md-3">เอกสารสำหรับดาวน์โหลด</label>
                              <div class="col-md-8">

                                              @foreach($fund->downloads as $download)
                                                <li class="file_list" id="download_{{$download->id}}">


                                                    <div class="list-item-content">
                                                          <div style="float:left">
                                                            <a href="{{route('base')}}/{{$download->file_path}}"><i class="fa fa-file"></i> {{$download->filename()}}</a>
                                                            <p class='date'><i class="fa fa-clock-o"></i> {{$download->created_at}}</p>
                                                          </div>
                                                            <div style="float:right">
                                                              <!-- <button class="btn green-sharp btn-large" data-toggle="confirmation" data-original-title="Are you sure ?" title="" aria-describedby="confirmation706230">Default configuration</button> -->
                                                            <button downloadid="{{$download->id}}" class='confirm btn btn-danger' type="button" data-toggle="confirmation" data-original-title="Are you sure ?" title=""  class='btn btn-danger'><i class="icon-close"></i></button>
                                                          </div>
                                                          <div class="clearfix"></div>
                                                    </div>
                                                    <div class='error'></div>
                                                </li>
@endforeach
                              </div>
                            </div>
                            @endif
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">
                                </label>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <button id="file_upload" type="button" class="btn btn-success">
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>อัพโหลดเอกสารเพิ่ม</span>
                                        </button>
                                        <span class="help-block alert alert-info">* ต้องทำรายการเพิ่มทุนให้เรียบร้อยก่อน จึงจะสามารถใช้งานอัพโหลดเอกสารได้</span>
                                    </div>
                                </div>
                            </div>

                            <h3 class="form-section">Fund Duration</h3>
                            <div class="form-group margin-top-20">
                                <label class="control-label col-md-3">วันที่เปิดรับสมัคร
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                        <input type="text" class="form-control" readonly="" name="apply_start" value="{{ $fund ? $fund->apply_start : null }}">
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
                                            <input type="text" class="form-control" readonly="" name="apply_end" value="{{ $fund ? $fund->apply_end : null }}">
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
                                            <input type="text" class="form-control" readonly="" name="upload_start" value="{{ $fund ? $fund->upload_start : null }}">
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
                                            <input type="text" class="form-control" readonly="" name="upload_end" value="{{ $fund ? $fund->upload_end : null }}">
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
                                            <input type="text" class="form-control" readonly="" name="contract_end" value="{{ $fund ? $fund->contract_end : null }}">
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
<script type="text/javascript">
    $(document).ready(function () {

        $(".confirm").on("confirmed.bs.confirmation",function(){
          confirmDelete(this.getAttribute("downloadid"));
        }
        );
        // Add class selected navigator
        $('#main_fund, #sub4_fund').addClass("active open");
        $('#main_fund a, #sub4_fund a').append("<span class='selected'></span>");

        // iInitial Data
        if ('{{ $fund }}') {
            $("#fund_type").val('{{ $fund ? $fund->type : null }}');
        }

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
                    required: !0,
                    minlength: 3
                },
                type: {
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
        });

        $('#file_upload').click(function () {
            var fund = '{{ $fund }}';
            if (!fund) {
                alert('ต้องทำรายการเพิ่มทุนให้เรียบร้อยก่อน');
            }
            else {
                window.location = "{{ $fund ? route('fund_form_file_upload', array('id' => $fund->id)) : null }}";
            }
        });

    });


    function confirmDelete(downloadid){
      $.ajax( {
        url: "{{ route('base_rswk') }}/fund_file_delete/"+downloadid,
        dataType: 'json'
      })
      .done(function(msg) {
        if(msg.id)$('#download_'+msg.id).slideUp();
        else $('#download_'+downloadid+">.error").html("<span class='alert alert-danger'>"+msg.error+"</span>");

      });
    }
</script>
@endsection
