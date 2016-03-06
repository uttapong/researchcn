@extends('layouts.app')

@section('content')
<div class="row">

              <div class=" col-xs-12 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">User Information</span>
                                    </div>

                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" role="form"  method="POST" action="{{route('user_update',['userid'=>$user->id])}}">
                                      {!! csrf_field() !!}
                                        <div class="form-body">
                                          @include('message')
                                          <input type="hidden" name="id"  value="{{$user->id}}" />
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" class="form-control input-inline input-medium" value="{{$user->name}}" placeholder="Enter text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">National ID Card</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="idcard" class="form-control input-inline input-medium" value="{{$user->idcard}}" placeholder="Enter text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="email" class="form-control input-inline input-medium" value="{{$user->email}}" placeholder="Enter text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                          <label class="col-md-3 control-label">Type</label>
                                                          <div class="col-md-3">
                                                            <select class="form-control" name="status">
                                                      <option value="pending" @if($user->status=='pending') selected='selected' @endif>pending</option>
                                                      <option value="approved" @if($user->status=='approved') selected='selected' @endif>approved</option>
                                                      <option value="rejected" @if($user->status=='rejected') selected='selected' @endif>rejected</option>
                                                  </select>
                                                          </div>
                                                      </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Change Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" name="password" class="form-control input-inline input-medium" placeholder="Enter password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Confirm Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" name="password_confirmation" class="form-control input-inline input-medium"  placeholder="Enter password">
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
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                          </div>
                    </div>
@endsection
