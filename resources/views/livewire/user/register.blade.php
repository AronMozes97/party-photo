<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 fw-semibold mb-4">Regisztráció</h1>

                    <form wire:submit="register" class="vstack gap-3">
                        {{-- Név --}}
                        <div>
                            <label for="name" class="form-label">Név</label>
                            <input
                                id="name"
                                type="text"
                                wire:model.defer="name"
                                autocomplete="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Kiss Péter"
                            />
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- E-mail --}}
                        <div>
                            <label for="email" class="form-label">E-mail</label>
                            <input
                                id="email"
                                type="email"
                                wire:model.defer="email"
                                autocomplete="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="peter@example.com"
                            />
                            @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jelszó --}}
                        <div x-data="{ show: false }">
                            <label for="password" class="form-label">Jelszó</label>

                            <div class="position-relative">
                                <input
                                    id="password"
                                    :type="show ? 'text' : 'password'"
                                    wire:model.defer="password"
                                    autocomplete="new-password"
                                    class="form-control pe-5 @error('password') is-invalid @enderror"
                                    placeholder="••••••••"
                                />

                                <button
                                    type="button"
                                    @click="show = !show"
                                    class="btn btn-link position-absolute top-50 end-0 translate-middle-y me-2 p-0 text-secondary"
                                    style="text-decoration: none;"
                                    tabindex="-1"
                                >
                                    {{-- show --}}
                                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>

                                    {{-- hide --}}
                                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.188-3.368m3.34-2.216A9.993 9.993 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.993 9.993 0 01-4.207 5.303M3 3l18 18"/>
                                    </svg>
                                </button>
                            </div>

                            @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jelszó megerősítés --}}
                        <div x-data="{ show: false }">
                            <label for="password_confirmation" class="form-label">Jelszó megerősítés</label>

                            <div class="position-relative">
                                <input
                                    id="password_confirmation"
                                    :type="show ? 'text' : 'password'"
                                    wire:model.defer="password_confirmation"
                                    autocomplete="new-password"
                                    class="form-control pe-5"
                                    placeholder="••••••••"
                                />

                                <button
                                    type="button"
                                    @click="show = !show"
                                    class="btn btn-link position-absolute top-50 end-0 translate-middle-y me-2 p-0 text-secondary"
                                    style="text-decoration: none;"
                                    tabindex="-1"
                                >
                                    {{-- show --}}
                                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>

                                    {{-- hide --}}
                                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.188-3.368m3.34-2.216A9.993 9.993 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.993 9.993 0 01-4.207 5.303M3 3l18 18"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Submit gomb --}}
                        <div class="pt-2">
                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                                wire:loading.attr="disabled"
                            >
                                <span wire:loading.remove>Készíts fiókot</span>
                                <span wire:loading>Feldolgozás…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
