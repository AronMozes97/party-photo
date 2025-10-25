<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($photos as $photo)
        <img src="{{ $photo->image_path }}" class="rounded-xl shadow-md" alt="Generated image">
    @endforeach
</div>
