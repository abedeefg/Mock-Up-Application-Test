<ul class="metismenu" id="side-menu">

    <li class="menu-title">Navigation</li>
   

   
   
  
    <li>
        <a href="{{route('biodata')}}">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Biodata</span>
          
        </a>
    </li>
    <li>
        <a href="{{route('pendidikan')}}">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Pendidikan</span>
          
        </a>
    </li>
    <li>
        <a href="{{route('pelatihan')}}">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Pelatihan</span>
          
        </a>
    </li>
    <li>
        <a href="{{route('pekerjaan')}}">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Pekerjaan</span>
          
        </a>
    </li>
   
    @if (auth('admin')->user()->level=="Admin")
    <li>
        <a href="{{route('admin')}}">
            <i class="mdi mdi-account-circle"></i>
            <span> Administrator</span>
            
        </a>
        {{-- <ul class="nav-second-level" aria-expanded="false">
      
            <li>
                <a href="{{route('admin')}}">
                    <span> User </span>
                </a>
            </li>
        </ul> --}}
    </li>
        
    @endif
   

    {{-- <li class="menu-title mt-2">Components</li>

  --}}
</ul>