<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 fw-semibold mb-4">Új esemény létrehozása</h1>

                    <form wire:submit.prevent="createEvent" class="vstack gap-3">
                        {{-- Esemény neve --}}
                        <div>
                            <label for="name" class="form-label">Esemény neve</label>
                            <input
                                id="name"
                                type="text"
                                wire:model.defer="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Pl. Farsangi buli"
                            />
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Esemény tulajdonosa --}}
                        <div>
                            <label for="owner_user_id" class="form-label">Esemény tulajdonosa</label>
                            <select
                                id="owner_user_id"
                                wire:model="owner_user_id"
                                class="form-select @error('owner_user_id') is-invalid @enderror"
                            >
                                <option value="">Válassz felhasználót...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('owner_user_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kezdési időpont --}}
                        <div>
                            <label for="start_at" class="form-label">Kezdési időpont</label>
                            <input
                                id="start_at"
                                type="datetime-local"
                                wire:model="start_at"
                                class="form-control @error('start_at') is-invalid @enderror"
                            />
                            @error('start_at')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Mentés gomb --}}
                        <div class="pt-2">
                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                                wire:loading.attr="disabled"
                            >
                                <span wire:loading.remove>Létrehozás</span>
                                <span wire:loading>Mentés folyamatban…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
