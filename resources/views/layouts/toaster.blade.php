@if(session('message'))

<div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: center;opacity:1;">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif