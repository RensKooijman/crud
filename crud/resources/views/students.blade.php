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
            <div class="content">
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
        <div id="add" class="send">voeg student toe</div>

        <script>
            let sender = document.getElementById('add');
            sender.addEventListener("click", () =>{
                window.location.href = `dashboard/student/add`;
            });

            function deleteUser(id){
                window.location.href = `/dashboard/student/delete/${id}`;
            }
        </script>
        
    </div>
</x-app-layout>
