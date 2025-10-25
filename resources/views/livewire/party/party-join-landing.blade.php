<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-xl">
    <h1 class="text-2xl font-bold mb-4 text-center">Csatlakozás a partyhoz 🎉</h1>

    <p class="text-gray-600 text-center mb-6">
        Party neve: <strong>{{ $party->name ?? 'Ismeretlen party' }}</strong>
    </p>
    {{-- Sikeres mentés üzenet --}}
    @if (session('success'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form @if(session('party_member_id')) wire:submit.prevent="startParty" @else wire:submit.prevent="joinParty" @endif class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Neved</label>
            <input type="text"
                   wire:model.defer="name"
                   id="name"
                   class="w-full border-gray-300 rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-400"
                   placeholder="Add meg a neved">
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        @if(session('party_member_id'))
            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg transition">
                Belépés
            </button>
        @else
            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg transition">
                Csatlakozás
            </button>
        @endif

    </form>

    {{-- Debug info, ha fejlesztéshez jól jön --}}
    <div class="mt-6 text-sm text-gray-500">
        <p><strong>Party ID:</strong> {{ $party->id }}</p>
        <p><strong>Member ID:</strong> {{ $member->id }}</p>
        <p><strong>Token:</strong> {{ $party->join_token }}</p>
    </div>
</div>
