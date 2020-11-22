@extends('layouts.app')

@section('content')

<div class="card text-center">
  <div class="card-header">
    Ты дома, хочешь что-нибудь создать?
  </div>
  <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h5 class="card-title">Панель меню</h5>
    <p class="card-text">Здесь можно добавлять и просматривать всё вот это вот</p>
    <a class="btn btn-outline-info" href="/item/create">Добавить предмет</a>
    <a class="btn btn-outline-info" href="/bag/create">Добавить сумку</a>
    <a class="btn btn-outline-info" href="/item">Посмотреть предметы</a>
    <a class="btn btn-outline-info" href="/bag">Посмотреть сумку</a>
  </div>
  <div class="card-footer text-muted">
    Нажми куда-нибудь
  </div>
</div>
@endsection
