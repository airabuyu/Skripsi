@extends('layouts.menu')
@section('content')
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <label>REGISTER</label>
                    <hr>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="user_name" placeholder="Masukkan Nama Lengkap">
                    </div>

                    <div class="form-group">
                        <label>Alamat Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan Alamat Email">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                    </div>

                    <button id="btn-register" class="btn btn-register btn-block btn-success" type="submit" >REGISTER</button>


                </div>
            </div>

            <div class="text-center" style="margin-top: 15px">
                Sudah punya akun? <a href="/login">Silahkan Login</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready
    (
        function()
        {
            $("#btn-register").click
            ( 
                function() 
                {
                    var user_name = $("#user_name").val();
                    var email    = $("#email").val();
                    var password = $("#password").val();
                    var token = $("meta[name='csrf-token']").attr("content");

                    if (user_name.length == "") {

                        Swal.fire({
                            type: 'warning',
                            title: 'warning',
                            text: 'user_name Wajib Diisi !'
                        });

                    } else if(email.length == "") {

                        Swal.fire({
                            type: 'warning',
                            title: 'warning',
                            text: 'email Wajib Diisi !'
                        });

                    } else if(password.length == "") {

                        Swal.fire({
                            type: 'warning',
                            title: 'warning',
                            text: 'Password Wajib Diisi !'
                        });

                    } else {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        //ajax
                        $.ajax({

                            url: "{{ route('register.store') }}",
                            type: "POST",
                            data: {
                                "user_name": user_name,
                                "email": email,
                                "password": password,
                                "_token": token
                            },
                            
                            success:function(response){

                                if (response.success) {

                                    Swal.fire({
                                        type: 'success',
                                        title: 'Register Berhasil!',
                                        text: 'silahkan login!'
                                    });

                                    $("#user_name").val('');
                                    $("#email").val('');
                                    $("#password").val('');

                                } else {

                                    Swal.fire({
                                        type: 'error',
                                        title: 'Register Gagal!',
                                        text: 'silahkan coba lagi!'
                                    });

                                }

                                console.log(response);

                            },

                            error:function(response){
                                Swal.fire({
                                    type: 'error',
                                    title: 'warning!',
                                    text: 'server error!'
                                });
                            }

                        })

                    }  
                }
            );
        }
    );
</script>
@endsection
