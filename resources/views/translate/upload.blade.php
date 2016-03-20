@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="page-bar">
                         <ul class="page-breadcrumb">
                             <li>
                                 <i class="icon-home"></i>
                                 <a href="{{route('translate_list')}}">All Translations</a>
                                 <i class="fa fa-angle-right"></i>
                             </li>
                             <li>
                                 <span>Translation ID:{{$translation_id}}</span>
                             </li>
                         </ul>
                     </div>

        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit portlet-form">
                <div class="portlet-title">
                    <div class="caption font-red">
                        <i class="glyphicon glyphicon-upload font-red"></i>
                        <span class="bold">&nbsp;{{ trans('translate.add_files') }}</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- The file upload form used as target for the file upload widget -->
                    <form id="fileupload" action="{{ route('upload_translatefiles',['type'=>'user','translate_id'=>$translation_id]) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $translation_id }}">
                        <input type="hidden" name="type" value="{{$type}}">
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="form-body row fileupload-buttonbar">
                            <div class="col-lg-7">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Add files...</span>
                                    <input type="file" name="files[]" multiple>
                                </span>
                                <button type="submit" class="btn btn-primary start">
                                    <i class="glyphicon glyphicon-upload"></i>
                                    <span>Start upload</span>
                                </button>
                                <button type="reset" class="btn btn-warning cancel">
                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                    <span>Cancel upload</span>
                                </button>
                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>
                            </div>
                            <!-- The global progress state -->
                            <div class="col-lg-5 fileupload-progress fade">
                                <!-- The global progress bar -->
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                </div>
                                <!-- The extended global progress state -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                    </form>

                    <!-- The template to display files available for upload -->

                </div>
                <div class="portlet-title">
                    <div class="caption font-red">
                        <i class="glyphicon glyphicon-upload font-red"></i>
                        <span class="bold">&nbsp; {{ trans('translate.view_files') }}</span>
                    </div>
                </div>
                <div >
                  <div style="padding: 0px 40px 20px 40px;" id="all_files" ></div>
                </div>

            </div>
            <a href="{{route('add_translate')}}" type="button" class="btn btn-default">
            <i class="glyphicon glyphicon-chevron-left"></i> {{ trans('translate.back_to_list') }}
            </a>
        </div>
    </div>
<script type="text/javascript">
function getFileList(){
  $.ajax( "{{ route('base_rscn') }}/translate_file_list/"+{{$translation_id}} )
  .done(function(msg) {
    $('#all_files').html(msg);


  });
}
    $(document).ready(function () {




      getFileList();

      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});
        // Add class selected navigator
        $('#main_fund, #sub4_fund').addClass("active open");
        $('#main_fund a, #sub4_fund a').append("<span class='selected'></span>");

        FormFileUpload.init();
          $('#fileupload') .bind('fileuploaddone', function (e, data) {getFileList();})
    });

    var FormFileUpload = function() {
        return {
            init: function() {
                $("#fileupload").fileupload({
                    disableImageResize: !1,
                    autoUpload: !1,
                    disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
                    maxFileSize: 50e6
                }), $("#fileupload").fileupload("option", "redirect", window.location.href.replace(/\/[^\/]*$/, "/cors/result.html?%s")), $.support.cors && $.ajax({
                    type: "HEAD"
                }).fail(function() {
                    $('<div class="alert alert-danger"/>').text("Upload server currently unavailable - " + new Date).appendTo("#fileupload")
                }), $("#fileupload").addClass("fileupload-processing"), $.ajax({
                    url: $("#fileupload").attr("action"),
                    dataType: "json",
                    context: $("#fileupload")[0]
                }).always(function() {
                    $(this).removeClass("fileupload-processing");

                }).done(function(e) {
                    $(this).fileupload("option", "done").call(this, $.Event("done"), {
                        result: e
                    })
                })
            }
        }


    }();

    function confirmDelete(doc_id){


        var result=false;
        swal({   title: "{{ trans('translate.confirm_file_delete') }}",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
              confirmButtonText: "Sure",
              closeOnConfirm: true },
              function(confirm){ if(confirm)removeDoc(doc_id);
            return result;
        });



    }
    function removeDoc(doc_id){
      $.ajax({
          url: "{{ route('base_rscn') }}/translate_file_delete/"+doc_id,
          dataType: 'json'
      })
      .done(function(msg) {
          if(msg.id)getFileList();
          else $('#doc_'+doc_id+">.error").html("<span class='alert alert-danger'>"+msg.error+"</span>");
      });
    }
</script>
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
@endsection
