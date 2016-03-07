@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
     <!-- BEGIN PORTLET-->
     <div class="portlet light ">
         <div class="portlet-title">
             <div class="caption">
                 <span class="caption-subject font-dark bold uppercase" id="title">Aricle Preview <span style="font-size: 10px;"><br />Click an article on the left to view information</span></span>


             </div>

         </div>
         <div id="preview" style="display:none;" class="portlet-body">

           <p class="authors">Author(s): <span id="authors"></span></p>
           <p class="published">Published on<span id="publication_name"></span> <span id="published_month"></span> <span id="published_year"></span>,issue <span id="issue">,page <span id="page"></span></p>
           <p class="keywords">Keywords: <span id="keywords"></span></p>
           <p id="abstract"></p>
           <p class="fulltext">Full text Download: <span id="download"></span><p>
         </div>
     </div>
     <!-- END PORTLET-->
 </div>
</div>
@endsection
