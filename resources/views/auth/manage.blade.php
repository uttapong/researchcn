@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-12">

                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            @include('message')
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>User Management</div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Name </th>
                                                    <th> Personal ID Card </th>
                                                    <th> Email </th>
                                                    <th> status </th>
                                                    <th> Operation </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($users as  $index => $user)
                                                <tr>
                                                    <td> {{$index+1}} </td>
                                                    <td> {{$user->name}} </td>
                                                    <td> {{$user->idcard}} </td>
                                                    <td> {{$user->email}} </td>
                                                    <td> @if($user->status=='pending' or $user->status=='')
                                                        <a class='btn btn-xs btn-primary' href='{{route('user_approve',['userid'=>$user->id,'status'=>'approved'])}}'>Approve</a>
                                                        <a class='btn btn-xs btn-danger' href='{{route('user_approve',['userid'=>$user->id,'status'=>'rejected'])}}'>Reject</a>
                                                        @else
                                                        {{$user->status}}
                                                        @endif
                                                    </td>
                                                    <td> <a class='btn btn-xs btn-info' href='{{route('user_detail',['userid'=>$user->id])}}'>Edit</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                          {!! $users->links() !!}
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                    </div>
@endsection
