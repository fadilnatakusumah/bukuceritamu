{{-- @extends('layouts.app') @section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>
        
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              
              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                required="required" autofocus="autofocus"> @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
              
              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                required="required"> @if ($errors->has('password'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            
            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>
            
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>
                
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
              </div>
            </div>
          </form>
        </div>a
      </div>
    </div>
  </div>
</div>
@endsection --}} @extends('layouts.app') @section('content')

<div class="container pt-5 pb-5">
  <div class="row">
    <div class="col-lg-4 offset-lg-4">
      {{-- @if(Lang::has('auth.failed'))  --}}
      @if(Session::has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong>
        {{ Session::get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Masuk /
            <i>Login</i>
          </h5>
          <hr>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Alamat Email</label>
              <input required name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan email">
              @if ($errors->has('email'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif  
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input required name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              @if ($errors->has('password'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif  
            </div>
            <button type="submit" class="btn btn-primary">Masuk</button>
            <div class="form-group" align="center">
              <p>
                <h6>Belum terdaftar?
                  <a style="text-decoration:none;" href="{{ route('register') }}">Daftar sekarang</a>
                </h6>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



@stop