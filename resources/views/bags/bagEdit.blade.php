@extends('layouts.app')

@section('content')

  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->

    <!-- Форма новой задачи -->
    <form action="{{ route('bag.update', $bag->id) }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      {{method_field('PATCH')}}

      <!-- Имя задачи -->
      <div class="form-group">
        <label for="bag" class="col-sm-3 control-label">Сумка</label>

        <div class="col-sm-6">
          <input type="text" name="name" id="bag-name" class="form-control" value="{{ $bag->name }}">
        </div>
      </div>
      <div class="form-group">
        <label for="bag" class="col-sm-3 control-label">Описание</label>

        <div class="col-sm-6">
          <input type="text" name="description" id="bag-description" class="form-control" value="{{ $bag->description }}">
        </div>
      </div>


      <!-- Кнопка добавления задачи -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Изменить сумку
          </button>
        </div>
      </div>
    </form>
  </div>


@endsection