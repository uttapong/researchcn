@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-md-6">
                            <div class="portlet light " id="blockui_sample_1_portlet_body">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp sbold">ศูนย์วิจัยการการพยาบาลและพฤติกรรมศาสตร์</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <p> คณะพยาบาลศาสตร์  เป็นศูนย์กลางวิจัยทางการพยาบาลเพื่อสร้างองค์ความรู้ในการแก้ไขปัญหาสาธารณสุขทั้งในระดับท้องถิ่นและระดับประเทศ เป็นคณะที่มีผลงานวิจัยที่มีคุณภาพในด้านการพยาบาล  โดยเฉพาะอย่างยิ่งการทำวิจัยเป็นทีม  การส่งเสริมสุขภาพของบุคคล  ครอบครัว  และชุมชน  และการพัฒนาระบบบริการพยาบาลการศึกษาพยาบาล  และการวิจัยสถาบัน  โดยคณะฯ  จะให้การสนับสนุนส่งเสริมให้อาจารย์ทุกคนได้มีการดำเนินการวิจัยโดยเฉพาะอย่างยิ่งการทำวิจัยเป็นทีม  และมีผลงานวิจัยอย่างสม่ำเสมอ</p>
                                    <p><a href="{{route('rscn_home')}}" class="btn green" > Go</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-red-mint"></i>
                                        <span class="caption-subject font-red-mint sbold">งานวิจัยบริการวิชาการ และวิเทศน์สัมพันธ์</span>

                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <p> คณะพยาบาลศาสตร์  เป็นศูนย์กลางวิจัยทางการพยาบาลเพื่อสร้างองค์ความรู้ในการแก้ไขปัญหาสาธารณสุขทั้งในระดับท้องถิ่นและระดับประเทศ เป็นคณะที่มีผลงานวิจัยที่มีคุณภาพในด้านการพยาบาล  โดยเฉพาะอย่างยิ่งการทำวิจัยเป็นทีม  การส่งเสริมสุขภาพของบุคคล  ครอบครัว  และชุมชน  และการพัฒนาระบบบริการพยาบาลการศึกษาพยาบาล  และการวิจัยสถาบัน  โดยคณะฯ  จะให้การสนับสนุนส่งเสริมให้อาจารย์ทุกคนได้มีการดำเนินการวิจัยโดยเฉพาะอย่างยิ่งการทำวิจัยเป็นทีม  และมีผลงานวิจัยอย่างสม่ำเสมอ</p>
                                      <p><a href="{{route('list_fund')}}" class="btn green" > Go</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
