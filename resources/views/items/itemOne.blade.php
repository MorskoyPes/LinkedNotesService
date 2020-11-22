@extends('layouts.app')

@section('content')


    <!-- Отображение ошибок проверки ввода -->
<div class="container justify-content-center">
  <div class="row justify-content-center">
    <div class="col-sm-5">
      <div class="card text-center bg-light mb-3" style="min-width: 13rem;">
        <div class="card-header">ДА ШО</div>
        <div class="card-body">
          <a class="btn btn-outline-info" href="/item/create">Добавить предмет</a>
        </div>
      </div>
    </div>
    <div class="col-sm-5">
      <div class="card text-center bg-light mb-3" style="min-width: 13rem;">
        <div class="card-header">ДА ШО</div>
        <div class="card-body">
          <a class="btn btn-outline-info" href="/bag/create">Добавить сумку</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Текущие задачи -->

<div class="card">
  <div class="card-header">
  @if (count($items) > 0)
    
        Имеющиеся предметы:
		<?php $i = 1 ?>
        @foreach ($items as $item)
        	<div><?=$i++?> - {{ $item->name }}</div>
		@endforeach
      </div>

      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <th>id
              <div class="btn-group btn-group-xs" role="group" style="position: relative;">
                <div style="position: absolute; top: -8px; left: 0px; font-size: 13px;">
                  <a href="?sort=id&sortDir=asc">
                  <span class="fa fa-chevron-down"></span></a></div>
                <div style="position: absolute; top: -18px; left: 0px; font-size: 13px;">
                  <a href="?sort=id&sortDir=desc">
                  <span class="fa fa-chevron-up"></span></a></div>
              </div>
            </th>
            <th>Название
              <div class="btn-group btn-group-xs" role="group" style="position: relative;">
                <div style="position: absolute; top: -8px; left: 0px; font-size: 13px;">
                  <a href="?sort=name&sortDir=asc">
                  <span class="fa fa-chevron-down"></span></a></div>
                <div style="position: absolute; top: -18px; left: 0px; font-size: 13px;">
                  <a href="?sort=name&sortDir=desc">
                  <span class="fa fa-chevron-up"></span></a></div>
              </div>
            </th>
            <th>Описание</th>
            <th>Характеристики</th>
            <th>Активно
              <div class="btn-group btn-group-xs" role="group" style="position: relative;">
                <div style="position: absolute; top: -8px; left: 0px; font-size: 13px;">
                  <a href="?sort=active&sortDir=asc">
                  <span class="fa fa-chevron-down"></span></a></div>
                <div style="position: absolute; top: -18px; left: 0px; font-size: 13px;">
                  <a href="?sort=active&sortDir=desc">
                  <span class="fa fa-chevron-up"></span></a></div>
              </div>
            </th>
            <th>Лежит в сумке 
              <div class="btn-group btn-group-xs" role="group" style="position: relative;">
                <div style="position: absolute; top: -8px; left: 0px; font-size: 13px;">
                  <a href="?sort=bags.name&sortDir=asc">
                  <span class="fa fa-chevron-down"></span></a></div>
                <div style="position: absolute; top: -18px; left: 0px; font-size: 13px;">
                  <a href="?sort=bags.name&sortDir=desc">
                  <span class="fa fa-chevron-up"></span></a></div>
              </div>
            </th>
            <th>Создано
              <div class="btn-group btn-group-xs" role="group" style="position: relative;">
                <div style="position: absolute; top: -8px; left: 0px; font-size: 13px;">
                  <a href="?sort=created_at&sortDir=asc">
                  <span class="fa fa-chevron-down"></span></a></div>
                <div style="position: absolute; top: -18px; left: 0px; font-size: 13px;">
                  <a href="?sort=created_at&sortDir=desc">
                  <span class="fa fa-chevron-up"></span></a></div>
              </div>
            </th>

          </thead>

          <!-- Тело таблицы -->
          <tbody>
            @foreach ($items as $item)
            <tr>
              <!-- <td class="table-text"> -->
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->description }}</td>
              <td>{{ $item->characters }}</td>
              <td>{{ $item->active }}</td>
              <td>{{ $item->bag->name }}</td>
              <td>{{ $item->created_at }}</td>

              <td>
                <form action="{{ url('itemedit/'.$item->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }} 
                 <button type="submit" id="{{ $item->id }}" class="btn btn-outline-primary btn-sm">
                    <span class="fa fa-pencil"></span>
                  </button>
                </form>
              </td>
              <td>
                <form action="{{ url('item/'.$item->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" id="{{ $item->id }}" class="btn btn-outline-danger btn-sm">
                    <span class="fa fa-times"></span>
                  </button>
                </form>
              </td>
            </tr>  
          @endforeach



          </tbody>
        </table>
                    <?php echo $items->links(); ?>
      </div>
    </div>
   @endif


@endsection