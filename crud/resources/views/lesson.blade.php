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
            </div>
        <p>
            {{ $roster }}
        </p>
        <div class="col info py-2">{{ $roster['date'] }}</div>
        <div class="col info py-2">{{ $roster['start-time'] }}</div>
        <div class="col info py-2">{{ $roster['end-time'] }}</div>
        <div class="col info py-2">{{ $roster['subject'] }}</div>
        @foreach ($students as $index => $student)
                <div class="row student">
                    <div class="col-2 info">{{ $student['first-name'] }}</div>
                    <div class="col-2 info">{{ $student['last-name'] }}</div>
                    <div class="col-2 info">{{ $student['dob'] }}</div>
                    <div class="col-6 radio">
                        <input class="aanwezig" id="aanwezig{{ $index }}" type="radio" name="attendance[{{ $index }}]" value="aanwezig">
                        <input class="afwezig" id="afwezig{{ $index }}" type="radio" name="attendance[{{ $index }}]" value="afwezig">
                        <label class="anwezig" for="aanwezig{{ $index }}">aanwezig</label>
                        <label class="aafwezig" for="afwezig{{ $index }}">afwezig</label>
                    </div>
            </div>
        @endforeach
</x-app-layout>
