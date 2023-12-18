
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
</x-app-layout>
<div class="py-12 body">
    @if (session('succes'))
        <div class="alert alert-success">
            {{ session('succes') }}
        </div>
    @endif
    <div class="row">
        <div class="col h3 info py-2 ">{{ $roster['subject'] }}</div>
        <div class="col h3 info py-2">{{ $roster['start-time'] }}</div>
        <div class="col h3 info py-2">{{ $roster['end-time'] }}</div>
        <div class="col h3 info py-2">{{ $roster['date'] }}</div>
    </div>
    <form action="{{ route('dashboard.submit', ['id' => $id]) }}" method="POST">
        @csrf
        @foreach ($students as $index => $student)
            <div class="row student">
                <div class="col-2 info">{{ $student['first-name'] }}</div>
                <div class="col-2 info">{{ $student['last-name'] }}</div>
                <div class="col-2 info">{{ $student['dob'] }}</div>
                <div class="col-6 radio">
                    <input class="aanwezig" id="aanwezig{{ $index }}" type="radio" name="attendance[{{ $student['id'] }}]" value="aanwezig">
                    <input class="afwezig" id="afwezig{{ $index }}" type="radio" name="attendance[{{ $student['id'] }}]" value="afwezig">
                    <label class="anwezig" for="aanwezig{{ $index }}">aanwezig</label>
                    <label class="aafwezig" for="afwezig{{ $index }}">afwezig</label>
                </div>
            </div>
        @endforeach
        <button role="button" class="send">stuur aanwezigheid</button>
    </form>
</div>
