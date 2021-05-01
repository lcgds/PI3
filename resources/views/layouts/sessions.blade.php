@if(session()->has('success'))
            <div class="alert alert-success my-4" role="alert">
                {{ session()->get('success') }}
            </div>
@endif

@if(session()->has('warning'))
            <div class="alert alert-warning my-4" role="alert">
                {{ session()->get('warning') }}
            </div>
@endif