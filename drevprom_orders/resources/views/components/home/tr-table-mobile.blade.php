@props(['detail'])
<tr class=" odd:bg-gray-900  even:bg-gray-800 border-b border-gray-700 text-[13px]">
    <td scope="row" class="px-2 py-2">
        <div class="flex">
            <a wire:navigate href="{{route('detail.show', [
        'detail' => $detail])}}" class="text-yellow-500 border-b border-b-yellow-500">{{ $detail->title }} </a>
            @if (Str::length($detail->info) > 2) <span
                class="flex justify-center items-center w-3 h-3 ml-2 bg-red-500 text-white text-[8px] rounded-full">1</span>@endif
        </div>
    </td>
    <td class="px-2 py-2">
        {{ $detail->order }}
    </td>
    <td class="px-2 py-2">
        <div class="text-emerald-500">{{$detail->status}}</div>
        <div>{{$detail->place}}</div>
    </td>
    <td class="px-2 py-2">
        <div class="flex">
            <div class="text-cyan-500">{{$detail->color}}</div>
        </div>
        @auth
        <div class="flex">
            <a wire:navigate href="{{route('detail.edit', [
            'detail'=> $detail])}}">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.4592 6.78426C17.8057 6.43776 17.9964 5.97759 17.9964 5.48809C17.9964 4.99859 17.8057 4.53843 17.4592 4.19193L16.0054 2.73809C15.6589 2.39159 15.1987 2.20093 14.7092 2.20093C14.2197 2.20093 13.7596 2.39159 13.414 2.73718L3.66797 12.4529V16.5H7.71322L17.4592 6.78426ZM14.7092 4.03426L16.164 5.48718L14.7065 6.93918L13.2526 5.48626L14.7092 4.03426ZM5.5013 14.6667V13.2138L11.9546 6.78059L13.4085 8.23443L6.95605 14.6667H5.5013ZM3.66797 18.3333H18.3346V20.1667H3.66797V18.3333Z"
                        fill="#10B981" />
                </svg></a>
            <form class="ml-3" method="post" action="{{route('detail.destroy', ['detail' => $detail])}}">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Удалить деталь?')"><svg
                        xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                        style="fill: rgb(247, 50, 50);transform: ;msFilter:;">
                        <path
                            d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                        </path>
                        <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                    </svg></button>
            </form>
        </div>@endauth
    </td>
</tr>
