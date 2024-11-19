<section class="container my-5" style="width: 800px">
    <header class="mb-4">
        <h2 class="h4 text-dark">
            {{ __('Update Password') }}
        </h2>
        <p class="text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input type="password" id="update_password_current_password" name="current_password" 
                   class="form-control" autocomplete="current-password">
            @error('updatePassword.current_password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input type="password" id="update_password_password" name="password" 
                   class="form-control" autocomplete="new-password">
            @error('updatePassword.password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation" 
                   class="form-control" autocomplete="new-password">
            @error('updatePassword.password_confirmation')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Save Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-success small mb-0"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
