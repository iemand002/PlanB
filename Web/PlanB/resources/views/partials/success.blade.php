@if (Session::has('success')||session('status'))
    <div class="alert callout-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>
            <i class="fa fa-check-circle fa-lg fa-fw"></i> Succes.
        </strong>
        {{ Session::get('success') }}{{ Session::get('status') }}
    </div>
@endif