@extends('layouts.app')

@section('content')
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
                                <div class="col-md-5">
                                    <p class="search-desc clearfix"> Global Search; Search from all information of the articles such as title, abstract, keywords or other readable text information </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="search-container ">
                                  @if(count($researchs)<=0)
                                  <div class="alert  alert-danger" role="alert" style="margin-top: 10px;">No search result found!</div>
                                  @endif
                                    <ul>
                                      @foreach ($researchs as $research)
                                        <li class="search-item clearfix">
                                          <a href="javascriptt:;">
                                              <img src="{{ asset('pages/img/page_general_search/01.jpg') }}">
                                          </a>
                                            <div class="search-content">
                                                <h2 class="search-title">
                                                    <a href="javascript:;">{{$research->getShortTitle()}}</a>
                                                </h2>
                                                <p class="search-desc"> {{$research->getShortAbstract()}}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    {!! $researchs->links() !!}

                                </div>
                            </div>
                            <div class="col-md-5">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-edit font-dark"></i>
                                            <span class="caption-subject font-dark bold uppercase">Aricle Preview</span>
                                        </div>

                                    </div>
                                    <div id="preview" class="portlet-body">
                                      Click an article to the left to view more details.
                                    </div>
                                </div>
                                <!-- END PORTLET-->
                            </div>
                        </div>
                    </div>
@endsection
