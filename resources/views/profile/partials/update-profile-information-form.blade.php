<section class="mb-4 container">
    <header>
        <h4 class="fs-4 fw-semibold text-dark mb-4">
            {{ __('Profile Information') }}
        </h4>
    </header>

    <!-- Bootstrap Grid System -->
    <div class="row align-items-center">
        <!-- Right Side: Profile Image Upload (Appears on Top in Small Screens) -->
        <div class="col-12 col-md-4 text-center order-1 order-md-2">
            <label for="profileImage" class="d-block mb-3" style="cursor: pointer;">
                <img id="previewImage"
                    src="{{ Auth::user() && Auth::user()->image ? url('storage/public/profile_images/' . Auth::user()->image) : asset('images/default-profile.png') }}"
                    alt="Profile Image"
                    class="img-fluid rounded-circle border border-2 border-secondary shadow"
                    style="width: 200px; height: 200px;">
            </label>

            <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="profile_image" id="profileImage" accept="image/*" class="d-none">
                <button type="submit" class="btn btn-primary mt-2">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;Upload
                </button>
            </form>
        </div>

        <!-- Left Side: Profile Information (Appears Below in Small Screens) -->
        <div class="col-12 col-md-8 order-2 order-md-1">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-2">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Full Name') }}</label>
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

                <div class="mb-3">
                    <label for="country" class="form-label">{{ __('Born Country') }}</label>
                    <input type="text" id="country" name="country" class="form-control"
                        value="Sri Lanka" required disabled>
                </div>

                <div class="mb-3">
                    <label for="passport" class="form-label">{{ __('Passport Number') }}</label>
                    <input type="text" id="passport" name="passport" class="form-control"
                        value="12345678" required disabled>
                </div>

                @if(Auth::user()->section != null)

                <div class="mb-3">
                    <label for="passport" class="form-label">{{ __('Assigned Division') }}</label>
                    <input type="text" id="passport" name="passport" class="form-control"
                        value="{{ Auth::user()->section }}" required disabled>
                </div>                
                @endif
            </form>
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
</section>
