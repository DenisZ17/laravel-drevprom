<x-app-layout title="Изменить дату отгрузки">

<div class="w-full flex justify-center">

    <x-validation-errors />

    <form action="{{route('shipment.update', ['shipment'=> $shipment])}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Дата отгрузки</label>
            <input type="date" name="shipment_date" value="{{
             $shipment->shipment_date }}" id="default-input" class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-emerald-500 focus:border-emerald-500">
        </div>
        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Комментарий (необязательно)</label>
            <input type="text" name="info" value="{{$shipment->info }}" id="default-input" class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-emerald-500 focus:border-emerald-500">
        </div>
        <div class="flex items-center mb-6">
            <input type="checkbox" id="shipment_checkbox" name="active" {{ $shipment->active==1?'checked':'' }} class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500 dark:focus:ring-emerald-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="shipment_checkbox" class="ms-2 text-sm font-medium text-gray-300">Отгрузка активна</label>
        </div>

        <button type="submit" class="text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-emerald-500 hover:bg-emerald-600 duration-200 focus:ring-emerald-700">Обновить данные</button>
    </form>

</div>

</x-app-layout>
