@extends('layouts.app')

@section('content')
<script>
function showField(name){
  $(".option").hide();
  $("."+name).show();
}
</script>
<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-plus font-red-sunglo"></i>
                                                    <span class="caption-subject font-red-sunglo bold uppercase">Add New Research</span>
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
                                                          <label class="col-md-3 control-label">Type</label>
                                                          <div class="col-md-4">
                                                            <select class="form-control" name="type" onchange="showField($(this).val())">
                                                      <option value="article">บทความวิจัย</option>
                                                      <option value="research">ผลงานวิจัย</option>
                                                      <option value="academic">ผลงานวิชาการ</option>
                                                      <option value="book">ตำรา</option>
                                                      <option value="invention">สิ่งประดิษฐ์</option>
                                                      <option value="award">รางวัล</option>
                                                  </select>
                                                          </div>
                                                      </div>

                                                      <div class="form-group">
                                                          <label class="col-md-3 control-label">Research Field</label>
                                                          <div class="col-md-4">
                                                            <select class="form-control" name="type">
                                                              @foreach($fields as $field)
                                                      <option value="{{$field->id}}">{{$field->name}}</option>
                                                      @endforeach
                                                  </select>
                                                          </div>
                                                      </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Title</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="title" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Authors</label>
                                                            <div class="col-md-4">
                                                                <input type="text"  name="authors" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Keywords</label>
                                                            <div class="col-md-4">
                                                                <input type="text"  name="keywords" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Abstract</label>
                                                            <div class="col-md-4">
                                                                <textarea class="form-control"  name="abstract" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Full text file upload</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="fulltext_file" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group option article research academic book">
                                                            <label class="col-md-3 control-label">Article file upload</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="article_file" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group option book" style="display:none;">
                                                            <label class="col-md-3 control-label">Cover,Table of Contents,Preface file upload</label>
                                                            <div class="col-md-4">
                                                                <input type="file" name="cover_file" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Publication Name</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="publication_name" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Published Month</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_month" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Published Year</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_year" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Issue</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="issue" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Pages</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"  name="published_page" placeholder="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <button type="button" class="btn default">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
@endsection
