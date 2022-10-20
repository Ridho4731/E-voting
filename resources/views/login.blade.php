<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Voting</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fjalla+One|Libre+Baskerville">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <section class="home home-head" style="background-image: url('gmbr/bae.jpeg')">

        <img src="gmbr/logoBPM.jpeg" class=" t  rounded-circle" width="100" alt="">
        <img src="gmbr/logoOsis.jpeg" class="tt rounded-circle" width="100" alt="">
        <img src="gmbr/logoMPK.jpeg" class="ttt  rounded-circle" width="103" alt="">
        <img src="gmbr/smkbisa.png" class ="y" width="140" alt="">

        <body class="login">
            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissable fade show">
                {{session('loginError')}}
            </div>
            @endif
            <div class="row main-row justify-content-center pb-5">
                <div class="col-md-5">
                    <main class="form-login form-login pb-3">
                        <img src="gmbr/logo3.png" alt="" class="daun">
                        <img src="gmbr/maps.svg" alt="" class="map">
                        <h1 class="oo text-center mt-3 ">Login</h1>
                        <form method="POST" action="/login" class="d-flex flex-column" method="">
                            @csrf
                            <div class="">
                                <Label for="floating-email">NIPD atau EMAIL </Label>
                                <input type="text" name="nipd"
                                    class="form-control @error('nipd') is-invalid @enderror" id="floating-email"
                                    value="{{ old('email') }}">
                                <div class="invalid-feedback">
                                    NIPD Salah
                                </div>
                                <br>
                                <div class="">
                                    <Label for="floating-pass">Password</Label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="floating-pass">
                                    <div class="invalid-feedback">
                                        Password Minimal 8 Karakter
                                    </div>
                                </div>
                                <br>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">LOGIN</button>
                        </form>
                       
                    </main>
                </div>
            </div>
        </body>
    </section>
</body>

</html>
