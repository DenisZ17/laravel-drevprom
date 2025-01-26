<x-app-layout title="Dashboard">

  @auth   <div class="w-full mx-auto">
    <a wire:navigate class="text-yellow-500 underline font-medium text-sm" href="{{route('detail.index')}}">Все действующие детали</a>
        @if (session()->has('shipment_added'))
        <x-dashboard.toast-shipment-create/>
        @endif
        @if (session()->has('success'))
        <x-home.toast-delete-shipment />
        @endif
        @if (session()->has('successed'))
        <x-home.toast-edit-shipment />
        @endif
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


            <div class="flex justify-center my-5">
                <button wire:navigate onclick="location.href='{{route('shipment.create')}}'" type="button"
                    data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default"
                    aria-expanded="false"
                    class="flex items-center justify-center text-white bg-emerald-500 rounded-full w-12 h-12 hover:bg-emerald-800 dark:bg-emerald-600 dark:hover:bg-emerald-700 focus:ring-4 focus:ring-emerald-300 focus:outline-none dark:focus:ring-emerald-800">
                    <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                    <span class="sr-only">Open actions menu</span>
                </button>
            </div>

            <livewire:shipment-list />
        </div>
    </div>@endauth
    @guest
    <div class="w-full">
        <h2 class="flex justify-center mt-20 text-white text-lg">Вам доступ на эту <span class="text-emerald-500 ml-2"> страницу ограничен!</span></h2>
    </div>

    @endguest

</x-app-layout>
