@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.verify_email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.verification_link_sent') }}
                        </div>
                    @endif

                    {{ __('auth.check_email_verification') }}
                    {{ __('auth.no_email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('auth.resend_email') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection