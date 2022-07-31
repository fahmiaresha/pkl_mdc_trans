@extends('layouts.app')

@section('head')
    <!-- Slick -->
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick-theme.css') }}" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{ url('vendors/datepicker/daterangepicker.css') }}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
@endsection

@section('content')

<div class="page-header">
        <div class="page-title">
            <h3>Tambah Data Pegawai</h3>
        </div>
    </div>

        <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
     
        <form action="/penggunastore" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                        <label for="nama" class="col-form-label">Nama :</label>
                                        </div>
                                        <div class="col-lg-3">
                                        <label for="username" class="col-form-label">Username :</label>
                                        </div>
                                        <div class="col-lg-3">
                                        <label for="email" class="col-form-label">Email :</label>
                                        </div>
                                        <div class="col-lg-3">
                                        <label for="telephone" class="col-form-label">Telephone :</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3"><input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama"></div>
                                        <div class="col-lg-3"><input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username"></div>
                                        <div class="col-lg-3"><input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email"></div>
                                        <div class="col-lg-3"><input type="telephone" class="form-control" id="telephone" name="telephone" placeholder="Masukkan Telephone"></div>
                                    
                                    </div>
                                    </div>
                                    <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <label for="email" class="col-form-label">Email :</label>
                                        </div>
                                        <div class="col-lg-6">
                                        <label for="telephone" class="col-form-label">Telephone :</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6"><input type="email" class="form-control" id="email" name="email"></div>
                                        <div class="col-lg-6"><input type="telephone" class="form-control" id="telephone" name="telephone"></div>
                                    
                                    </div>
                                    </div> -->
                                    <div class="form-group">
                                    <div class="row">
                                        
                                        <div class="col-lg-4">
                                        <label for="password" class="col-form-label">Password :</label>
                                        </div>
                                        <div class="col-lg-4">
                                        <label for="password" class="col-form-label">Confirm Password :</label>
                                        </div>
                                        <div class="col-lg-4">
                                        <label for="JOB_STATUS" class="col-form-label">Job Status :</label>
                                        </div>
                                        <!-- <div class="col-lg-3">
                                        <label for="alamat" class="col-form-label">Pertanyaan Pemulihan Kata Sandi :</label>
                                        </div>
                                        <div class="col-lg-3">
                                        <label for="password" class="col-form-label">Jawaban :</label>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-lg-4"><input type="password" class="form-control" id="password1" name="password" placeholder="Masukkan Password"></div>
                                        <div class="col-lg-4"><input type="password" class="form-control" id="copas1" name="copas" onkeyup="cekPass()" placeholder="Confirm Password">
                                        <p id="error" style="color:red"></p></div>
                                        <div class="col-lg-4">
                                            <select name="JOB_STATUS" class="form-control" id="JOB_STATUS">
                                                <option selected="selected">--Pilih Job Status--</option>
                                                <option>Admin</option>
                                                <!-- <option>Kasir</option> -->
                                            </select> 
                                        </div>
                                        <!-- <div class="col-lg-3"><input type="text" class="form-control" id="pertanyaan1" name="pertanyaan" placeholder="Masukkan Pertanyaan Pemulihan Lupa Password"></div>
                                        <div class="col-lg-3"><input type="password" class="form-control" id="jawaban1" name="jawaban" placeholder="Masukkan Jawaban Pemulihan Lupa Password"></div> -->
                                    
                                    </div>
                                    </div>
                                    <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <label for="alamat" class="col-form-label">Pertanyaan Pemulihan Kata Sandi :</label>
                                        </div>
                                        <div class="col-lg-6">
                                        <label for="password" class="col-form-label">Jawaban :</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6"><textarea type="text" class="form-control" id="pertanyaan1" name="pertanyaan"></textarea></div>
                                        <div class="col-lg-6"><input type="password" class="form-control" id="jawaban1" name="jawaban"></div>
                                    
                                    </div>
                                    </div> -->
                                    <div class="form-group">
                                    <div class="row">
                                    <div class="col-lg-4">
                                        <label for="alamat" class="col-form-label">Alamat :</label>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                        <label>Pilih Foto :</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-4"><textarea type="alamat" class="form-control" id="alamat1" name="alamat" placeholder="Masukkan Alamat Lengkap"></textarea></div>
                                        
                                        <div class="col-lg-4"><input type="file" name="file" class="form-control"></div>
                                    </div>
                                    </div>
                                    <div><label>&nbsp;</label></div>
                                    <div class="page-title">
                                        <h3>Kata Sandi Pemulihan</h3>
                                    </div>
                                    </br>
                                    <p>Untuk membantu kami memverifikasi identitas jika Anda lupa kata sandi, buat pertanyaan pemulihan kata sandi.</p>
                                    <p>Jangan pilih pertanyaan yang jawabannya mudah diketahui, misalnya yang tercantum pada profil jaringan sosial anda.</p>
                                    </br>
                                    <div class="form-group">
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <label for="alamat" class="col-form-label">Pertanyaan Pemulihan Kata Sandi :</label>
                                        </div>
                                        <div class="col-lg-6">
                                        <label for="password" class="col-form-label">Jawaban :</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <select name="pertanyaan" class="form-control" id="pertanyaan">
                                                <option selected="selected">--Pilih Pertanyaan--</option>
                                                <option>Apa makanan favorite Anda?</option>
                                                <option>Apa binatang favorite Anda?</option>
                                            </select> 
                                        </div>
                                        <div class="col-lg-6"><textarea type="password" class="form-control" id="jawaban1" name="jawaban" placeholder="Masukkan Jawaban Pemulihan Lupa Password"></textarea></div>
                                    </div>
                                    </div>
                                    <div><label>&nbsp;</label></div>

                                    <button type="submit" class="btn btn-primary" id="add">Add</button>
                                
                        </form>




                    </div>
                        </div>

                        </div>
                    </div>
@endsection

@section('script')
                    <script>
                function cekPass()
                {
                var pass = document.getElementById('password1').value;
                var copass = document.getElementById('copas1').value;
                var text = document.getElementById('error');
                if(pass != copass)
                {
                text.style.color = 'red';
                text.innerHTML='Password tidak cocok';
                }
                else
                {
                text.style.color = 'green';
                text.innerHTML='Password Cocok';
                }

                }
                </script>

@endsection