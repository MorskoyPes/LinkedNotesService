@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
  <div class="row justify-content-center">
    <div class="col-sm-5">
      <div class="card text-center bg-light mb-3" style="min-width: 13rem;">
        <div class="card-header">ДА ШО</div>
        <div class="card-body">
          <a class="btn btn-outline-info" href="/bag/create">Добавить сумку</a>
        </div>
      </div>
    </div>
    <div class="col-sm-5">
      <div class="card text-center bg-light mb-3" style="min-width: 13rem;">
        <div class="card-header">ДА ШО</div>
        <div class="card-body">
          <a class="btn btn-outline-info" href="/item/create">Добавить предмет</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
<!-- Текущие задачи -->
  @if (count($bags) > 0)
    <strong>Имеющиеся сумки:</strong>
      <?php $i = 1 ?>
        @foreach ($bags as $bag)
          <div><?=$i++?> - {{ $bag->name }}</div>
<!--           @if (count($bag->items) > 0)
            <div>  предметы внутри : </div>
          @endif
          @foreach ($bag->items as $item)
             <div>  {{ $item->name }}</div>
          @endforeach -->
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
            <th>Предметы в сумке</th>
            <th>Описание</th>
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
          <tbody>
            @foreach ($bags as $bag)
              <tr>
                <td>{{ $bag->id }}</td>
                <td>{{ $bag->name }}</td>
                <td>@foreach ($bag->items as $item)
                       <div> {{ $item->name }}</div>
                    @endforeach</td>
                <td>{{ $bag->description }}</td>
                <td>{{ $bag->created_at }}</td>
                  
                  <td>
                    <form action="{{ url('bagedit/'.$bag->id) }}" method="POST">
                     {{ csrf_field() }}
                     {{ method_field('PATCH') }}
                      <button type="submit" id="{{ $bag->id }}" class="btn btn-outline-primary btn-sm">
                        <span class="fa fa-pencil"></span>
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{ url('bag/'.$bag->id) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" id="{{ $bag->id }}" class="btn btn-outline-danger btn-sm">
                        <span class="fa fa-times"></span>
                      </button>
                    </form>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
<?php echo $bags->links(); ?>


@endsection