@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Activate Account</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('account.post_activate') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="activatecode" class="col-md-4 col-form-label text-md-right">{{ __('Activation Code') }}</label>

                            <div class="col-md-6">
                                <input id="activatecode" type="text" class="form-control{{ $errors->has('activatecode') ? ' is-invalid' : '' }}" name="activatecode"  required autofocus>

                                @if ($errors->has('activatecode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('activatecode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Activate Account') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
