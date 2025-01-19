<x-app-layout title="База знаний">
    <div class="w-full mt-5 ">
        @if (session()->has('element_created'))
        <x-knowledge.toast-detail-create />
        @endif
        @if (session()->has('element_updated'))
        <x-knowledge.toast-detail-update />
        @endif
        @if (session()->has('element_delete'))
        <x-knowledge.toast-detail-delete />
        @endif
        @auth

        <button wire:navigate onclick="location.href='{{route('element.create')}}'" type="button"
            data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default" aria-expanded="false"
            class="flex items-center justify-center mx-auto text-white bg-emerald-500 rounded-full w-12 h-12 mb-5 hover:bg-emerald-700 focus:ring-4  focus:outline-none focus:ring-emerald-800">
            <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 1v16M1 9h16" />
            </svg>
        </button>
        @endauth



        <div class="grid grid-cols-3 gap-4 justify-items-center max-lg:grid-cols-2 max-md:grid-cols-1">
            @foreach ($elements as $element)
            <div class="flex items-center border rounded-lg border-l shadow flex-row w-80 border-gray-700 bg-gray-800 hover:bg-gray-700">
                <img class="object-cover  rounded-s-lg h-32 w-32" src="{{ asset('uploads/' . $element->image) }}" alt="">

                <div class="flex flex-col justify-between p-4 leading-normal">
                    <a wire:navigate href="{{route('element.show', [
        'element' => $element])}}" class="mb-2 text-2xl font-medium border-b border-white  text-white">{{$element->title}}</a>
                    @auth

                    <div class="flex">
                        <a wire:navigate href="{{route('element.edit', [
                        'element'=> $element])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: #10b981;transform: ;msFilter:;">
                                <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                </path>
                                <path
                                    d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                </path>
                            </svg></a>
                        <form class="ml-3" method="post" action="{{route('element.destroy', ['element' => $element])}}">
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
                      @endauth
                </div>
            </div>



            @endforeach
        </div>

        </table>

    </div>



</x-app-layout>
