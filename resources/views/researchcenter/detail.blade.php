@extends('layouts.app')

@section('content')
<style>
.adv-search input, .adv-search button{
  margin: 3px 0 3px 0
}
.authors{
  color:#36c6d3;
 font-size: 1.2rem;
}
.published{
  color:#444;
 font-size: 1.2rem;
}
.keywords,.cited_count, .cited{
  color:#444;
 font-size: 1.2rem;
}
.fulltext{

}
.abstract{
  font-size:1.2rem;
}
</style>
<div class="row">
  <div class="col-md-12">
     <!-- BEGIN PORTLET-->
     <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('base_rscn')}}">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>{{$research->title}}</span>
                            </li>
                        </ul>
                    </div>

     <div class="portlet light ">
         <div class="portlet-title">
             <div class="caption">
                 <span class="caption-subject font-dark bold uppercase" id="title">{{$research->title}} </span>

             </div>

         </div>
         <div id="preview" class="portlet-body">

           <p class="authors">{{trans('research.authors')}}: <span id="authors">{{$research->authors}}</span></p>
           <p class="published">{{trans('research.published_on')}}<span id="publication_name">{{$research->published_on}}</span> <span id="published_month">{{$research->published_month}}</span> <span id="published_year">{{$research->published_year}}</span>,{{trans('research.issue')}} <span id="issue">{{$research->issue}}</span>,{{trans('research.pages')}} <span id="page">{{$research->pages}}</span></p>
           <p class="keywords">{{trans('research.keywords')}}: <span id="keywords">{{$research->keywords}}</span></p>
           <p class="cited_count">{{trans('research.cited_count')}}: <span id="cited_count">{{$research->cited_count}}</span></p>
           <p class="cited_count">{{trans('research.research_tools')}}: <span id="research_tools">{{$research->research_tools}}</span></p>
           <p id="abstract">{{$research->abstract}}</p>
           @if($research->type=='research'||$research->type=='article')
           <p class="cited"><span class="label label-success">{{trans('research.isi')}}: {{$research->isi?$research->isi:'-'}}</span> {{trans('research.isi_link')}}: {{$research->isi_link?$research->isi_link:0}}</p>
           <p class="cited"><span class="label label-success">{{trans('research.scopus')}}: {{$research->scopus?$research->scopus:'-'}}</span> {{trans('research.scopus_link')}}: {{$research->scopus_link?$research->scopus_link:0}}</p>
           <p class="cited"><span class="label label-success">{{trans('research.tci')}}: {{$research->tci?$research->tci:'-'}}</span> {{trans('research.tci_link')}}: {{$research->tci_link?$research->tci_link:0}}</p>
           @endif
           <p class="search-desc">
           @if($research->article_file)  <a href="{{route('base')}}/uploads/{{$research->id}}/{{$research->article_file}}" class='btn btn-lg btn-info'><span class="glyphicon glyphicon-download" aria-hidden="true"></span> {{trans('research.article_download')}}</a>
           @endif
           @if($research->abstract_file)  <a href="{{route('base')}}/uploads/{{$research->id}}/{{$research->abstract_file}}" class='btn btn-lg btn-info'><span class="glyphicon glyphicon-download" aria-hidden="true"></span> {{trans('research.abstract_download')}}</a>
           @endif
          @if($research->full_text_file)
           <a href="{{ route('get_research',['researchid'=>$research->id])}}" class='btn btn-lg btn-danger'><span class="glyphicon glyphicon-download" aria-hidden="true"></span> {{trans('research.fulltext_download')}}</a>
           @endif
           </p>


         </div>
     </div>
     <!-- END PORTLET-->
 </div>
</div>
@endsection
