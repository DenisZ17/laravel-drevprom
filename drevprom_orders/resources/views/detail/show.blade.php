<x-app-layout title="Карточка детали">
    <div class="w-full mt-4">
        <div class="max-w-sm mx-auto py-6  border  rounded-lg shadow bg-slate-800 border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-emerald-400">{{$detail->title}}</h5>
                <table class="w-full text-sm text-left rtl:text-right text-gray-300 dark:text-gray-400">
                    <tbody>
                        <tr class=" odd:bg-slate-900  even:bg-transparent ">
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-gray-400">
                                Заказ
                            </th>
                            <td class="px-6 py-4">
                                {{$detail->order}}
                            </td>
                        </tr>
                        <tr class=" odd:bg-slate-900  even:bg-transparent ">
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-gray-400">
                                Размер
                            </th>
                            <td class="px-6 py-4">
                                {{$detail->size}}
                            </td>
                        </tr>
                        <tr class=" odd:bg-slate-900  even:bg-transparent ">
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-gray-400">
                                Количество
                            </th>
                            <td class="px-6 py-4">
                                {{$detail->quantity}}
                            </td>
                        </tr>
                        <tr class=" odd:bg-slate-900  even:bg-transparent ">
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-gray-400">
                                Статус
                            </th>
                            <td class="px-6 py-4">
                                {{$detail->status}}
                            </td>
                        </tr>
                        <tr class=" odd:bg-slate-900  even:bg-transparent ">
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-gray-400">
                                Место
                            </th>
                            <td class="px-6 py-4">
                                {{$detail->place}}
                            </td>
                        </tr>
                        <tr class=" odd:bg-slate-900  even:bg-transparent ">
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-gray-400">
                                Коммент
                            </th>
                            <td class="px-6 py-4">
                                {{$detail->info}}
                            </td>
                        </tr>
                        <tr class=" odd:bg-slate-900  even:bg-transparent ">
                            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-gray-400">
                                Обновлено
                            </th>
                            <td class="px-6 py-4">
                                {{Carbon\Carbon::parse($detail->updated_at)->format('d.m.Y H:i')}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            <a wire:navigate href="{{route('home')}}"
                class="ml-6 mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  rounded-lg  bg-emerald-500 hover:bg-emerald-600 focus:ring-emerald-800">
                <span class="mr-2"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.71068 0.981116L0.284115 5.37019L0.247109 5.40454C0.098998 5.55141 0.0128251 5.7451 -1.19209e-07 5.97396L0.000732303 6.0509C0.0114767 6.23218 0.0807587 6.40537 0.217285 6.56056L0.26894 6.61388L4.71068 11.0188C5.03916 11.3446 5.57029 11.3446 5.89877 11.0188C6.22922 10.6912 6.22922 10.1584 5.8988 9.83074L2.83189 6.78899L15.1581 6.78929C15.6223 6.78929 16 6.41474 16 5.95093C16 5.48713 15.6223 5.11258 15.1581 5.11258L2.93086 5.11227L5.89877 2.16923C6.22922 1.84155 6.22922 1.3088 5.89877 0.981116C5.57029 0.655383 5.03916 0.655383 4.71068 0.981116Z" fill="white"/>
                    </svg></span>
                Вернуться назад
            </a>
        </div>
    </div>
</x-app-layout>
