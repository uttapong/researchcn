@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <button onclick="window.history.back();" class="btn font-red">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sbold"></span>
                        </button>
                    </div>
                </div>
                <div class="portlet-body">
                        <div class="text-center"></div>
               
                        <table class="table table-striped table-hover order-column" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%"> # </th>
                                   <!--  <th width="15%"> File Name</th> -->
                                    <th width="25%"> File Type </th>
                                    <th width="40%"> Uploaded on </th>
                                     <th width="7%">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($uploads as $index=>$upload)
                                    <tr>
                                        <td align="center">
                                            {{ $index + 1 }}
                                        </td>
                                        <!-- <td align="left">
                                            {{ $upload->file_path }}
                                        </td> -->
                                        <td align="left">
                                            {{ $upload->getFileType() }}
                                        </td>
                                        <td align="left">
                                        {{ date('d F Y H:i:s', strtotime($upload->created_at)) }}
                                        </td>
                                         <td align="left">
                                        <a target="_blank" href="{{route('base')}}/{{$upload->file_path}}" class="btn btn-xs btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>


@endsection
