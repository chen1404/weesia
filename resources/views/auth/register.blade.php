@extends('layouts.pages.auth')

@section('title')
    Register
@endsection

@section('content')
    <div class="page-content page-auth" id="register">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center justify-content-center row-login">
                    <div class="col-lg-4">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <b>Opps!</b> {{ session('error') }}
                            </div>
                        @endif
                        <h2>
                            Memulai untuk jual beli <br />
                            dengan cara terbaru
                        </h2>
                        <form action="/auth/register" method="post" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control " placeholder="masukkan nama" v-model="name" name="name" required />
                            </div>
                            <div class="form-group">
                                <label for="mobile">Nomor Hp</label>
                                <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Nomor Hp" required />
                            </div>

                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control " placeholder="masukkan email" v-model="email" name="email" required />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="masukkan password" name="password" required />
                            </div>
                            <div class="form-group">
                                <label>Confirmation Password</label>
                                <input type="password" class="form-control" placeholder="masukkan password" name="confirm_password" required />
                            </div>

                            <div class="form-group">
                                <label>Member</label>
                                <p class="text-muted">Bergabung sebagai member Weesia</p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="is_member" id="openStoreTrue" v-model="is_store_open" value="member" onclick="onLoad('hide', 'show'),boleh()" />
                                    <label for="openStoreTrue" class="custom-control-label">Iya, boleh</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="is_member" id="openStoreFalse" v-model="is_store_open" value="customer" onclick="onLoad('show', 'hide'),enggak()" />
                                    <label for="openStoreFalse" class="custom-control-label">Enggak, makasih</label>
                                </div>
                                <input hidden type="radio" name="is_member" value="customer" checked/>
                            </div>
                            <div class="form-group hide" v-if="is_store_open" id="tokenDiv">
                                <label>Kode Token</label>
                                <input type="text" class="form-control" placeholder="masukkan kode token" name="token" id="kode-token" />
                            </div>

                            <button type="submit" class="btn btn-success btn-block mt-4">Sign Up Now</button>
                            <a href="/" class="btn btn-signup btn-block mt-4">Back to Sign In</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
