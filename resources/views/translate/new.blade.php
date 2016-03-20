@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
        <div class="portlet light portlet-fit portlet-form">
            <div class="portlet-title">
                <div class="caption font-red">
                    <i class="icon-plus font-red"></i>
                    <span class="bold">&nbsp;{{ trans('fund.add_translate') }}</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form  action="{{route('add_translate')}}" method="post"  class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group margin-top-20">
                            <label class="control-label col-md-3">{{ trans('fund.transation_note') }}
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <textarea name="note" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-lg btn-info swa-confirm">
                                        <i class="fa fa-plus"></i>
                                        {{ trans('fund.add_translation') }}
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

      $(".swa-confirm").on("click", function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "Are you sure you want to use translation service?",
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
      swal({   title: "Are you sure you want to use translation service?",
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
