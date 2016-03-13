@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-12">

                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            @include('message')
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>{{trans('admin.user_manage')}}</div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> {{trans('admin.name')}} </th>
                                                    <th> {{trans('admin.national_id')}}</th>
                                                    <th> {{trans('admin.email')}} </th>
                                                    <th> {{trans('admin.status')}} </th>
                                                    <th> {{trans('admin.operation')}} </th>
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
                                                        <a class='btn btn-xs btn-primary' href='{{route('user_approve',['userid'=>$user->id,'status'=>'approved'])}}'>{{trans('admin.approved')}}</a>
                                                        <a class='btn btn-xs btn-danger' href='{{route('user_approve',['userid'=>$user->id,'status'=>'rejected'])}}'>{{trans('admin.rejected')}}</a>
                                                        @else
                                                        {{trans('admin.'.$user->status)}}
                                                        @endif
                                                    </td>
                                                    <td> <a class='btn btn-xs btn-info' href='{{route('user_detail',['userid'=>$user->id])}}'>{{trans('admin.edit')}}</a></td>
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
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_admin, #sub1_admin').addClass("active open");
        $('#main_admin a, #sub1_admin a').append("<span class='selected'></span>");
    });
</script>
@endsection
