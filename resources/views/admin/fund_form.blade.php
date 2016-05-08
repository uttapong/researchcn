@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
        <div class="portlet light portlet-fit portlet-form">
            <div class="portlet-title">
                <div class="caption font-red">
                    <i class="{{ $fund ? 'fa fa-edit' : 'icon-plus' }} font-red"></i>
                    <span class="bold">&nbsp;{{ $fund ? trans('fund.add_funds-title-edit') : trans('fund.add_funds-title-add') }}</span>
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
                            {{ trans('fund.add_funds-error-message') }}
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button>
                            {{ $fund ? trans('fund.add_funds-success-message-edit') : trans('fund.add_funds-success-message-add') }}
                        </div>
                        <h3 class="form-section">{{ trans('fund.add_funds-sub_title1') }}</h3>
                        <div class="form-group margin-top-20">
                            <label class="control-label col-md-3">{{ trans('fund.add_funds-form1-1') }}
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
                            <label class="control-label col-md-3">{{ trans('fund.add_funds-form1-2') }}
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select id="fund_type" class="form-control" name="type">
                                        <option value="">----- &nbsp;{{ trans('fund.add_funds-select') }}&nbsp; -----</option>
                                        <option value="ทุนภายใน">ทุนภายใน</option>
                                        <option value="ทุนภายนอก">ทุนภายนอก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group margin-top-20">
                            <label class="control-label col-md-3">{{ trans('fund.add_funds-form1-3') }}
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <textarea class="form-control" rows="4" name="description" style="resize: none;"/>{{ $fund ? $fund->description : null }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group margin-top-20">
                            <label class="control-label col-md-3">{{ trans('fund.add_funds-form1-4') }}</label>
                            <div class="col-md-8">
                                @if($fund && $fund->downloads)
                                    @foreach($fund->downloads as $download)
                                        <li class="file_list" id="download_{{$download->id}}">
                                            <div class="list-item-content">
                                                <div style="float:left">
                                                    <a href="{{route('base')}}/{{$download->file_path}}" download>
                                                        <i class="fa fa-file"></i> {{ $download->filename() }}
                                                    </a>
                                                    <p class='date'><i class="fa fa-clock-o"></i> {{ $download->created_at }}</p>
                                                </div>
                                                <div style="float:right">
                                                    <!-- <button class="btn green-sharp btn-large" data-toggle="confirmation" data-original-title="Are you sure ?" title="" aria-describedby="confirmation706230">Default configuration</button> -->
                                                    <button downloadid="{{$download->id}}" class='confirm btn btn-danger' type="button" data-toggle="confirmation" data-original-title="Are you sure ?" title="" class='btn btn-danger'>
                                                        <i class="icon-close"></i><span> Delete</span>
                                                    </button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class='error'></div>
                                        </li>
                                    @endforeach
                                @endif
                                <div class="input-icon right">
                                    <button id="file_upload" type="button" class="btn btn-success">
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>{{ trans('fund.add_funds-upload_btn') }}</span>
                                    </button>
                                     @if(!$fund)
                                        <span class="help-block alert alert-info">* {{ trans('fund.add_funds-upload_note') }}</span>
                                     @endif
                                </div>
                            </div>
                        </div>

                        <h3 class="form-section">{{ trans('fund.add_funds-sub_title2') }}</h3>
                        <div class="form-group margin-top-20">
                            <label class="control-label col-md-3">{{ trans('fund.add_funds-form2-1') }}
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" >
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
                            <label class="control-label col-md-3">{{ trans('fund.add_funds-form2-2') }}
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" >
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
                            <label class="control-label col-md-3">{{ trans('fund.add_funds-form2-3') }}
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" >
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
                            <label class="control-label col-md-3">{{ trans('fund.add_funds-form2-4') }}
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" >
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
                            <label class="control-label col-md-3">แจ้งเตือนครั้งที่ 1 รายงานความก้าวหน้าครั้งที่ 1
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" >
                                        <input type="text" class="form-control" readonly="" name="notice_1" value="{{ $fund ? $fund->notice_1 : null }}">
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
                            <label class="control-label col-md-3">แจ้งเตือนครั้งที่ 2 รายงานความก้าวหน้าครั้งที่ 2
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" >
                                        <input type="text" class="form-control" readonly="" name="notice_2" value="{{ $fund ? $fund->notice_2 : null }}">
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
                            <label class="control-label col-md-3">แจ้งเตือนครั้งที่ 3 แจ้งเตือนปิดโครงการ
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" >
                                        <input type="text" class="form-control" readonly="" name="notice_3" value="{{ $fund ? $fund->notice_3 : null }}">
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
                            <label class="control-label col-md-3">แจ้งเตือนครั้งที่ 4 ขยายเวลาและเตือนสถานะ IRB
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" >
                                        <input type="text" class="form-control" readonly="" name="notice_4" value="{{ $fund ? $fund->notice_4 : null }}">
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button" style="height: 34px">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- <hr width="90%" style="margin: auto;" />
                        <div class="form-group margin-top-20">
                            <label class="control-label col-md-3">{{ trans('fund.add_funds-form2-5') }}
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
                        </div> -->
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-check"></i>
                                        {{ trans('fund.add_funds-submit_btn') }}
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
                // contract_end: {
                //     required: !0
                // }
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
                alert("{{ trans('fund.add_funds-upload_note') }}");
            }
            else {
                window.location = "{{ $fund ? route('fund_form_file_upload', array('id' => $fund->id)) : null }}";
            }
        });

    });


    function confirmDelete(downloadid){
        $.ajax({
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
