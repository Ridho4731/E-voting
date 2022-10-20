@if(auth()->user()->kelas == "admin")
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light  sidebar collapse">
  <div class="position-sticky mt-2 pt-3 sidebar-sticky">
    <ul class="nav flex-column fs-5 Menu">
      @if(session()->has('resetSuccess'))
      <div class="alert alert-success  mx-auto alert-dismissable fade show">
          {{session('resetSuccess')}}
      </div>
      @endif
      <li class="nav-item mt-4  ">
        <a a-ke="1" hover="unknown" class="nav-link link"  aria-current="page" href="/admin#dashboard">
          <i class="fa-brands fa-windows"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a a-ke="2" hover="unknown" class="nav-link link" href="/admin#kandidat">
          <i class="bi bi-person-square"></i>
          Kandidat
        </a>
      </li>
      <li class="nav-item">
        <a a-ke="3" hover="unknown" class="nav-link link" href="/admin#pemilih">
          <i class="bi bi-people-fill"></i>       
          Pemilih
        </a>
      </li>
      <li class="nav-item">
        <a a-ke="4" hover="unknown" class="nav-link link" href="/voteOsis">
          <i class="fa-solid fa-chart-pie"></i>         
          Votes Osis
        </a>
      </li>
      <li class="nav-item">
        <a a-ke="4" hover="unknown" class="nav-link link" href="/voteMpk">
          <i class="fa-solid fa-chart-pie"></i>         
          Votes Mpk
        </a>
      </li>
    </ul>
  </div>
    

</nav>
@else
@endif