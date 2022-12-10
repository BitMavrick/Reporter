@if (Session::has('green'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('green') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(Session::has('yellow'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ Session::get('yellow') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(Session::has('red'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ Session::get('red') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(Session::has('new'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>{{ Session::get('new') }}</p>
</div>
@endif