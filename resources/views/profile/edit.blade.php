@extends('dashboard')

@section('content')
<div class="py-1">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                        @include('profile.partials.update-password-form')

                    </div>
                </div>
            </div>
        </div>

       {{--  <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div> --}}

 {{--        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

@endsection
