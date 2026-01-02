@props([])

@php
    $menu = config('admin_menu.categories', []);
@endphp

<div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Admin
    </a>

    <div class="dropdown-menu dropdown-menu-dark p-2" style="min-width: 20rem;">
        @foreach($menu as $key => $category)
            @php
                $visibleItems = [];
                foreach ($category['items'] as $item) {
                    $allowed = true;

                    if (isset($item['can'])) {
                        [$ability, $modelOrClass] = $item['can'];
                        $allowed = auth()->check() && auth()->user()->can($ability, $modelOrClass);
                    } elseif (isset($item['ability'])) {
                        $allowed = auth()->check() && auth()->user()->can($item['ability']);
                    }

                    if ($allowed) {
                        $visibleItems[] = $item;
                    }
                }
            @endphp

            @if(count($visibleItems))
                <h6 class="dropdown-header text-uppercase small opacity-75 mt-1">{{ $category['label'] }}</h6>

                @foreach($visibleItems as $item)
                    <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route($item['route']) }}">
                        <span class="d-inline-flex align-items-center justify-content-center rounded" style="width: 2rem; height: 2rem; background: rgba(255,255,255,.08);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"/>
                            </svg>
                        </span>
                        <span class="fw-semibold">{{ $item['label'] }}</span>
                    </a>
                @endforeach

                @if(! $loop->last)
                    <div class="dropdown-divider"></div>
                @endif
            @endif
        @endforeach
    </div>
</div>
