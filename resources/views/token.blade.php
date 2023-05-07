<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Token Generation') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (isset($token))
                        <div class="p-6 text-gray-900">
                            <p>Your API token is: {{ $token }}</p>
                            <p>To use this, use as bearer token in authorisation request</p>
                            <p>Do not share with anyone else</p>
                        </div>
                    @endif
                    @if (isset($message))
                        <div class="p-6 text-gray-900">
                            <p>{{$message}}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
