@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-12">

                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            @include('message')
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>{{trans('translate.manage')}}</div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th> # </th>
                                                    <th> {{trans('translate.name')}} </th>
                                                    <th> {{trans('translate.submitter')}} </th>
                                                    <th> {{trans('translate.status')}} </th>

                                                    <th> {{trans('translate.note')}}</th>
                                                    <th> {{trans('translate.operation')}} </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($translates as  $index => $translate)
                                              <form action="{{route('translate_save_status',['translate_id'=>$translate->id])}}" method="post">
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <tr>
                                                    <td> {{$index+1}} </td>
                                                    <td> {{$translate->name}} </td>
                                                    <td> {{$translate->creator->name}} </td>
                                                    <td>
                                                        @if(Auth::user()&&Auth::user()->is('admin'))
                                                    <select class="form-control" name='status'>
                                                        <option value="รับงาน" @if($translate->status=='รับงาน') selected='selected' @endif>รับงาน</option>
                                                        <option value="ไม่รับงาน" @if($translate->status=='ไม่รับงาน') selected='selected' @endif>ไม่รับงาน</option>
                                                        <option value="ส่งใบเสนอราคา" @if($translate->status=='ส่งใบเสนอราคา') selected='selected' @endif>ส่งใบเสนอราคา</option>
                                                        <option value="อยู่ระหว่างดำเนินการ" @if($translate->status=='อยู่ระหว่างดำเนินการ') selected='selected' @endif>อยู่ระหว่างดำเนินการ</option>
                                                        <option value="ส่งงานครั้งที่1" @if($translate->status=='ส่งงานครั้งที่1') selected='selected' @endif>ส่งงานครั้งที่1</option>
                                                        <option value="แก้ไข" @if($translate->status=='แก้ไข') selected='selected' @endif>แก้ไข</option>
                                                        <option value="ส่งงานแก้ไข" @if($translate->status=='ส่งงานแก้ไข') selected='selected' @endif>ส่งงานแก้ไข</option>
                                                        <option value="อยู่ระหว่างรอชำระค่าบริการ" @if($translate->status=='อยู่ระหว่างรอชำระค่าบริการ') selected='selected' @endif>อยู่ระหว่างรอชำระค่าบริการ</option>
                                                        <option value="สิ้นสุด" @if($translate->status=='สิ้นสุด') selected='selected' @endif>สิ้นสุด</option>
                                                        <option value="ยกเลิกการขอรับบริการ" @if($translate->status=='ยกเลิกการขอรับบริการ') selected='selected' @endif>ยกเลิกการขอรับบริการ</option>
                                                        

                                                       <!--  <option value="ผู้เชี่ยวชาญชาวไทย"  @if($translate->status=='ผู้เชี่ยวชาญชาวไทย') selected='selected' @endif>ผู้เชี่ยวชาญชาวไทย</option>
                                                        <option value="ผู้เชี่ยวชาญต่างประเทศ"  @if($translate->status=='ผู้เชี่ยวชาญต่างประเทศ') selected='selected' @endif>ผู้เชี่ยวชาญต่างประเทศ</option>
                                                        <option value="พิจารณางานแปล"  @if($translate->status=='พิจารณางานแปล') selected='selected' @endif>พิจารณางานแปล</option>
                                                        <option value="ส่งมอบ/ชำระ"  @if($translate->status=='ส่งมอบ/ชำระ') selected='selected' @endif>ส่งมอบ/ชำระ</option> -->

                                                    </select>
                                                    @else
                                                    {{$translate->status}}
                                                  @endif
                                                </td>
                                                    <td> {{$translate->note}} </td>
                                                    <td>
                                                          @if(Auth::user()&&Auth::user()->is('admin'))<button type='submit' class='btn btn-primary' >{{trans('translate.save')}}</button>@endif
                                                        <a href='{{route('upload_translate',['type='=>$type,'translate_id'=>$translate->id])}}' class='btn btn-info' >{{trans('translate.view_files')}}</a>

                                                    </td>
                                                  </form>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                          {!! $translates->links() !!}
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_menu, #sub2_menu').addClass("active open");
        $('#main_menu a, #sub2_menu a').append("<span class='selected'></span>");
    });
</script>
@endsection
