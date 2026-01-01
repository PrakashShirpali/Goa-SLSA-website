<div class="panel-title">
    <a href="{{ route('dashboard') }}">
        <div class="p-title">
            <i class="bi bi-person-workspace"></i>
            <span>Admin Panel</span>
        </div>
    </a>
    <i class="bi bi-x-lg" data-bs-dismiss="offcanvas" aria-label="Close"></i>
</div>

<div class="accordion accordion-flush" id="accordionFlushExample">
    @foreach ($accordionItems as $accordion)
        <div class="accordion-item">
            @php
                $isActive = collect($accordion['items'])->contains(function ($item) {
                    return request()->routeIs($item['route']);
                })
                    ? 'actived'
                    : '';
            @endphp
            <button class="accordion-button collapsed {{ $isActive }}" type="button" data-bs-toggle="collapse"
                data-bs-target="#{{ $accordion['target'] }}" aria-expanded="false"
                aria-controls="{{ $accordion['target'] }}">
                <i class="bi {{ $accordion['bi'] }}"></i>
                {{ $accordion['title'] }}
            </button>
            <div id="{{ $accordion['target'] }}" class="accordion-collapse collapse">
                <ul>
                    @foreach ($accordion['items'] as $item)
                        <li>
                            <a href="{{ route($item['route']) }}"
                                class="{{ request()->routeIs($item['route']) ? 'active' : '' }}">{{ $item['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach

</div>

<div class="logout">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logbtn btn" type="submit">Logout <i class="bi bi-box-arrow-right"></i></button>
    </form>
</div>
