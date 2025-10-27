@props([])

@php
    $menu = config('admin_menu.categories', []);
@endphp

<div class="relative">
    <button popovertarget="desktop-menu-product"
            class="flex items-center gap-x-1 text-xl/6 font-semibold text-white">
        Admin
        <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-5 flex-none text-gray-500">
            <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd"/>
        </svg>
    </button>

    <el-popover id="desktop-menu-product" anchor="bottom" popover
                class="w-screen max-w-md overflow-hidden rounded-3xl bg-gray outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(3)] backdrop:bg-transparent open:block data-closed:translate-y-1 data-closed:opacity-0 data-enter:duration-200 data-enter:ease-out data-leave:duration-150 data-leave:ease-in">

        <div class="p-4 space-y-3 max-h-96 overflow-auto">
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
                    <div class="text-xs uppercase tracking-wide text-gray-400 mt-2">{{ $category['label'] }}</div>

                    @foreach($visibleItems as $item)
                        <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-white/5">
                            <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-700/50 group-hover:bg-gray-700">
                                <!-- Egységes ikon (cserélhető item['icon'] alapján) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-400 group-hover:text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"/>
                                </svg>
                            </div>
                            <div class="flex-auto">
                                <a href="{{ route($item['route']) }}" class="block font-semibold text-white">
                                    {{ $item['label'] }}
                                    <span class="absolute inset-0"></span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </el-popover>
</div>
