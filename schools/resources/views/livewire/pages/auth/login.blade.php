<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectRoute('settings.edit');

        // $this->redirectIntended(default: RouteServiceProvider::home(), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <form class="mb-3" wire:submit="login">

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" class="form-label" />
            <x-text-input wire:model="form.email" id="email" class="form-control" type="email" name="email" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />

        </div>

        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="auth-forgot-password-cover.html">
                    <small>Forgot Password?</small>
                </a>
            </div>
            <div class="input-group input-group-merge">
                <x-input-label for="password" class="form-control" :value="__('Password')" />
                <x-text-input wire:model="form.password" id="password" class="form-control" type="password"
                    name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('form.password', ['locale' => getCurrentLocale()])" class="mt-2" />
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" wire:model="form.remember" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>

    </form>


</div>
