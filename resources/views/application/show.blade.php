<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Application') }}: <b>#{{ $application->id }}</b>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center flex">

                    <div class="w-full md:w-1/2">
                        <p class="text-md">Name</p>
                        <p class="text-xl">{{ $application->name }}</p>
                    </div>

                    <div class="w-full md:w-1/2">
                        <p class="text-md">Sectors</p>
                        <ul class="text-xl">
                            @foreach ($sectors as $sector)
                                <li title="{{ $sector->value }}">{{ str_replace('&nbsp;', '', $sector->name) }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
