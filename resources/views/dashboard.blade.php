<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>

                <div class="md:flex p-4">
                    @if (auth()->user()->application)

                        <x-button-link class="w-full md:w-1/2 m-2" :href="route('application.show', auth()->user()->application->id)">
                            {{ __('Go to your Application') }}
                        </x-button-link>

                        <x-button-link class="w-full md:w-1/2 m-2" :href="route('application.edit', auth()->user()->application->id)">
                            {{ __('Edit your Application') }}
                        </x-button-link>

                    @else
                        <x-button-link class="w-full m-2" :href="route('application.create')">
                            {{ __('Create an Application') }}
                        </x-button-link>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
