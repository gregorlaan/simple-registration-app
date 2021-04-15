<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit application') }}: <b>#{{ $application->id }}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('application.update', $application->id) }}">
                        @method('PATCH')
                        @csrf


                        <!-- Helper text -->
                        <div class="mb-4">
                            <p>Please enter your name and pick the Sectors you are currently involved in.</p>
                        </div>

                        <!-- Name -->
                        <div class="mb-4">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $application->name" required autofocus />
                        </div>

                        <!-- Sectors -->
                        <div class="mb-4">
                            <x-label for="sectors" :value="__('Sectors')" />

                            <select id="sectors" name="sectors[]" multiple size="15" required class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($sectors as $sector)
                                    <option
                                        value="{{ $sector->id }}"
                                        {{ (collect(old('sectors'))->contains($sector->id)) ? 'selected' : '' }}
                                        {{ (collect($application->sectors)->contains($sector->id)) ? 'selected' : '' }}
                                    >
                                        {!! $sector->name !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Agree to terms -->
                        <div class="block mt-4">
                            <label for="agreement" class="inline-flex items-center">
                                <input id="agreement" name="agreement" type="checkbox" required class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Agree to terms') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
