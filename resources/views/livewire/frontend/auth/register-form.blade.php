<div>
    <main class="main pages">
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account? <a href="{{route('login')}}">Login</a></p>
                                        </div>
                                        <form wire:submit="register">
                                            <div class="form-group">
                                                <input type="text" wire:model="name" placeholder="name" />
                                                @error('name')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <input type="text" wire:model="surname" placeholder="surname" />
                                                @error('surname')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <input type="text" wire:model="email" placeholder="Email" />
                                                @error('email')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" wire:model="password" placeholder="Password" />
                                                @error('password')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" wire:model="password_confirmation" placeholder="Confirm password" />
                                            </div>
                                            <div class="form-group">
                                                <input type="number" wire:model="year_of_birth" placeholder="Year of Birthday" />
                                                @error('year_of_birth')
                                                <span class="text-sm text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                    </div>
                                                </div>
                                                <a href="#"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                            </div>
                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-register mt-115">
                                    <a href="{{url('auth/google')}}" class="social-login facebook-login">
                                        <img src="assets-front/imgs/theme/icons/logo-facebook.svg" alt="" />
                                        <span>Continue with Facebook</span>
                                    </a>
                                    <a href="{{url('auth/google')}}" class="social-login google-login">
                                        <img src="assets-front/imgs/theme/icons/logo-google.svg" alt="" />
                                        <span>Continue with Google</span>
                                    </a>
                                    <a href="{{url('auth/google')}}" class="social-login apple-login">
                                        <img src="assets-front/imgs/theme/icons/logo-apple.svg" alt="" />
                                        <span>Continue with Apple</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
