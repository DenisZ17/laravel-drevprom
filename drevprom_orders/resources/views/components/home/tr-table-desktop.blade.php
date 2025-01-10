@props(['detail'])
<tr class=" odd:bg-gray-900  even:bg-gray-800 border-b border-gray-700 max-lg:text-[13px]">
    <th scope="row" class="px-6 py-4 max-lg:px-2 max-lg:py-2 font-medium  whitespace-nowrap text-yellow-500">
        <div class="flex"><a wire:navigate href="{{route('detail.show', [
        'detail' => $detail])}}" class="text-yellow-500 border-b border-b-yellow-500">{{ $detail->title }} </a>
            @if (Str::length($detail->info) > 2) <span
                class="flex justify-center items-center w-3 h-3 ml-2 bg-red-500 text-white text-[8px] rounded-full">1</span>@endif
        </div>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: #10b981;transform: ;msFilter:;">
                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                    </path>
                    <path
                        d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                    </path>
                </svg></a>
            <form class="ml-3" method="post" action="{{route('detail.destroy', ['detail' => $detail])}}">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Удалить деталь?')"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgb(230, 37, 37);transform: ;msFilter:;">
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
