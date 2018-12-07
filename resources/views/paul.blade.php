<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
{{--普通的blade写法--}}
    {{--@foreach($users as $user)--}}
        {{--<div class="col-lg-12">--}}
            {{--<h2 class="d-inline ">@if($user->is_vip) {{ 'vip' }} @else {{ 'normal user' }} @endif</h2>--}}
            {{--<h2 class="d-inline">{{ $user->name }}</h2>--}}
            {{--<hr>--}}
        {{--</div>--}}
    {{--@endforeach--}}

{{--presenter 写法--}}
@inject('UsersPresenter', 'App\Presenters\UsersPresenter')
@foreach($users as $user)
    <div>
        <h2>{{ $UsersPresenter->judgeIfVip($user->is_vip, $user->name) }}</h2>
        <h2>{{ $user->votes }}</h2>
        <hr>
    </div>
@endforeach
</body>
</html>