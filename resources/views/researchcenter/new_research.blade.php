@extends('layouts.app')

@section('content')
<script>
$(document).ready(function(){
  showField($('#research_type :selected').val());
});
function showField(name){
  $(".option").hide();
  $("."+name).show();
}
</script>
<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-plus font-red-sunglo"></i>
                                                    <span class="caption-subject font-red-sunglo bold uppercase">{{trans('research.new_research')}}</span>
                                                    <span class="caption-helper"></span>
                                                </div>

                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->

                                                  <form action="{{route('new_research')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                  <input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}" >
                                                    <div class="form-body">
                                                      @include('message')

                                                      <div class="form-group">
                                                          <label class="col-md-3 control-label">{{trans('research.type')}}</label>
                                                          <div class="col-md-4">
                                                            <select id="research_type" class="form-control" name="type" onchange="showField($(this).val())">
                                                      <option value="article">{{trans('research.article')}}</option>
                                                      <option value="research">{{trans('research.research')}}</option>
                                                      <option value="academic">{{trans('research.academic')}}</option>
                                                      <option value="book">{{trans('research.book')}}</option>
                                                      <option value="invention">{{trans('research.invention')}}</option>
                                                      <option value="award">{{trans('research.award')}}</option>
                                                  </select>
                                                          </div>
                                                      </div>

                                                      <div class="form-group">
                                                          <label class="col-md-3 control-label">{{trans('research.field')}}</label>
                                                          <div class="col-md-4">
                                                            <select class="form-control" name="field">
                                                              @foreach($fields as $field)
                                                      <option value="{{$field->id}}">{{$field->name}}</option>
                                                      @endforeach
                                                  </select>
                                                          </div>
                                                      </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.title')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="title" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.title_thai')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="title_thai" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.authors')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text"  name="authors" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.keywords')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text"  name="keywords" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research academic book">
                                                            <label class="col-md-3 control-label">{{trans('research.abstract')}}</label>
                                                            <div class="col-md-4">
                                                                <textarea class="form-control"  name="abstract" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research academic book">
                                                            <label class="col-md-3 control-label">{{trans('research.fulltext_upload')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="fulltext_file" >
                                                            </div>
                                                        </div>


                                                        <div class="form-group option article research academic book">
                                                            <label class="col-md-3 control-label">{{trans('research.article_upload')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="article_file" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book" style="display:none;">
                                                            <label class="col-md-3 control-label">{{trans('research.cover_upload')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="cover_file" >
                                                            </div>
                                                        </div>

                                                        <!-- prize option -->
                                                        <div class="form-group option invention award">
                                                            <label class="col-md-3 control-label">{{trans('research.prize_name')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="prize_name" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option invention award">
                                                            <label class="col-md-3 control-label">{{trans('research.issuer')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="issuer" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option invention award">
                                                            <label class="col-md-3 control-label">{{trans('research.prize_level')}}</label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="prize_level" >
                                                        <option value="local">{{trans('research.local')}}</option>
                                                        <option value="international">{{trans('research.international')}}</option>
                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option invention award article">
                                                            <label class="col-md-3 control-label">{{trans('research.weight')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="weight" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <!-- end prize option -->

                                                        <!-- article option -->
                                                        <div class="form-group option article">
                                                            <label class="col-md-3 control-label">{{trans('research.article_level')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="article_level" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <!-- end article option -->

                                                        <!-- book option -->
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.book_type')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="book_type" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.subject')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="subject" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.course')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="course" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.degree')}}</label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="degree" >
                                                        <option value="bachelor">{{trans('research.bachelor')}}</option>
                                                        <option value="master">{{trans('research.international')}}</option>
                                                        <option value="doctor">{{trans('research.doctor')}}</option>
                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.subject_type')}}</label>
                                                            <div class="col-md-4">
                                                              <input type="text" name="subject_type" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.project')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="project" class="form-control" placeholder="">
                                                            </div>
                                                        </div>

                                                        <!-- end book option -->


                                                        <div class="form-group option article research academic">
                                                            <label class="col-md-3 control-label">{{trans('research.publication_name')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="publication_name" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.published_month')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_month" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.published_year')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_year" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research academic book">
                                                            <label class="col-md-3 control-label">{{trans('research.issue')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="issue" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research academic">
                                                            <label class="col-md-3 control-label">{{trans('research.pages')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_page" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.cited_link')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="cited" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="col-md-3 control-label">{{trans('research.cited_count')}}</label>
                                                            <div class="col-md-1">
                                                                <input type="text" class="form-control"  name="cited_count" placeholder="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">{{trans('research.submit')}}</button>
                                                                <button type="button" class="btn default">{{trans('research.cancel')}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_data_research, #sub3_data_research').addClass("active open");
        $('#main_data_research a, #sub3_data_research a').append("<span class='selected'></span>");
    });
</script>
@endsection
