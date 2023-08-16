<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: white !important;">
            {{ __('Nursing Recruitment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 shadow sm:rounded-lg" style="background-color: #f1f1f1">
{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
                <div class="">
                    <div class="row">
                        <div class="col-8">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                        <div class="col-4">
                            @include('profile.partials.user-profile-images')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
