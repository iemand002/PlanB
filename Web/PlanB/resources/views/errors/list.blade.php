@if(isset($errors)&&$errors->any())
    <div class="callout-danger">
        <strong>Oeps!</strong>
        <ul class="list">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif