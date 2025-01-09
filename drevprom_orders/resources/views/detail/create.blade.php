<x-app-layout title="Создать деталь">
    <div class="w-full">
        @if ($errors->any())
        <ul class="flex justify-center mb-3">
            @foreach ($errors->all() as $error)
            <li class="text-red-500 font-normal text-xs">{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <form class="w-56 mx-auto" action="{{route('detail.store')}}" method="POST">
            @csrf
            @method('post')
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Название
                    детали</label>
                <input type="text" name="title" id="default-input" placeholder="Например: Кн 21"
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Размер</label>
                <input type="text" name="size" id="default-input" placeholder="Например: 2.4x80x14"
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Название
                    заказа</label>
                <input type="text" name="order" id="default-input" placeholder="Например: Рус 521"
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="mb-5">
                <label for="orders" class="block mb-2 text-sm font-normal  text-slate-200">Дата отгрузки</label>
                <select name="shipment_id" id="orders"
                    class=" border   text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
                    <option class="text-slate-300" value="">Выберите дату отгрузки</option>
                    @foreach ($shipments as $item)
                    <option class="text-slate-300" value={{$item->id}}>{{$item->shipment_date}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="status" class="block mb-2 text-sm font-normal  text-slate-200">Статус</label>
                <select id="status" name="status"
                    class=" border   text-sm rounded-lg   block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
                    <option class="text-slate-300" value="">Выбрать</option>
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
                    <option class="text-slate-300" value="">Выбрать</option>
                    <option class="text-slate-300" value="Уч. готов">Уч. готов</option>
                    <option class="text-slate-300" value="Уч. негот.">Уч. негот.</option>
                    <option class="text-slate-300" value="Малярка">Малярка</option>

                </select>
            </div>
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Количество
                    </label>
                <input type="text" name="quantity" id="default-input" placeholder="Например: 31.5"
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Цвет
                    </label>
                <input type="text" name="color" id="default-input" placeholder="Например: 9010"
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Коммент(необязательно)
                    </label>
                <input type="text" name="info" id="default-input" placeholder="Например: Изолянт с 2-х стор."
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>

                <button type="submit" class="text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-emerald-500 hover:bg-emerald-600 duration-200 focus:ring-emerald-700">Добавить деталь</button>

        </form>
    </div>
</x-app-layout>
