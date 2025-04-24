<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    @include('components.banner')
    @include('components.section1')

    {{-- le lien sera de type button --}}
    <a href="{{route('recharge.carte')}}" class="button_d_envoie">Recharger mon compte</a>

    <a href="{{route('transfere.argent')}}">Envoyer de l'argent à ami</a>
</x-app-layout>
