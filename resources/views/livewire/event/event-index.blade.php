<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-4">🎉 Party Manager</h2>

    <div class="bg-gray-100 p-4 rounded-lg mb-4">
        <p class="mb-2">
            <strong>Party name:</strong> {{ $event->name }}
        </p>
        <p class="mb-2 text-sm text-gray-500">
            Expires at: {{ optional($event->expires_at)->format('Y-m-d H:i') }}
        </p>
    </div>

    <div class="bg-gray-50 p-4 rounded-lg">
        <p class="font-medium mb-1">Join link:</p>
        <a href="{{ $joinUrl }}" target="_blank" class="text-blue-600 underline">
            {{ $joinUrl }}
        </a>
    </div>
</div>
