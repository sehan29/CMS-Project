<x-guest-layout>

    <div class="mt-2 content">
        <div class="row d-flex align-items-center">
            <!-- Left Side - Image -->
            <div class="col-md-6 border-end border-1 border-secondary">
                <div class="mb-4">
                    <p class="sub-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas quo, facere dicta.</p>
                </div>

                <div class="image-components"> 
                    <i class="fa fa-indent icons" aria-hidden="true"></i> <label for=""><b>ipsum dolor sit amet</b> ipsum dolor sit amet
                        consectetur adipisicing elit. Nesciunt consectetur.</label></div>
                <div class="image-components"> 
                    <i class="fa fa-university icons" aria-hidden="true"></i>
                    <label for=""><b>ipsum dolor sit amet consectetur</b>,  adipisicing elit. Nesciunt
                        consectetur.</label>
                </div>

                <div class="image-components"> 
                    <i class="fa fa-line-chart icons" aria-hidden="true"></i>
                    <label for=""><b>Lorem, ipsum dolor</b> sit amet consectetur adipisicing elit. Nesciunt
                        consectetur.</label>
                </div>
            </div>

            <!-- Right Side - Registration Form -->
            <div class="col-md-6 p-4 form_content">
                <h2 class="text-start">User Registration Form</h2>
                <h5 class="mb-4">It's Free and always will be</h5>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter Your Full Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter Your Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Enter Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">Already registered?</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
                            Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>
