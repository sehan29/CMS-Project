<section class="mb-5 ml-2 pl-2">
    <header>
        <h4 class="fs-4 fw-semibold text-dark">
            {{ __('Update Password') }}
        </h4>
        {{-- <p class="text-muted small">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p> --}}
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input type="password" id="update_password_current_password" name="current_password" class="form-control" autocomplete="current-password">
            @error('updatePassword.current_password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input type="password" id="update_password_password" name="password" class="form-control" autocomplete="new-password">
            @error('updatePassword.password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password">
            @error('updatePassword.password_confirmation')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i>
                {{ __('Change Password') }}</button>

            @if (session('status') === 'password-updated')
                <p class="text-muted small" id="passwordUpdated">{{ __('Saved.') }}</p>
                <script>
                    setTimeout(() => document.getElementById('passwordUpdated').style.display = 'none', 2000);
                </script>
            @endif
        </div>
    </form>
</section>
