<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Experience') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 shadow sm:rounded-lg" style="background-color: #f1f1f1">
                @include('user-experience.partials.create-update-experience-information-form')
            </div>
            <div class="p-4 sm:p-8 shadow sm:rounded-lg" style="background-color: #f1f1f1">
                <div class="max-w-xl">
                    @include('user-experience.partials._table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>