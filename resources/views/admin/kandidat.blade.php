@include('../tools/navbar')

<link rel="stylesheet" type="text/css" href="trix.css">

<main id="dashboard" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2 mt-5">Tambah Kandidat
      </h1>

    </div>
    <div class=" kontainer p-4" >

        <form id="form" action="osis" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Calon Ketua</label>
                <input name="nama" value="" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama">
              </div>
            <div class="mb-3  w-25">
              <label for="exampleFormControlInput1" class="form-label">Kelas</label>
              <div class="d-flex">
                <input name="kelas" value="" type="text" class="me-2 form-control" id="exampleFormControlInput1" placeholder="Kelas">
                <input name="jurusan" value="" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jurusan">
              </div>
            </div>
              <div class="mb-3 d-flex flex-column">
                <label for="formFileSm" class="form-label">Organisasi</label>
                <div class="mpk-osis-btn btn-group me-2 " style="width: 10%">
                  <button onclick="osis()" type="button" id="btn-osis" class="  btn btn-sm btn-primary disabled" >OSIS</button>
                  <button onclick="mpk()" type="button" id="btn-mpk" class=" btn btn-sm ">MPK</button>
                </div>
              </div>
              <div class="mb-3">
                <label for="formFileSm" class="form-label">Foto</label>
                <input name="foto" class="form-control form-control-sm" id="formFileSm" type="file">
              </div>
              <div class="mb-3">
                <label for="formFileSm" class="form-label">Visi & Misi</label>
                <input  class="mt-2" id="visi" type="hidden" name="visi" >
              <trix-editor input="visi" name="visi"></trix-editor>
              </div>

            <div class="d-flex">
                <a class="ms-auto btn btn-danger" href="/" role="button">Batal</a>
                <button type="submit"  class="ms-4 btn btn-info btn-sm" style="color: white">Simpan</button>
            </div>
        </form>
    </div>
</main>

<script type="text/javascript" src="trix.js"></script>

<script>
  let form = document.getElementById('form');
  let btnOsis = document.getElementById('btn-osis');
  let btnMpk = document.getElementById('btn-mpk');

  function osis(){
    form.action = "osis";

    // Ubah Style Btn
    btnOsis.classList.add('disabled');
    btnOsis.classList.add('btn-primary');
    btnOsis.classList.remove('btn-outline-secondary');
    btnMpk.classList.remove('disabled');
    btnMpk.classList.remove('btn-primary');
    btnMpk.classList.add('btn-outline-secondary');
  }

  function mpk(){
    form.action = "mpk";

    btnMpk.classList.add('disabled');
    btnMpk.classList.add('btn-primary');
    btnMpk.classList.remove('btn-outline-secondary');
    btnOsis.classList.remove('disabled');
    btnOsis.classList.remove('btn-primary');
    btnOsis.classList.add('btn-outline-secondary');
  }

</script>



