@extends('layout.base')

@section('title')
Регистрация
@endsection

@section('body')
    <!-- Успех -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <ul><li>{{ session('success') }}</li></ul>
        </div>
    @endif

    <!-- Ошибки -->
    @if($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<main>

    <form class="leftmar" method="POST" action="{{route('user-registration-submit')}}" onsubmit="onsubmitForm(this)">
        @csrf
        
        <div>
            Фамилия
            <input type="text" name="surname" value="{{ old('surname') }}">
        </div>
        <div>
            Имя
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <div>
            Отчество
            <input type="text" name="patronymic" value="{{ old('patronymic') }}">
        </div>
        <div>
            Почта
            <input type="email" name="email" value="{{ old('email') }}" onblur="onBlur(this.value)">
        </div>
        <div>
            Пароль
            <input type="password" name="password">
        </div>
        <div>
            Подтверждение пароля
            <input type="password" name="password_confirmation">
        </div>
        <div>
            <button type="submit">Регистрация</button>
        </div>
    </form>

    <script type="text/javascript">
        function onBlur(login){
            var ajax = new XMLHttpRequest();

            ajax.open("GET", "/getLogin/"+login, true);
            ajax.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    var data = JSON.parse(this.responseText);
                    if (!data.empty){
                        alert(data.status + " - " + data.message);
                    }
                }

                if (this.status == 500){
                    alert(this.responseText);
                }
            }
            ajax.send();

            // $.ajax({
            //     type: "GET",
            //     url: "/getLogin",
            //     dataType: "json",
            //     data: {'login': login},
            //     success: function(data){
            //         alert('seccess' + data);
            //         var data1 = JSON.parse(data);
            //         if (!data1.empty)
            //             alert(data1.status + " - " + data1.message);
            //     }
            // });
            return false;
        }

        function onSubmitForm(form){
            var ajax = new XMLHttpRequest();
            var formData = new FromData(form);

            ajax.open("POST", form.getAttribute("action"), true);
            ajax.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    var data = JSON.parse(this.responseText);

                    alert(data.status + " - " + data.message);
                }

                if (this.status == 500){
                    alert(this.responseText);
                }
            }
            
            ajax.send(formData);

            return false;
        }
    </script>
</main>
@endsection
