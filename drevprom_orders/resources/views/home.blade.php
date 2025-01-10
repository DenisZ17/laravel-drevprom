<x-app-layout title="Главная">
    <div class="w-full">

        @if (session()->has('success'))
        <x-home.toast-delete-shipment />
        @endif
        @if (session()->has('successed'))
        <x-home.toast-edit-shipment />
        @endif
        @if (session()->has('detail_created'))
        <x-home.toast-detail-create />
        @endif
        @if (session()->has('detail_update'))
        <x-home.toast-detail-update />
        @endif
        @if (session()->has('detail_delete'))
        <x-home.toast-detail-delete />
        @endif
        <div class="mx-auto">
            {{-- <div class="flex justify-center my-5">

            </div> --}}
            @foreach ($shipments as $item)
            <div class="text-white mb-12">
                <div
                    class="px-4 py-2 max-w-64 flex justify-center items-center mx-auto mt-5 mb-5 box_shadow bg-slate-900 rounded-[20px] border border-slate-700">
                    <span class="max-sm:text-sm">
                        Отгрузка {{Carbon\Carbon::parse($item->shipment_date)->format('d.m.Y')}}
                    </span>
                    @auth


                    <button wire:navigate onclick="location.href='{{route('detail.create')}}'" type="button"
                        data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default"
                        aria-expanded="false"
                        class="flex items-center justify-center ml-4 text-white bg-emerald-500 rounded-full w-8 h-8   hover:bg-emerald-700 focus:ring-4  focus:outline-none focus:ring-emerald-800">
                        <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                        <span class="sr-only">Open actions menu</span>
                    </button>@endauth
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


                    <table class="w-full text-sm text-left rtl:text-right text-gray-400 max-sm:hidden">
                        <thead class="text-sm font-medium  bg-gray-700 text-gray-400 max-lg:font-normal">
                            <tr>
                                <th scope="col" class="px-6 py-3 max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Название
                                </th>
                                <th scope="col" class="px-6 py-3 max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Заказ
                                </th>
                                <th scope="col" class="px-6 py-3 max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Размер
                                </th>
                                <th scope="col" class="px-6 py-3 max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Кол-во
                                </th>
                                <th scope="col" class="px-6 py-3  max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Статус
                                </th>
                                <th scope="col" class="px-6 py-3 max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Место
                                </th>
                                <th scope="col" class="px-6 py-3  max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Цвет
                                </th>
                                @auth
                                <th scope="col" class="px-6 py-3  max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Редак. </th>
                                @endauth

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                            @if ($item->id == $detail->shipment_id)
                            <x-home.tr-table-desktop :detail="$detail" />
                            @endif
                            @endforeach
                        </tbody>
                    </table>


                    <table class="w-full text-sm text-left rtl:text-right text-gray-400 sm:hidden">
                        <thead class="text-[13px] bg-gray-700 text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-2 font-normal">
                                    Наимен.
                                </th>
                                <th scope="col" class="px-2 py-2 font-normal">
                                    Заказ
                                </th>
                                <th scope="col" class="px-2 py-2 font-normal">
                                    Статус
                                </th>
                                <th scope="col" class="px-2 py-2 font-normal">
                                    Цвет
                                </th>

                                {{-- @auth
                                <th scope="col" class="px-6 py-3  max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Редак. </th>
                                @endauth --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                            @if ($item->id == $detail->shipment_id)
                            <x-home.tr-table-mobile :detail="$detail" />
                            @endif
                            @endforeach
                        </tbody>
                    </table>


                </div>






            </div>

            @endforeach
            </ul>

        </div>



    </div>





</x-app-layout>
{{-- <script>
    var acc = document.getElementsByClassName("accordion__header");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script> --}}
