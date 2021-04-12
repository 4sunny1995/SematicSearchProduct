<div class="dropdown m-0 p-0">
    @switch(app()->getLocale())
        @case("vn")
            <button class="btn btn-block dropdown-toggle m-0 p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('img/VN.webp')}}" alt="VN" class="icon" width="25px">
            </button>
        @break
        @case("en")
            <button class="btn btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('img/USA.png')}}" alt="EN" width="25px">
            </button>
            @break
         {{--  @case("kr")
         <button class="btn btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{asset('img/korea.png')}}" alt="KR" width="25px">
        </button>
        @break
         @case("cn")
         <button class="btn btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{asset('img/china.jpg')}}" alt="CN" width="25px">
        @break     --}}
         
        @default
        <button class="btn btn-block dropdown-toggle m-0 p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{asset('img/china.jpg')}}" alt="VN" class="icon" width="25px">
        </button>
            
    @endswitch
    
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item language" href="{{ url('home/vn') }}">
        <img src="{{asset('img/VN.webp')}}" alt="VN" class="icon" width="25px"><span style="margin-left: 10px">{{trans('header.VN')}}</span>
    </a>
      <a class="dropdown-item language" href="{{ url('home/en') }}">
        <img src="{{asset('img/USA.png')}}" alt="EN" width="25px"><span style="margin-left: 10px">{{trans('header.EN')}}</span>
    </a>
      {{--  <a class="dropdown-item language" href="{{ url('home/kr') }}">
        <img src="{{asset('img/korea.png')}}" alt="KR" width="25px"><span style="margin-left: 10px">{{trans('header.KR')}}</span>
      </a>
      <a class="dropdown-item language" href="{{ url('home/cn') }}">
        <img src="{{asset('img/china.jpg')}}" alt="CN" width="25px"><span style="margin-left: 10px">{{trans('header.CN')}}</span>
      </a>  --}}
    </div>
  </div>