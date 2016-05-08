@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
        <div class="portlet light portlet-fit portlet-form">
            <div class="portlet-title">
                <div class="caption font-red">
                    <i class="icon-plus font-red"></i>
                    <span class="bold">&nbsp;{{ trans('translate.add_translate') }}</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form  action="{{route('add_translate')}}" method="post"  class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group margin-top-20">
                            <label class="control-label col-md-3">{{ trans('translate.transation_note') }}
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                              <select class="form-control" name="note"  >
                        <option value="บริการสืบค้นข้อมูลและสารสนเทศการวิจัย">บริการสืบค้นข้อมูลและสารสนเทศการวิจัย</option>
                        <option value="บริการให้คำปรึกษาการออกแบบการวิจัยทั้งเชิงปริมาณและคุณภาพ">บริการให้คำปรึกษาการออกแบบการวิจัยทั้งเชิงปริมาณและคุณภาพ</option>
                        <option value="บริการลงข้อมูลเพื่อการวิเคราะห์ผลทางสถิติ">บริการลงข้อมูลเพื่อการวิเคราะห์ผลทางสถิติ</option>
                        <option value="บริการวิเคราะข้อมูลเชิงปริมาณ">บริการวิเคราะข้อมูลเชิงปริมาณ</option>
                        <option value="บริการถอดเทปข้อมูลเชิงคุณภาพ">บริการถอดเทปข้อมูลเชิงคุณภาพ</option>
                        <option value="บริการงานสำเนาเอกสารวิจัย">บริการงานสำเนาเอกสารวิจัย</option>
                        <option value="บริการบันทึกข้อมูลลงแผ่นซีดี">บริการบันทึกข้อมูลลงแผ่นซีดี</option>
                        <option value="บริการด้านการแปลบทความ">บริการด้านการแปลบทความ</option>
                        <option value="บริการด้านบรรณาธิการบทความ">บริการด้านบรรณาธิการบทความ</option>
                    </select>
                            </div>
                        </div>


                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-lg btn-info swa-confirm">
                                        <i class="fa fa-plus"></i>
                                        {{ trans('translate.add_translation') }}
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
    <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
      ติดต่อทางไลน์ <img src="http://www.nurse.tu.ac.th/researchcenter/wp-content/uploads/2016/03/center_banner_pink.png" /> 
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_menu, #sub1_menu').addClass("active open");
        $('#main_menu a, #sub1_menu a').append("<span class='selected'></span>");

      $(".swa-confirm").on("click", function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "{{trans('translate.confirm_use_translate')}}",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#cc3f44",
        confirmButtonText: $(this).data("swa-btn-txt"),
        closeOnConfirm: true,
    }, function( confirmed ) {
        if( confirmed ){
          // alert(confirmed);
            form.submit();
          }
    });
});


    });

    function confirmAdd(){
      var result=false;
      swal({   title: "{{trans('translate.confirm_use_translate')}}",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sure",
            closeOnConfirm: false },
            function(confirm){ if(confirm)result=true;else result=false;
              alert(result);return result;
      });
    }

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
