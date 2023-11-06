<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 body">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            <div class="content">
                <form action="{{ route('dashboard.user.filter') }}" method="POST">
                    @csrf
                    <label for="fname">first-name:</label>
                    <input type="text" id="fname" name="firstName">
                    <label for="sname">last-name:</label>
                    <input type="text" id="sname" name="lastName">
                    <label for="dob">day of birth:</label>
                    <input type="text" id="dob" name="dob">
                    <label for="klas">class name:</label>
                    <input type="text" id="klas" name="klas">
                    <button role="button" class="send my-3">filter</button>
                </form>
                @foreach ($students as $student)
                    <div class="row py-1 my-2">
                        <div class="col info py-2">{{ $student['first-name'] }}</div>
                        <div class="col info py-2">{{ $student['last-name'] }}</div>
                        <div class="col info py-2">{{ $student['dob'] }}</div>
                        <div class="col info py-2">{{ $student->klas->name }}</div>
                        <button class="col" onclick="deleteUser({{$student['id']}})">🗑️</button>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Button trigger modal -->
        <button class="send" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">voeg student toe</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="opacity = 1;">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.user') }}" method="POST">
                        @csrf
                        <label for="fName">first-name:</label>
                        <input type="text" name="fName" id="fName" require>
                        <label for="sname">last-name</label>
                        <input type="text" name="sName" id="sName" require>
                        <label for="dob">day of birth:</label>
                        <input type="date" name="dob" id="dob" require>
                        <label for="klas">class name:</label>
                        <select name="klas" id="klas">
                            @foreach($klas as $info)
                                <option value="{{ $info['id'] }}">{{ $info['name'] }}</option>
                            @endforeach
                        </select>
                        <button class="send">Save Student</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <script>
            function deleteUser(id){
                window.location.href = `/dashboard/student/delete/${id}`;
            }
        </script>
    </div>
</x-app-layout>
