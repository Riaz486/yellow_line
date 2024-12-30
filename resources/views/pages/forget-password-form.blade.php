@extends('layouts.frontend.main-layout')

@section('content')
<section class="banner-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Forget Password</h1>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
            </div>
        </div>
    </div>
</section>

<section class="pad-80">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{url('/page/rent-storage')}}" class="flex m-b-20">Not a customer yet? Rent Storage</a>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input id="email" type="email" class="form-control bg-gray rounded-half  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="btn-row align-items-center justify-between">
                                <button type="submit" class="btn btn-info btn-rounded row-inline m-r-10">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
            </div>
        </div>
    </div>
</section>
@endsection