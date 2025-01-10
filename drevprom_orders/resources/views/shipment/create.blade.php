<x-app-layout title="Добавить дату отгрузки">

<div class="w-full">
    <x-validation-errors />

    <form class="w-52 mx-auto" action="{{route('shipment.store')}}" method="POST">
        @csrf
        @method('post')

        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Дата отгрузки</label>
            <input type="date" name="shipment_date" id="default-input" class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-emerald-500 focus:border-emerald-500">
        </div>
        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Комментарий (необязательно)</label>
            <input type="text" name="info" id="default-input" class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-emerald-500 focus:border-emerald-500">
        </div>


        <button type="submit" class="text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-emerald-500 hover:bg-emerald-600 duration-200 focus:ring-emerald-700">Создать</button>

    </form>

</div>


</x-app-layout>

