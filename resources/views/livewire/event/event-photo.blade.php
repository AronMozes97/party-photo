{{-- resources/views/livewire/event-photo.blade.php --}}
<div class="space-y-4">
    <div class="flex gap-4 flex-wrap">
        <div class="w-72">
            <video id="cam" autoplay playsinline class="w-72 h-72 bg-black rounded-xl object-cover"></video>
        </div>

        <canvas id="snap" width="512" height="512" class="hidden"></canvas>

        <div class="flex flex-col gap-2">
            <button type="button" id="startCam" class="px-4 py-2 rounded-lg border">Kamera indítása</button>
            <button type="button" id="takePhoto" class="px-4 py-2 rounded-lg border">Fotó készítése</button>
            <button type="button" id="retake" class="px-4 py-2 rounded-lg border">Újrafotózás</button>

            {{-- fallback: hagyományos fájlfeltöltés --}}
            <input type="file" accept="image/*" capture="user"
                   wire:model="photo"
                   class="border rounded p-2 mt-2" />
            @error('photo') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="flex items-center gap-2">
        <input type="text" wire:model.live="theme" class="border rounded p-2 w-96"
               placeholder="Téma pl. 'halloween party, konfetti, disco lights'">
        <button wire:click="saveAndGenerate" class="px-4 py-2 rounded-lg bg-black text-white" wire:loading.attr="disabled">
            Generálás
        </button>
        @if($busy) <span>Generálás folyamatban…</span> @endif
    </div>

    @if($generatedUrl)
        <div class="mt-4">
            <img src="{{ $generatedUrl }}" alt="Generált kép" class="rounded-xl max-w-full">
        </div>
    @endif
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        // Keresd meg azt az elemet, ami a komponensed DOM-jában van (pl. a külső wrapper)
        // Ha nincs saját azonosítód, jó egy belső gomb/video is – a lényeg, hogy fel tudj mászni a [wire:id]-ig.
        const anyChild = document.getElementById('startCam') || document.getElementById('cam');
        const root = anyChild.closest('[wire\\:id]'); // legközelebbi Livewire gyökér
        if (!root) {
            console.error('Nem találok Livewire gyökeret ([wire:id]).');
            return;
        }

        // A komponenspéldány kinyerése és a $wire proxy
        const componentId = root.getAttribute('wire:id');
        const component = window.Livewire.find(componentId);
        const $wire = component.$wire;

        console.log('$wire OK:', $wire);

        // --- innen jön a te kódod ---
        const video = document.getElementById('cam');
        const canvas = document.getElementById('snap');
        const ctx = canvas.getContext('2d');
        let stream = null;

        async function startCamera() {
            stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'user' }, audio: false });
            video.srcObject = stream;
        }

        function takePhoto() {
            const size = Math.min(video.videoWidth, video.videoHeight);
            const sx = (video.videoWidth - size) / 2;
            const sy = (video.videoHeight - size) / 2;
            ctx.drawImage(video, sx, sy, size, size, 0, 0, canvas.width, canvas.height);

            const root = document.getElementById('startCam').closest('[wire\\:id]');
            const component = Livewire.find(root.getAttribute('wire:id'));

            canvas.toBlob((blob) => {
                if (!blob) return;
                const file = new File([blob], 'selfie.jpg', { type: 'image/jpeg' });

                // Livewire JS upload API – a komponenspéldányon
                component.upload(
                    'photo',                 // wire:model tulajdonság neve
                    file,                    // a feltöltendő File
                    (uploadedFilename) => {  // success callback
                        console.log('Feltöltve:', uploadedFilename);
                        // itt már a Livewire oldali 'photo' property beállt
                    },
                    (error) => {             // error callback
                        console.error('Upload hiba:', error);
                    },
                    (event) => {             // progress (opcionális)
                        if (event && event.lengthComputable) {
                            const pct = Math.round((event.loaded / event.total) * 100);
                            console.log('Feltöltés...', pct + '%');
                        }
                    }
                );
            }, 'image/jpeg', 0.92);

        }

        function retake() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        document.getElementById('startCam').addEventListener('click', startCamera);
        document.getElementById('takePhoto').addEventListener('click', takePhoto);
        document.getElementById('retake').addEventListener('click', retake);
    });
</script>

