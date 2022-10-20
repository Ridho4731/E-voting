@include('../tools/navbar')

{{-- Jika User Belum Vote --}}
@if(auth()->user()->osis == 0 || auth()->user()->mpk == 0 )
    
      <main id="kandidat" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5 container-fluid w-100">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2 mx-auto my-0 mt-1">
            @if(auth()->user()->osis == "0")
            Pemilihan Calon Ketua Osis
            @else
            Pemilihan Calon Ketua MPK
            @endif
          </h1>
        </div>
      
        <div id="swiper" class="container-fluid  d-flex   swiper text-center P-5 py-3" style="height:auto">
          @if(auth()->user()->osis == "0")
          <div class=" row d-flex w-100 justify-content-evenly " style="position: inherit"> 
          @foreach($osis as $kandidat)
            <div class="col-3" id="card{{$kandidat->id}}">
              <div class="card" >
                <li class="list-group-item"></li>
 
                <img src="{{ asset('storage/'.$kandidat->foto) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$kandidat->nama}}</h5>
                  <div class="d-flex aksi">
                    <button onclick="visi({{$kandidat->id}})" type="button" class="me-auto btn btn-info btn-sm">Visi & Misi</button>
                    <form action="osis/{{$kandidat->id}}" method="post" style="display: none">
                    @csrf
                    @method('put')  
                    <input type="hidden" name="suara" value="{{$kandidat->suara+1}}">
                    <input type="hidden" name="osis" value="{{$kandidat->id}}">
                    <button type="submit" id="btn{{$kandidat->id}}"></button>
                    </form>
                    <button type="submit" class=" btn btn-success btn-sm" onclick="vote({{$kandidat->id}})"><i class="bi bi-envelope-paper-fill text-white "></i>   Pilih</button>
                  </div>
                </div>
              </div> 
                
            </div>
            <div class="col visually-hidden visi" id="visi{{ $kandidat->id }}">
              {{-- Visi Misi Knadidat --}}
              <div  class="kartu-kandidat ">
                <img class="img-avatar" src="gmbr/logoOsis.jpeg" alt="">
                    <div class="card-text">
                      <div class="portada" style="  background-image: url('{{asset('storage/'.$kandidat->foto)}}')"></div>
                        <div class="title-total">   
                          <div class="title">Osis</div>
                          <h2>{{ $kandidat->nama }}</h2>
                        <div class="desc">{!! $kandidat->visi !!}</div>
                      <div class="actions">
                        <form action="osis/{{$kandidat->id}}" method="post" style="display: none">
                        @csrf
                        @method('put')  
                        <input type="hidden" name="suara" value="{{$kandidat->suara+1}}">
                        <input type="hidden" name="osis" value="{{$kandidat->id}}">
                        <button type="submit" id="btn{{$kandidat->id}}"></button>
                        </form>
                        <button type="submit" class=" btn btn-success btn-sm " style="width:300px" onclick="vote({{$kandidat->id}})"><i class="bi bi-envelope-paper-fill text-white"></i> Pilih</button>
                      </div>
                    </div>
                  </div>
              </div> 
            </div>
           
          @endforeach   
          </div>
          @elseif(auth()->user()->osis != 0 && auth()->user()->mpk == 0 )
          <div class=" row d-flex w-100 justify-content-evenly " style="position: inherit">  
              @foreach($mpk as $kandidat)
              <div class="col-3" id="card{{$kandidat->id}}">
                <div class="card" >
                  <li class="list-group-item"></li>
   
                  <img src="{{ asset('storage/'.$kandidat->foto) }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{$kandidat->nama}}</h5>
                    <div class="d-flex aksi">
                      <button onclick="visi({{$kandidat->id}})" type="button" class="me-auto btn btn-info btn-sm"> Visi & Misi</button>
                      <form action="mpk/{{$kandidat->id}}" method="post" style="display: none">
                      @csrf
                      @method('put')  
                      <input type="hidden" name="suara" value="{{$kandidat->suara+1}}">
                      <input type="hidden" name="mpk" value="{{$kandidat->id}}">
                      <button type="submit" id="btn{{$kandidat->id}}"></button>
                      </form>
                      <button type="submit" class=" btn btn-success btn-sm" onclick="vote({{$kandidat->id}})">  Pilih</button>
                    </div>
                  </div>
                </div> 
                  
              </div>
              <div class="col visually-hidden visi" id="visi{{ $kandidat->id }}">
                {{-- Visi Misi Knadidat --}}
                <div  class="kartu-kandidat ">
                  <img class="img-avatar" src="gmbr/logoMpk.jpeg" alt="">
                      <div class="card-text">
                        <div class="portada" style="  background-image: url('{{asset('storage/'.$kandidat->foto)}}')"></div>
                          <div class="title-total">   
                            <div class="title">Mpk</div>
                            <h2>{{ $kandidat->nama }}</h2>
                          <div class="desc">{!! $kandidat->visi !!}</div>
                        <div class="actions " >
                          <form action="mpk/{{$kandidat->id}}" method="post" style="display: none">
                          @csrf
                          @method('put')  
                          <input type="hidden" name="suara" value="{{$kandidat->suara+1}}">
                          <input type="hidden" name="mpk" value="{{$kandidat->id}}">
                          <button type="submit" id="btn{{$kandidat->id}}"></button>
                          </form>
                          <button type="submit" class=" btn btn-success btn-sm " style="width:300px" onclick="vote({{$kandidat->id}})"><i class="bi bi-envelope-paper-fill text-white"></i> Pilih</button>
                        </div>
                      </div>
                    </div>
                </div> 
              </div>
              @endforeach   
          </div>
          @else
            @endif
        </div>
      </main>

  @else
  @if(session()->has('voteSuccess'))
              <div class="container-fluid vote-success mt-5 pt-4 flex-column">
                <img src="{{asset('foto/app/selesai-vote.png')}}" width="40%" alt="">
                <h1 class="error-title">Voting Berhasil</h1>
                            <p class="fs-5 text-gray-600">{{session('voteSuccess')}}</p>
                            <button type="button" onclick="document.getElementById('logout').click()" class="btn btn-outline-primary"><i class="bi bi-box-arrow-left fs-3"></i>  Logout</button>
              </div>
            @endif
      

@endif


<script>

  function vote(x){
    document.getElementById('btn'+x).click()
  }
  function visi(x){
    let card = document.getElementById('card'+x);
    let info = document.getElementById('visi'+x);
      
      card.classList.add('visually-hidden');
      info.classList.remove('visually-hidden');
  }
</script>