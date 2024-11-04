<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      <div class="container">
    <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <h4 class="btn btn-warning float-end"><a href="{{ url('/role_list') }}">Role List</a></h4>
                    </div>
                    <div class="card-body">
                    <h1>User</h1>
                    </div>
                </div>
                <table class="table">
                   <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        @role('super admin')
                        <th>Delete</th>
                        <th>Action</th>
                        @endrole
                    </tr>
                   </thead>
                   <tbody>
                     @foreach ($usersWithRoles as $user)
                       <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary me-2">
                                 {{ $role->name }}
                            </span>
                        @endforeach
                        </td>
                        @role('super admin')
                        <td><a href="{{ url('/user_edit') }}">Edit</a></td>
                        <td><a href="{{ url('/user_delete') }}">Delete</a></td>
                        @endrole
                        <td><a href="{{ url('assignRole/'.$user->id) }}">Assign/Update role</a></td>
                       </tr>
                     @endforeach
                   </tbody>
                </table>

            </div>
        </div>

    </div>

                </div>
            </div>
        </div>


    </div>
</x-app-layout>

{{-- <x-slot:js>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('roleSelect');
        console.log(roleSelect);
        // Toggle selection on click
        roleSelect.addEventListener('click', function(e) {
            if (e.target.tagName === 'OPTION') {
                e.target.selected = !e.target.selected;
            }
        });
    });

            </script>

        </x-slot:js> --}}
