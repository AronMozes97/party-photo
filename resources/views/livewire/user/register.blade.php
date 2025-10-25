<div class="mx-auto max-w-md py-10">
    <h1 class="text-2xl font-semibold mb-6">Regisztráció</h1>

    <form wire:submit="register" class="space-y-6">
        {{-- Név --}}
        <div>
            <label for="name" class="block text-sm font-medium">Név</label>
            <input
                id="name"
                type="text"
                wire:model.defer="name"
                autocomplete="name"
                class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="Kiss Péter"
            />
            @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- E-mail --}}
        <div>
            <label for="email" class="block text-sm font-medium">E-mail</label>
            <input
                id="email"
                type="email"
                wire:model.defer="email"
                autocomplete="email"
                class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="peter@example.com"
            />
            @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Jelszó --}}
        <div x-data="{ show: false }" class="relative">
            <label for="password" class="block text-sm font-medium">Jelszó</label>

            <div class="mt-1 relative">
                <input
                    id="password"
                    :type="show ? 'text' : 'password'"
                    wire:model.defer="password"
                    autocomplete="new-password"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="••••••••"
                />

                <button
                    type="button"
                    @click="show = !show"
                    class="absolute inset-y-0 right-0 flex items-center justify-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                    style="height: 100%;"
                    tabindex="-1"
                >
                    {{-- "show" ikon --}}
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>

                    {{-- "hide" ikon --}}
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.188-3.368m3.34-2.216A9.993 9.993 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.993 9.993 0 01-4.207 5.303M3 3l18 18"/>
                    </svg>
                </button>
            </div>

            @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        {{-- Jelszó megerősítés --}}
        <div x-data="{ show: false }" class="relative">
            <label for="password_confirmation" class="block text-sm font-medium">Jelszó megerősítés</label>

            <div class="mt-1 relative">
                <input
                    id="password_confirmation"
                    :type="show ? 'text' : 'password'"
                    wire:model.defer="password_confirmation"
                    autocomplete="new-password"
                    class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="••••••••"
                />

                <button
                    type="button"
                    @click="show = !show"
                    class="absolute inset-y-0 right-0 flex items-center justify-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                    style="height: 100%;"
                    tabindex="-1"
                >
                    {{-- "show" ikon --}}
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>

                    {{-- "hide" ikon --}}
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.188-3.368m3.34-2.216A9.993 9.993 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.993 9.993 0 01-4.207 5.303M3 3l18 18"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Submit gomb --}}
        <div>
            <button
                type="submit"
                class="inline-flex w-full items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-white font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 disabled:opacity-60"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Készíts fiókot</span>
                <span wire:loading>Feldolgozás…</span>
            </button>
        </div>
    </form>
</div>
