@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-12">
                            <div class="note note-success">
                                <p> Please try to re-size your browser window in order to see the tables in responsive mode. </p>
                            </div>

                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>User Management</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
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
                                                <tr>
                                                    <td> 1 </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                </tr>
                                                <tr>
                                                    <td> 2 </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                </tr>
                                                <tr>
                                                    <td> 3 </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                    <td> Table cell </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                    </div>
@endsection
