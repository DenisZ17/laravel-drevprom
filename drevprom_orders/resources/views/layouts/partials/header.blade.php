
<nav class="header w-full py-4 mb-6 px-4">
    <ul class="main__container flex justify-between items-center">
        <li>
            <x-nav-link :active="request()->routeIs('home')" href="{{route('home')}}">
                Заказы
            </x-nav-link>
        </li>
        <li>
            <x-nav-link href="{{route('knowledge')}}" :active="request()->routeIs('knowledge')">
                База знаний
            </x-nav-link>
        </li><li>
            <x-nav-link href="{{route('dashboard')}}" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-nav-link>
        </li>
    </ul>


    {{--
    <livewire:navigation-menu /> --}}
</nav>
