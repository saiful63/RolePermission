<x-main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <h4 class="btn btn-warning float-end"><a href="{{ url('/home') }}">Back</a></h4>
                    </div>
                    <div class="card-body">
                    <h1>Role</h1>
                    </div>
                </div>
                <table class="table">
                   <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                   </thead>
                   <tbody>
                     @foreach ($roles as $role)
                       <tr>
                        <td>{{ $role->name }}</td>
                        <td><a href="{{ url('/getRolePermission/'.$role->id) }}">Give/Update permission</a></td>
                       </tr>
                     @endforeach
                   </tbody>
                </table>

            </div>
        </div>
    </div>
</x-main>
