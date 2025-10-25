{{-- resources/views/errors/403.blade.php --}}
<x-layouts.app>
    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="text-center space-y-6">
            <h1 class="text-5xl font-bold text-gray-800">403</h1>
            <h2 class="text-2xl font-semibold">Hozzáférés megtagadva</h2>
            <p class="text-gray-600">Nincs jogosultságod az oldal megtekintéséhez.</p>

            <div class="flex justify-center gap-3 mt-6">
                <a href="{{ url()->previous() }}"
                   class="px-4 py-2 rounded-lg border border-gray-400 hover:bg-gray-100">
                    Vissza
                </a>
                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 rounded-lg bg-black text-white hover:bg-gray-800">
                    Főoldal
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
