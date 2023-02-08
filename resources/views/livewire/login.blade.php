<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="../../images/logo.svg">
                        </div>
                        @if (Session::has('success') == null && is_null($error))
                            <h4>Hello! let's get started</h4>
                        @endif
                        @if (Session::has('success'))
                            <h4 class="bg-success">Success! {{ Session::get('success') }}</h4>
                        @endif
                        @if ($error)
                            <h4 class="bg-danger">Error! {{ $error }}</h4>
                        @endif
                        <h6 class="font-weight-light">Login to continue.</h6>
                        <form wire:submit.prevent="handleSubmit" class="pt-3">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="username"
                                    wire:model="username" placeholder="Username">
                                @error('username')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" wire:model="password"
                                    id="password" placeholder="Password">
                                @error('password')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    type="submit">LOGIN</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <a href="#" class="auth-link text-black">Forgot password?</a>
                            </div>
                            {{-- <div class="text-center mt-4 font-weight-light"> Don't have an account? --}}
                            {{-- <a href="register.html" class="text-primary">Create</a> --}}
                            {{-- </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
