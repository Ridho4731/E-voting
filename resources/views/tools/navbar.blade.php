<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<!-- Icons -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.2.0/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
<!-- CSS  -->
<link rel="stylesheet" href="{{ asset('dashboard.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('app.css') }}">
<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">



<link href="bootstrap.min.css" rel="stylesheet">

<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
</style>


<!-- Custom styles for this template -->
<link href="{{ asset('dashboard.css') }}" rel="stylesheet">
</head>
<body>
  <form action="logout" style="display: none" method="post">
    @csrf  
    <button type="submit" id="logout" class="btn btn-outline-secondary border-0 text-white fw-bold"></button>
      </form>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" style="position: fixed;width:100%">
    
    <a class="navbar-brand col-md-3 col-lg-2  fs-6" href="/admin"><img src="{{ asset('foto/app/bpm.png') }}" class="mx-2" alt="" width="30px">Bina Putra Mandiri</a>
    {{-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> --}}
    <div class="navbar-nav">
      <div class="nav-item text-nowrap"> 
           
        <button type="submit" onclick="document.getElementById('logout').click()" class="btn btn-outline-secondary border-0 text-white fw-bold"><i class="bi bi-box-arrow-left fs-4">  </i>Logout</button>
        
      </div>
    </div>
  </header>
     





<script>
const scrollHandler = () => {

let menu = document.querySelector('.Menu')

let A = document.getElementById('dashboard')
let B = document.getElementById('kandidat')
let C = document.getElementById('pemilih')
let D = document.getElementById('suara')

let pos_menu = window.pageYOffset + menu.offsetHeight

let pos_A = A.offsetTop + A.offsetHeight
let pos_B = B.offsetTop + B.offsetHeight
let pos_C = C.offsetTop + C.offsetHeight
let pos_D = D.offsetTop + D.offsetHeight

let distance_A = pos_A - pos_menu
let distance_B = pos_B - pos_menu
let distance_C = pos_C - pos_menu
let distance_D = pos_D - pos_menu

let min = Math.min(...[distance_A, distance_B, distance_C, distance_D].filter(num => num > 0))

document.querySelectorAll('.Menu .nav-item')[0].classList.remove('Highlight')
document.querySelectorAll('.Menu .nav-item')[1].classList.remove('Highlight')
document.querySelectorAll('.Menu .nav-item')[2].classList.remove('Highlight')
document.querySelectorAll('.Menu .nav-item')[3].classList.remove('Highlight')

if(min === distance_A) document.querySelectorAll('.Menu .nav-item')[0].classList.add('Highlight')
if(min === distance_B) document.querySelectorAll('.Menu .nav-item')[1].classList.add('Highlight')
if(min === distance_C) document.querySelectorAll('.Menu .nav-item')[2].classList.add('Highlight')
if(min === distance_D) document.querySelectorAll('.Menu .nav-item')[3].classList.add('Highlight')

}
window.addEventListener('scroll', scrollHandler)


  
</script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>