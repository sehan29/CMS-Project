<section class="mb-4">
    <header>
        <h4 class="fs-4 fw-semibold text-dark">
            {{ __('Profile Information') }}
        </h4>
        {{-- <p class="text-muted small">
            {{ __("Update your account's profile information and email address.") }}
        </p> --}}
    </header>

    <!-- Display Profile Image -->
    {{--     @if (Auth::user() && Auth::user()->image)
        <img src="{{ url('storage/public/profile_images/' . Auth::user()->image) }}" alt="Profile Image" width="150">
    @else
        <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Image" width="150">
    @endif

    <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="profileImage">Upload Profile Image:</label>
        <input type="file" name="profile_image" id="profileImage" accept="image/*">
        <button type="submit">Upload</button>
    </form> --}}

    <!-- Profile Image Section -->
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <!-- Display Profile Image -->
                <label for="profileImage" style="cursor: pointer;">
                    <img id="previewImage"
                        src="{{ Auth::user() && Auth::user()->image ? url('storage/public/profile_images/' . Auth::user()->image) : asset('images/default-profile.png') }}"
                        alt="Profile Image"
                        class="img-fluid rounded-circle border border-2 border-secondary shadow"
                        width="200"
                        height="200">
                </label>
            </div>
        </div>
    
        <!-- Upload Form -->
        <div class="row">
            <div class="col-12 text-center">
                <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="profile_image" id="profileImage" accept="image/*"
                            class="form-control-file d-none">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;Upload</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- JavaScript to Preview Image -->
    <script>
        document.getElementById('profileImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    



    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif


    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-2">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" id="name" name="name" class="form-control"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" disabled>
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" id="email" name="email" class="form-control"
                value="{{ old('email', $user->email) }}" required autocomplete="username" disabled>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="small text-muted">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="btn btn-link p-0 small text-decoration-underline">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small fw-semibold mt-1">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

       {{--  <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p class="text-muted small" id="profileUpdated">{{ __('Saved.') }}</p>
                <script>
                    setTimeout(() => document.getElementById('profileUpdated').style.display = 'none', 2000);
                </script>
            @endif
        </div> --}}
    </form>
</section>
