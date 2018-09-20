@extends('../layouts.app')

@section('content')

<div class="container-fluid">
<div class="row" style="min-height:500px;">
  <div class="col-lg-12 pt-2" align="center">
    <div class="card pb-3 mt-3 mb-3" style="width: 60%;">
      @if(Session::has('info'))
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Perhatian!</strong>
        {{Session::get('info')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <form method="POST" action="{{ route('user.profile.submit') }}" enctype="multipart/form-data">
        <div>
          <img
          class="profile pt-2 pb-0"
          src="{{ asset('assets/avatars/default.png') }}"
          align="center">
        </div>

        <hr>
        {{ csrf_field()}}
        <div class="form-grop row mb-3">
          <label for="" class="col-md-4 col-form-label text-md-right">
            {{ __('Avatar')}}</label>
            <div class="col-md-4">
              <input type="file" name="avatar" id="">
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">
              <i>{{ __('Username') }}</i>
            </label>

            <div class="col-md-6">
              <input
              placeholder="Masukan username"
              id="name"
              type="text"
              class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
              name="username"
              value="{{ old('username') }}"
              required="required"
              autofocus="autofocus">

              @if ($errors->has('username'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Tinggal') }}</label>

            <div class="col-md-6">
              <input
              placeholder="Masukan Alamat"
              id="address"
              type="text"
              class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
              name="address"
              value="{{ old('address') }}"
              required="required">

              @if ($errors->has('address'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('address') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
</div>

@endsection