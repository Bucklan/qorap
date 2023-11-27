
<div>
    @if(session('error'))
        {{session('error')}}
    @endif
    <section class="content-main mt-80 mb-80">
        <div class="card mx-auto card-login">
            <div class="card-body">
                <h4 class="card-title mb-4">Sign in</h4>
                <form wire:submit="login">
                    <div class="mb-3">
                        <input class="form-control" wire:model="email" placeholder="Username or email" type="text" />
                        @error('email')
                        <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- form-group// -->

                    <div class="mb-3">
                        <input class="form-control" wire:model="password" placeholder="Password" type="password" />
                    </div>
                    @error('password')
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                    <!-- form-group// -->
                    <div class="mb-3">
                        <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" checked="" />
                            <span class="form-check-label">Remember</span>
                        </label>
                    </div>
                    <!-- form-group form-check .// -->
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                    <!-- form-group// -->
                </form>
            </div>
        </div>
    </section>
</div>