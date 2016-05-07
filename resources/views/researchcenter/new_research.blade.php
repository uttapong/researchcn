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
                                                    <span class="caption-subject font-red-sunglo bold uppercase">@if(isset($research))  {{trans('research.update_research')}} @else {{trans('research.new_research')}}  @endif </span>
                                                    <span class="caption-helper"></span>
                                                </div>

                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->

                                                  <form action="{{route('new_research')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                  {{  csrf_field() }}
                                                   @if(isset($research))
                                                     <input name="research_id" type="hidden" value="{{ $research->id }}" >
                                                   @endif
                                                    <div class="form-body">
                                                      @include('message')

                                                      <div class="form-group">
                                                          <label class="col-md-3 control-label">{{trans('research.type')}}</label>
                                                          <div class="col-md-4">
                                                            <select id="research_type" class="form-control" name="type" onchange="showField($(this).val())">
                                                      <option value="research" @if(isset($research)&&$research->type=='research') selected='selected' @endif>{{trans('research.research')}}/{{trans('research.research_article')}}</option>
                                                      <!-- <option value="article">{{trans('research.research_article')}}</option> -->
                                                      <option value="academic" @if(isset($research)&&$research->type=='academic') selected='selected' @endif>{{trans('research.academic')}}</option>
                                                      <option value="book" @if(isset($research)&&$research->type=='book') selected='selected' @endif>{{trans('research.book')}}</option>
                                                      <option value="invention" @if(isset($research)&&$research->type=='invention') selected='selected' @endif>{{trans('research.invention')}}</option>
                                                      <option value="award" @if(isset($research)&&$research->type=='award') selected='selected' @endif>{{trans('research.award')}}</option>
                                                  </select>
                                                          </div>
                                                      </div>

                                                      <div class="form-group">
                                                          <label class="col-md-3 control-label">{{trans('research.field')}}</label>
                                                          <div class="col-md-4">
                                                            <select class="form-control" name="field">
                                                              @foreach($fields as $field)
                                                      <option value="{{$field->id}}"  @if(isset($research)&&$research->field==$field->id) selected='selected' @endif>{{$field->name}}</option>
                                                      @endforeach
                                                  </select>
                                                          </div>
                                                      </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.title')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="title" class="form-control" placeholder="" @if(isset($research)) value="{{$research->title}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.title_thai')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="title_thai" class="form-control" placeholder="" @if(isset($research)) value="{{$research->thai_title}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.authors')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text"  name="authors" class="form-control" placeholder="" @if(isset($research)) value="{{$research->authors}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.keywords')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text"  name="keywords" class="form-control" placeholder="" @if(isset($research)) value="{{$research->keywords}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research academic">
                                                            <label class="col-md-3 control-label">{{trans('research.abstract')}}</label>
                                                            <div class="col-md-4">
                                                                <textarea class="form-control"  name="abstract" rows="4">@if(isset($research)) {{$research->abstract}} @endif</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option  article research academic">
                                                            <label class="col-md-3 control-label">{{trans('research.fulltext_upload')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="fulltext_file" >
                                                            </div>
                                                            @if(isset($research->full_text_file))
                                                            <div class="col-md-5">
                                                              <a class='' href='{{route('base')}}/uploads/{{$research->id}}/{{$research->full_text_file}}'> View Uploaded File</a>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group option  article research academic">
                                                            <label class="col-md-3 control-label">{{trans('research.abstract_upload')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="abstract_file" >
                                                            </div>
                                                            @if(isset($research->abstract_file))
                                                            <div class="col-md-5">
                                                              <a class='' href='{{route('base')}}/uploads/{{$research->id}}/{{$research->abstract_file}}'> View Uploaded File</a>
                                                            </div>
                                                            @endif
                                                        </div>


                                                        <div class="form-group option article research academic">
                                                            <label class="col-md-3 control-label">{{trans('research.article_upload')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="article_file" >
                                                            </div>
                                                            @if(isset($research->article_file))
                                                            <div class="col-md-5">
                                                              <a class='' href='{{route('base')}}/uploads/{{$research->id}}/{{$research->article_file}}'> View Uploaded File</a>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group option book" style="display:none;">
                                                            <label class="col-md-3 control-label">{{trans('research.cover_upload')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="cover_file" >
                                                            </div>
                                                            @if(isset($research->cover_file))
                                                            <div class="col-md-5">
                                                              <a class='' href='{{route('base')}}/uploads/{{$research->id}}/{{$research->cover_file}}'> View Uploaded File</a>
                                                            </div>
                                                            @endif
                                                        </div>

                                                        <!-- prize option -->
                                                        <div class="form-group option invention award">
                                                            <label class="col-md-3 control-label">{{trans('research.prize_name')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="prize_name" class="form-control" placeholder="" @if(isset($research)) value="{{$research->prize_name}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option invention award">
                                                            <label class="col-md-3 control-label">{{trans('research.issuer')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="issuer" class="form-control" placeholder="" @if(isset($research)) value="{{$research->issuer}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option invention award">
                                                            <label class="col-md-3 control-label">{{trans('research.prize_level')}}</label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="prize_level"  >
                                                        <option value="local"  @if(isset($research)&&$research->prize_level=='local') selected='selected' @endif>{{trans('research.local')}}</option>
                                                        <option value="international"  @if(isset($research)&&$research->prize_level=='international') selected='selected' @endif>{{trans('research.international')}}</option>
                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option invention award article">
                                                            <label class="col-md-3 control-label">{{trans('research.weight')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="weight" class="form-control" placeholder="" @if(isset($research)) value="{{$research->weight}}" @endif>
                                                            </div>
                                                        </div>
                                                        <!-- end prize option -->

                                                        <!-- article option -->
                                                        <div class="form-group option article research">
                                                            <label class="col-md-3 control-label">{{trans('research.article_level')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="article_level" class="form-control" placeholder="" @if(isset($research)) value="{{$research->article_level}}" @endif>

                                                                <input type="text" name="article_level[]" class="form-control">
                                                                <input name="article_level[]" type="checkbox" value=""> ISI1
                                                                <input name="article_level[]" type="checkbox" value=""> ISI2
                                                                <input name="article_level[]" type="checkbox" value=""> ISI3
                                                                <input name="article_level[]" type="checkbox" value=""> ISI4
                                                                <input name="article_level[]" type="checkbox" value=""> SCOPUS
                                                                <input name="article_level[]" type="checkbox" value=""> SCIMACO Q1
                                                                <input name="article_level[]" type="checkbox" value=""> ISCIMACO Q1
                                                                <input name="article_level[]" type="checkbox" value=""> SCIMACO Q1
                                                                <input name="article_level[]" type="checkbox" value=""> SCIMACO Q1
                                                                <input name="article_level[]" type="checkbox" value=""> Pubmed
                                                                <input name="article_level[]" type="checkbox" value=""> EBSB Host
                                                                <input name="article_level[]" type="checkbox" value=""> ISI
                                                            </div>
                                                        </div>
                                                        <!-- end article option -->

                                                        <!-- book option -->
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.book_type')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="book_type" class="form-control" placeholder="" @if(isset($research)) value="{{$research->book_type}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.subject')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="subject" class="form-control" placeholder="" @if(isset($research)) value="{{$research->subject}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.course')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="course" class="form-control" placeholder="" @if(isset($research)) value="{{$research->course}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.degree')}}</label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="degree" >
                                                        <option value="bachelor"  @if(isset($research)&&$research->degree=='bachelor') selected='selected' @endif>{{trans('research.bachelor')}}</option>
                                                        <option value="master" @if(isset($research)&&$research->degree=='master') selected='selected' @endif>{{trans('research.international')}}</option>
                                                        <option value="doctor" @if(isset($research)&&$research->degree=='doctor') selected='selected' @endif>{{trans('research.doctor')}}</option>
                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.subject_type')}}</label>
                                                            <div class="col-md-4">
                                                              <input type="text" name="subject_type" class="form-control" placeholder="" @if(isset($research)) value="{{$research->subject_type}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book">
                                                            <label class="col-md-3 control-label">{{trans('research.project')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="project" class="form-control" placeholder="" @if(isset($research)) value="{{$research->project}}" @endif>
                                                            </div>
                                                        </div>

                                                        <!-- end book option -->


                                                        <div class="form-group option article research academic">
                                                            <label class="col-md-3 control-label">{{trans('research.publication_name')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="publication_name" placeholder="" @if(isset($research)) value="{{$research->publication_name}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.published_month')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_month" placeholder="" @if(isset($research)) value="{{$research->published_month}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.published_year')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_year" placeholder="" @if(isset($research)) value="{{$research->published_year}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{trans('research.funding_year')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="funding_year" placeholder="" @if(isset($research)) value="{{$research->funding_year}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research academic book">
                                                            <label class="col-md-3 control-label">{{trans('research.issue')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="issue" placeholder="" @if(isset($research)) value="{{$research->issue}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research academic">
                                                            <label class="col-md-3 control-label">{{trans('research.pages')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_page" placeholder="" @if(isset($research)) value="{{$research->published_page}}" @endif>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="form-group  option article research">
                                                            <label class="col-md-3 control-label">{{trans('research.cited_link')}}</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="cited" placeholder="" @if(isset($research)) value="{{$research->cited}}" @endif>
                                                            </div>
                                                        </div> -->
                                                        <div class="form-group option article research">
                                                            <label class="col-md-3 control-label">{{trans('research.isi')}}</label>
                                                            <div class="col-md-1">
                                                                <input type="text" class="form-control"  name="isi" placeholder="" @if(isset($research)) value="{{$research->isi}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research">
                                                            <label class="col-md-3 control-label">{{trans('research.isi_link')}}</label>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control"  name="isi_link" placeholder="" @if(isset($research)) value="{{$research->isi_link}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research">
                                                            <label class="col-md-3 control-label">{{trans('research.scopus')}}</label>
                                                            <div class="col-md-1">
                                                                <input type="text" class="form-control"  name="scopus" placeholder="" @if(isset($research)) value="{{$research->scopus}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research">
                                                            <label class="col-md-3 control-label">{{trans('research.scopus_link')}}</label>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control"  name="scopus_link" placeholder="" @if(isset($research)) value="{{$research->scopus_link}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group  option article research">
                                                            <label class="col-md-3 control-label">{{trans('research.tci')}}</label>
                                                            <div class="col-md-1">
                                                                <input type="text" class="form-control"  name="tci" placeholder="" @if(isset($research)) value="{{$research->tci}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group  option article research">
                                                            <label class="col-md-3 control-label">{{trans('research.tci_link')}}</label>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control"  name="tci_link" placeholder="" @if(isset($research)) value="{{$research->tci_link}}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="form-group  option article research">
                                                            <label class="col-md-3 control-label">{{trans('research.research_tools')}}</label>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control"  name="research_tools" placeholder="" @if(isset($research)) value="{{$research->research_tools}}" @endif>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">@if(isset($research))  {{trans('research.update')}} @else {{trans('research.submit')}}  @endif</button>
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
