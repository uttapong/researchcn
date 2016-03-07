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
.keywords{
  color:#444;
 font-size: 1.2rem;
}
.fulltext{

}
.abstract{
  font-size:1.2rem;
}
</style>
<script>
function getPreview(id){
  $.ajax( "{{ route('base_rscn') }}/preview/"+id )
  .done(function(msg) {
    if(msg)$('#preview').show();
    else $('#preview').hide();

    $('#title').html(msg.title);
    $('#authors').html(msg.authors);
    $('#abstract').html(msg.abstract);
    $('#keywords').html(msg.keywords);
    $('#publication_name').html(msg.publication_name);
    $('#published_month').html(msg.published_month);
    $('#published_year').html(msg.title);
    $('#issue').html(msg.issue);
    $('#page').html(msg.page);
    $('#download').html(msg.file_path);
    if(msg.file_path)
    $('#download').html('<a href="{{ URL('rscn/getfile')}}/'+msg.id+'" class="btn btn-success btn-xs" ><i class="fa fa-download fa-fw"></i> Download Full Text</a>');
    else $('#download').html('-');

  });
}
</script>
<div class="search-page search-content-1">
                        <div class="search-bar ">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="input-group">

                                      <form action="{{route('simple_search')}}" method="post" class="col-md-12" >
                                        <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                        <div class="input-group">
                                                        <div class="input-icon">
                                                            <input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}" >
                                                            <input id="newpassword" class="form-control" type="text" name="keyword" placeholder="keyword"> </div>
                                                        <span class="input-group-btn">
                                                            <button id="genpassword" class="btn btn-success" type="submit">
                                                                <i class="fa fa-search fa-fw"></i> Search</button>
                                                        </span>
                                                    </div>
                                      </form>
                                    </div>
                                </div>
                                <div class="col-md-2" >
                                  <div style="padding-right: 15px;">
                                  <button  class="btn btn-warning" onclick="$('#advance_search_bar').slideToggle()">
                                      <i class="fa fa-search-plus fa-fw"></i>Advance Search</button>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                    <p class="search-desc clearfix"> Global Search; Search from all information of the articles such as title, abstract, keywords or other readable text information </p>
                                </div>

                            </div>
                        </div>
                        <div id="advance_search_bar" style="background-color: white;padding: 10px;margin-bottom: 10px;display:none;">
                            <div class="row">
                                <form action="{{route('advance_search')}}" method="post" class="col-md-12" >
                                <div class="col-md-5 adv-search">
                                    <div class="input-group">
                                        <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                        <div class="input-group">

                                                            <input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}" >
                                                            <input id="" class="form-control" type="text" name="title" placeholder="Title">
                                                            <input id="" class="form-control" type="text" name="fulltext" placeholder="Fulltext/Abstract">
                                                            <input id="" class="form-control" type="text" name="publication" placeholder="Publication Name">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-5 adv-search" >
                                  <div class="input-group">
                                      <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                      <div class="input-group">

                                                          <input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}" >
                                                          <input id="" class="form-control" type="text" name="keywords" placeholder="Keywords">
                                                          <input id="" class="form-control" type="text" name="year" placeholder="Published Year">
                                                          <input id="" class="form-control" type="text" name="authors" placeholder="Authors">


                                      </div>

                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <button  class="btn btn-success"><i class="fa fa-search-plus fa-fw"></i> Search</button>

                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search-container ">
                                  @if(count($researchs)<=0)
                                  <div class="alert  alert-danger" role="alert" style="margin-top: 10px;">No search result found!</div>
                                  @endif
                                    <ul>
                                      @foreach ($researchs as $research)
                                        <li class="search-item clearfix">
                                            <div class="search-content">
                                                <h2 class="search-title">
                                                    <a href="{{route('research_detail',['researchid'=>$research->id])}}" >{{$research->getShortTitle()}}</a>
                                                </h2>
                                                <p class="search-desc">
                                                  <strong> Author(s): </strong>{{$research->authors}}
                                                <strong> Published on </strong>{{$research->publication_name}} @if($research->issue) <strong>Issue </strong>{{$research->issue}}@endif
                                                @if($research->page) <strong>Page </strong>{{$research->page}}@endif
                                                @if($research->keywords) <strong>Keywords </strong>{{$research->keywords}}@endif
                                              </p>
                                                  <p class="search-desc">
                                                  @if($research->article_file)  <a href="{{route('base')}}/uploads/{{$research->id}}/{{$research->article_file}}" class='btn btn-xs btn-info'><span class="glyphicon glyphicon-download" aria-hidden="true"></span> Article Download</a>
                                                  @endif
                                                    @if($research->full_text_file)
                                                  <a href="{{ route('get_research',['researchid'=>$research->id])}}" class='btn btn-xs btn-danger'><span class="glyphicon glyphicon-download" aria-hidden="true"></span> Full Text Download</a></p>
                                                  @endif
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    {!! $researchs->links() !!}

                                </div>
                            </div>

                        </div>
                    </div>
@endsection
