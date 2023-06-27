@extends('layouts.auth')

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h2>
                        Memulai untuk jual beli <br />
                        dengan cara terbaru
                    </h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label> Full Name </label>
                            <input id="name"
                                v-model="name"
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autocomplete="name" 
                                autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Email Address </label>
                            <input id="email" 
                                v-model="email"
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input id="password" 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Konformasi Password</label>
                            <input id="password-confirm" 
                                type="password" 
                                class="form-control @error('password_confirm') is-invalid @enderror" 
                                name="password_confirm" 
                                required 
                                autocomplete="new-password">
                            @error('password_confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Store </label>
                            <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                            <div
                                class="custom-control custom-radio custom-control-inline"
                                >
                                <input
                                    type="radio"
                                    class="custom-control-input"
                                    name="is_store_open"
                                    id="openStoreTrue"
                                    v-model="is_store_open"
                                    :value="true"
                                />
                                <label for="openStoreTrue" class="custom-control-label">
                                    Iya, boleh
                                </label>
                            </div>
                            <div
                            class="custom-control custom-radio custom-control-inline"
                            >
                            <input
                                type="radio"
                                class="custom-control-input"
                                name="is_store_open"
                                id="openStoreFalse"
                                v-model="is_store_open"
                                :value="false"
                            />
                            <label for="openStoreFalse" class="custom-control-label">
                                Tidak, terima kasih
                            </label>
                            </div>
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label> Nama Toko </label>
                            <input type="text"
                                v-model="store_name"
                                id="store_name"
                                class="form-control @error('store_name') is-invalid @enderror" 
                                name="store_name"
                                required
                                autocomplete
                                autofocus>
                            @error('store_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label>Kategori</label>
                            <select name="category" class="form-control">
                                <option value="" disabled>Select Category</option>
                                
                            </select>
                        </div>
                        <button
                            type="submit"
                            class="btn btn-success btn-block mt-4"
                        >
                            Sign Up Now
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                            Back To Sign In
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
  Vue.use(Toasted);

  var register = new Vue({
    el: "#register",
    mounted() {
      AOS.init();
      {{--  this.$toasted.error(
        "Maaf, Tampaknya email sudah terdaftar pada sistem kami.",
        {
          position: "top-enter",
          className: "rounded",
          duration: 1000,
        }
      );  --}}
    },
    data: {
      name: "Maulana Ikhsan",
      email: "maul@gmail.com",
      password: "",
      is_store_open: true,
      store_name: "",
    },
  });
</script>
@endpush
