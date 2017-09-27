@if(count($errors))
    <div class="form-group">
        <div class="alert alert-danger">
            <ul>
<!--                @foreach($errors->all() as $error)-->
                    <li>
<!--                        {{$error}}-->
                    Заполните все поля
                    </li>
<!--                @endforeach-->
            </ul>
        </div>
    </div>
@endif