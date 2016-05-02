<div class="row">
    <div class="col-md-offset-2 col-md-8">
        @if (Session::has('message'))
                <!-- Success Message -->
        <div class="alert alert-success">
            <strong>Success</strong>
            <br>
            {{ Session::get('message') }}
        </div>
        @endif
    </div>
</div>