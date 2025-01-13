@props(['item'])
<tr class=" odd:dark:bg-gray-900  even:bg-gray-800 border-b border-gray-700">
    <th scope="row"
        class="px-3 {{$item->active ? '' : 'line-through'}} py-2 font-normal whitespace-nowrap text-slate-400 max-sm:text-sm max-sm:font-normal">
        {{Carbon\Carbon::parse($item->shipment_date)->format('d.m.Y')}}
    </th>
    <td class="px-3 py-2 {{$item->active ? '' : 'line-through'}}">
        {{$item->info}}
    </td>
    <td class="px-6 py-4 max-sm:hidden">
        <input type="checkbox" {{ $item->active==1?'checked':'' }} class="w-4 h-4
        text-emerald-500
        bg-gray-100 border-gray-300 rounded focus:ring-emerald-500 dark:focus:ring-emerald-600
        dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

    </td>
    <td class=" px-6 py-4 max-sm:py-2 max-sm:px-3">
        <div class="flex">
            <a wire:navigate href="{{route('shipment.edit', [
            'shipment'=> $item])}}" class="px-2 max-sm:mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: #10b981;transform: ;msFilter:;">
                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                    </path>
                    <path
                        d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                    </path>
                </svg>
            </a>
            <form method="post" action="{{route('shipment.destroy', ['shipment' => $item])}}">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Удалить дату отгрузки?')"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgb(175, 73, 73);transform: ;msFilter:;">
                        <path
                            d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                        </path>
                        <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                    </svg></button>
            </form>


        </div>

    </td>
</tr>
