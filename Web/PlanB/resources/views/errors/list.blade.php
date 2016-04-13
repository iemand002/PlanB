@if($errors->any())
    <div class="alert alert-danger">
        <strong>Oeps!</strong>
        <ul class="list">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif