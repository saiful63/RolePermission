<x-main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                @if(session()->has('status'))
                   <div class="alert alert-success">
                       {{ session('status') }}
                   </div>
                @endif
                <div class="card mt-5">
                    <div class="card-header">
                    <h4 class="btn btn-warning float-end"><a href="{{ url('/') }}">Back</a></h4>
                    </div>
                    <div class="card-body">
                    <h4>Role:{{ $role->name }}</h4>
                    <hr>
                     <div class="mb-3">
                    <div class="row">
                        <div class="col-md-10">
                            <label for="permission">Permissions</label>
                            <form action="{{ url('/syncRolePermission/'.$role->id) }}" method="POST">
                                @csrf
                                <div>
                                    @foreach ($permissions as $permission)
                                     <input name="permissions[]"
                                     type="checkbox"
                                     value="{{ $permission->name }}"
                                     {{ in_array($permission->id ,$selectedPermissions)?"checked":"" }}
                                     >
                                     <span class="me-3 ms-1" >
                                     {{ $permission->name }}
                                    </span>
                                    @endforeach
                                </div>

                                <input type="submit" value="Update">
                            </form>

                        </div>
                    </div>
                </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-main>
