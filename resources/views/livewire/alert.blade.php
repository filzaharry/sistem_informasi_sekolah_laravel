@if (Session::has('success'))
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong> {{ Session::get('success') }}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger" id="danger-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Error! </strong> {{ Session::get('error') }}
</div>
@endif