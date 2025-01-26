@auth
<x-app-layout>
    <div class="w-full">
        <x-validation-errors />

        <form class="w-56 mx-auto" action="{{route('detail.update', [
        'detail' => $detail
        ])}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Название
                    детали</label>
                <input type="text" name="title" value="{{$detail->title}}" id="default-input" placeholder="Например: Кн 21"
                    class=" border  text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <input name="shipment_id" type="hidden" value="{{$detail->shipment_id}}"/>
            <input name="quantity" type="hidden" value="{{$detail->quantity}}"/>
            <input name="size" type="hidden" value="{{$detail->size}}"/>
            <input name="color" type="hidden" value="{{$detail->color}}"/>

            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Количество</label>
                <input type="text" value="{{$detail->quantity}}" name="quantity" id="default-input" placeholder=""
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Размер</label>
                <input type="text" value="{{$detail->size}}" name="size" id="default-input" placeholder="Например 2400х13"
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Название
                    заказа</label>
                <input type="text" value="{{$detail->order}}" name="order" id="default-input" placeholder="Например: Рус 521"
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>

            <div class="mb-5">
                <label for="status" class="block mb-2 text-sm font-normal  text-slate-200">Статус</label>
                <select id="status" value="" name="status"
                    class=" border   text-sm rounded-lg   block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
                    <option class="text-slate-300" value="{{$detail->status}}">{{$detail->status}}</option>
                    <option class="text-slate-300" value="Под изол.">Под изолянт</option>
                    <option class="text-slate-300" value="Под грунт">Под грунт</option>
                    <option class="text-slate-300" value="Под 1 сл.">Под 1-й слой</option>
                    <option class="text-slate-300" value="Под 2 сл.">Под 2-й слой</option>
                    <option class="text-slate-300" value="Перекрас">Перекрас</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="orders" class="block mb-2 text-sm font-normal  text-slate-200">Место/готовность</label>
                <select id="orders" name="place"
                    class=" border   text-sm rounded-lg   block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
                    <option class="text-slate-300" value="{{$detail->place}}">{{$detail->place}}</option>
                    <option class="text-slate-300" value="Уч. готов">Уч. готов</option>
                    <option class="text-slate-300" value="Уч. негот.">Уч. негот.</option>
                    <option class="text-slate-300" value="Малярка">Малярка</option>

                </select>
            </div>

            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Коммент(необязательно)
                </label>
                <input type="text" value="{{$detail->info}}" name="info" id="default-input" placeholder="Например: Изолянт с 2-х стор."
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="flex items-center mb-6">
                <input type="checkbox" id="detail_checkbox" name="active" {{ $detail->active==1?'checked':'' }} class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500 dark:focus:ring-emerald-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="detail_checkbox" class="ms-2 text-sm font-medium text-gray-300">Отгрузка активна</label>
            </div>

            <button type="submit"
                class="text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-emerald-500 hover:bg-emerald-600 duration-200 focus:ring-emerald-700">Обновить
                деталь</button>

        </form>
    </div>
</x-app-layout>
@endauth
