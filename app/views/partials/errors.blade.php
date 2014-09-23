<div class="row">
    @if ($errors->count())
    <div class="col-md-12">
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    </div>
    @endif
</div>