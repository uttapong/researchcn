<div class="row">
<div class='col-lg-6 col-md-6 col-xs-6'>
  <h4>{{trans('translate.docs_user')}}</h4>
@if(count($docs_user)>0)
    @foreach($docs_user as $doc)

        <li class="file_list" id="download_{{$doc->id}}">
            <div class="list-item-content">
                <div style="float:left; width: 80%;font-size: 1.1rem;">
                    <a href="{{route('base')}}/{{$doc->file_path}}">
                        <i class="fa fa-file"></i> {{ $doc->filename() }}
                    </a>
                    <p class='date'><i class="fa fa-clock-o"></i> {{ $doc->created_at }}</p>
                </div>
                @if((Auth::user()&&Auth::user()->is('admin')))
                <div style="float:right">
                    <!-- <button class="btn green-sharp btn-large" data-toggle="confirmation" data-original-title="Are you sure ?" title="" aria-describedby="confirmation706230">Default configuration</button> -->
                    <button  class='confirm btn-xs btn-danger' type="button" onclick="confirmDelete({{$doc->id}})" class='btn btn-danger'>
                        <i class="icon-close"></i>
                    </button>
                </div>
                @endif
                <div class="clearfix"></div>
            </div>
            <div class='error'></div>
        </li>

    @endforeach
@else
{{trans('translate.no_docs_user')}}
@endif
</div>

<div class='col-lg-6 col-md-6 col-xs-6'>
  <h4>{{trans('translate.docs_admin')}}</h4>
@if(count($docs_admin)>0)
    @foreach($docs_admin as $doc)

    <li class="file_list" id="doc_{{$doc->id}}">
        <div class="list-item-content">
            <div style="float:left; width: 80%;font-size: 1.1rem;">
                <a href="{{route('base')}}/{{$doc->file_path}}">
                    <i class="fa fa-file"></i> {{ $doc->filename() }}
                </a>
                <p class='date'><i class="fa fa-clock-o"></i> {{ $doc->created_at }}</p>
            </div>
            @if((Auth::user()&&Auth::user()->is('admin')))
            <div style="float:right">
                <!-- <button class="btn green-sharp btn-large" data-toggle="confirmation" data-original-title="Are you sure ?" title="" aria-describedby="confirmation706230">Default configuration</button> -->
                <button  class='confirm btn-xs btn-danger' type="button" onclick="confirmDelete({{$doc->id}})" class='btn btn-danger'>
                    <i class="icon-close"></i>
                </button>
            </div>
            @endif
            <div class="clearfix"></div>
        </div>
        <div class='error'></div>
    </li>

    @endforeach
@else
{{trans('translate.no_docs_admin')}}
@endif
</div>
</div>
