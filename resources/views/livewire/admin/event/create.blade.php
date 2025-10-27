<div class="mx-auto max-w-lg py-10">
    <h1 class="text-2xl font-semibold mb-6">Új esemény létrehozása</h1>

    <form wire:submit.prevent="createEvent" class="space-y-6">
        {{-- Esemény neve --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                Esemény neve
            </label>
            <input
                id="name"
                type="text"
                wire:model.defer="name"
                class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                placeholder="Pl. Farsangi buli"
            />
            @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="owner_user_id" class="block text-sm font-medium text-gray-700">
                Esemény tulajdonosa
            </label>
            <select
                id="owner_user_id"
                wire:model="owner_user_id"
                class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
                <option value="">Válassz felhasználót...</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @error('owner_user_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Kezdési időpont --}}
        <div>
            <label for="start_at" class="block text-sm font-medium text-gray-700">
                Kezdési időpont
            </label>
            <input
                id="start_at"
                type="datetime-local"
                wire:model="start_at"
                class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            />
            @error('start_at')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Mentés gomb --}}
        <div class="pt-4">
            <button
                type="submit"
                class="w-full inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-white font-medium hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none disabled:opacity-60"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Létrehozás</span>
                <span wire:loading>Mentés folyamatban…</span>
            </button>
        </div>
    </form>
</div>
