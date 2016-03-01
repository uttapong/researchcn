@extends('layouts.app')

@section('content')
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
                                                      @if(isset($msg))
                                                      <div class="alert alert-dismissible alert-{{$alert_type}}" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        {{$msg}}</div>
                                                      @endif
                                                      @if (count($errors) > 0)
    <div class="alert alert-danger col-md-12">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                                                      <div class="form-group">
                                                          <label class="col-md-3 control-label">Type</label>
                                                          <div class="col-md-4">
                                                            <select class="form-control" name="type">
                                                      <option value="research">บทความวิจัย</option>
                                                      <option value="academic">บทความวิชาการ</option>
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
                                                                <input type="file" name="fulltext_file" id="exampleInputFile">
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