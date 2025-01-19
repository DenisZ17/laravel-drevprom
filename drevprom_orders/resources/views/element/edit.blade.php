<x-app-layout title="Обновить деталь">
    <div class="w-full mt-5">
        <x-validation-errors />

        <form class="w-72 mx-auto mb-5" action="{{route('element.update', [
        'element' => $element
        ])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Название
                    детали</label>
                <input type="text" name="title" value="{{$element->title}}" id="default-input" placeholder="Например: Кн 21"
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-normal  text-slate-200" for="file_input">Загрузить фото</label>
                <input
                    class="block w-full text-sm  border  rounded-lg cursor-pointer  text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400"
                    id="file_input" name="image" type="file" >
            </div>
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Описание
                </label>
                <textarea type="text" name="description"  id="default-input" placeholder="Введите текст"
                    class=" border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">{{$element->description}}</textarea>
            </div>
            <div class="mb-5">
                <label for="default-input" class="block mb-2 text-sm font-normal  text-slate-200">Доп. информация
                </label>
                <textarea type="text" name="info" id="default-input" value="{{$element->info}}" placeholder="Введите текст"
                    class=" border   text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-slate-300 focus:ring-emerald-500 focus:border-emerald-500">{{$element->info}}</textarea>
            </div>
            <button type="submit"
                class="text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-emerald-500 hover:bg-emerald-600 duration-200 focus:ring-emerald-700">Обновить
                деталь</button>

        </form>
    </div>
</x-app-layout>
