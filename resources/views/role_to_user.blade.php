<x-main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <h4 class="btn btn-warning float-end"><a href="{{ url('/') }}">Back</a></h4>
                    </div>
                    <div class="card-body">
                    <h1>User:{{ $user->name }}</h1>
                    <form action="{{ url('applyRoleToUser/'.$user->id) }}" method="POST">
                        @csrf
                        <div>
                            <select name="roles[]" multiple class="form-control" id="roleSelect" size="5">
                                @foreach ($roles as $role)
                                    <option
                                    value="{{ $role->name }}"
                                    {{ in_array($role->id,$selectedRoles)?'selected':'' }}
                                    >
                                    {{ $role->name }}
                                    </option>
                                @endforeach

                             </select>
                        </div>
                        <input type="submit" value="Assign role">

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <x-slot:js>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
const mulSelector = (elemSelector)=>{
   let option = document.querySelectorAll(`${elemSelector} option`);
   console.log(option);
   option.forEach(function(element){
      element.addEventListener('mousedown',function(e){
        e.preventDefault();
        element.parentElement.focus();
        this.selected=!this.selected;
        return false;
      },false);
   });
}

mulSelector('#roleSelect');
    });

            </script>

        </x-slot:js>
</x-main>
