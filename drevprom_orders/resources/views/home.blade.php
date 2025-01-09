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
                    class="px-5 py-3 max-w-64 flex justify-center items-center mx-auto mt-5 mb-5 box_shadow rounded-[20px] border border-slate-700">
                    <span>
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
                                <th scope="col"
                                    class="px-6 py-3  max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Статус
                                </th>
                                <th scope="col" class="px-6 py-3 max-lg:px-2 max-lg:py-2 max-lg:font-normal">
                                    Место
                                </th>
                                <th scope="col"
                                    class="px-6 py-3  max-lg:px-2 max-lg:py-2 max-lg:font-normal">
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
                            <tr class=" odd:bg-gray-900  even:bg-gray-800 border-b border-gray-700 max-lg:text-[13px]">
                                <th scope="row"
                                    class="px-6 py-4 max-lg:px-2 max-lg:py-2 font-medium  whitespace-nowrap text-yellow-500">
                                    {{ $detail->title }}
                                </th>
                                <td class="px-6 py-4 max-lg:px-2 max-lg:py-2">
                                    {{$detail->order}}
                                </td>
                                <td class="px-6 py-4 max-lg:px-2 max-lg:py-2">
                                    {{$detail->size}}
                                </td>
                                <td class="px-6 py-4 max-lg:px-2 max-lg:py-2">
                                    {{$detail->quantity}}
                                </td>
                                <td class="px-6 py-4 max-lg:px-2 max-lg:py-2 text-emerald-500">
                                    {{$detail->status}}
                                </td>
                                <td class="px-6 py-4 max-lg:px-2 max-lg:py-2">
                                    {{$detail->place}}
                                </td>
                                <td class="px-6 py-4 max-lg:px-2 max-lg:py-2 text-cyan-500">
                                    {{$detail->color}}
                                </td>
                                @auth<td class="px-3 py-2  max-lg:px-2 max-lg:py-2">
                                    <div class="flex">
                                        <a wire:navigate href="{{route('detail.edit', [
                                        'detail'=> $detail])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" style="fill: #10b981;transform: ;msFilter:;">
                                                <path
                                                    d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                                </path>
                                                <path
                                                    d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                                </path>
                                            </svg></a>
                                        <form class="ml-3" method="post"
                                            action="{{route('detail.destroy', ['detail' => $detail])}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Удалить деталь?')"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgb(175, 73, 73);transform: ;msFilter:;">
                                                    <path
                                                        d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                    </path>
                                                    <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                </svg></button>
                                        </form>
                                    </div>

                                </td>
                                @endauth
                            </tr>
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
                            <tr class=" odd:bg-gray-900  even:bg-gray-800 border-b border-gray-700 text-[13px]">
                                <td scope="row"
                                    class="px-2 py-2">
                                    <div class="text-yellow-500">{{ $detail->title }}</div>
                                    <div>{{ $detail->size }}</div>

                                </td>
                                <td class="px-2 py-2">
                                    <div>{{ $detail->order }}</div>
                                    @auth

                                    <div class="flex">
                                        <a wire:navigate href="{{route('detail.edit', [
                                        'detail'=> $detail])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                viewBox="0 0 22 22" style="fill: #10b981;transform: ;msFilter:;">
                                                <path
                                                    d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                                </path>
                                                <path
                                                    d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                                </path>
                                            </svg></a>
                                        <form class="ml-3" method="post"
                                            action="{{route('detail.destroy', ['detail' => $detail])}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Удалить деталь?')"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                    viewBox="0 0 22 22"
                                                    style="fill: rgb(175, 73, 73);transform: ;msFilter:;">
                                                    <path
                                                        d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                    </path>
                                                    <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                </svg></button>
                                        </form>
                                    </div>@endauth
                                </td>
                                <td class="px-2 py-2">
                                    <div class="text-emerald-500">{{$detail->status}}</div>
                                    <div>{{$detail->place}}</div>
                                </td>

                                <td class="px-2 py-2">
                                    <div class="text-cyan-500">{{$detail->color}}</div>
                                    <div>{{$detail->quantity}} шт.</div>

                                </td>


                                {{-- @auth<td class="px-3 py-2  max-lg:px-2 max-lg:py-2">
                                    <div class="flex">
                                        <a wire:navigate href="{{route('detail.edit', [
                                        'detail'=> $detail])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" style="fill: #10b981;transform: ;msFilter:;">
                                                <path
                                                    d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                                </path>
                                                <path
                                                    d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                                </path>
                                            </svg></a>
                                        <form class="ml-3" method="post"
                                            action="{{route('detail.destroy', ['detail' => $detail])}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Удалить деталь?')"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgb(175, 73, 73);transform: ;msFilter:;">
                                                    <path
                                                        d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                    </path>
                                                    <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                </svg></button>
                                        </form>
                                    </div>

                                </td>
                                @endauth --}}
                            </tr>
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
