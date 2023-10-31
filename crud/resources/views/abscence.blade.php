<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 body">
        <div class="content">
            <form action="{{ route('dashboard.filter') }}" method="POST">
                @csrf
                <label for="fname">first-name:</label>
                <input type="text" id="fname" name="firstName">
                <label for="sname">last-name:</label>
                <input type="text" id="sname" name="lastName">
                <label for="subject">subject:</label>
                <input type="text" id="subject" name="subject">
                <label for="klas">class name:</label>
                <input type="text" id="klas" name="klas">
                <button role="button" class="send my-3">filter</button>
            </form>
            @foreach($abscents as $abscent)
                <div class="student">
                    <div class="col">{{ $abscent->student->{'first-name'} }}</div>
                    <div class="col">{{ $abscent->student->{'last-name'} }}</div>
                    <div class="col">{{ $abscent->roster->subject }}</div>
                    <div class="col">{{ $abscent->student->klas->name }}</div>
                    <div class="col">{{ $abscent->roster->{'start-time'} }}</div>
                    <div class="col">{{ $abscent->roster->{'end-time'} }}</div>
                    <div class="col">{{ $abscent->roster->date }}</div>
                    <button class="col" onclick="deleteAbscentie({{$abscent['id']}})">🗑️</button>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function deleteAbscentie(id){
            window.location.href = `/dashboard/abscence/delete/${id}`;
        }
    </script>
</x-app-layout>
