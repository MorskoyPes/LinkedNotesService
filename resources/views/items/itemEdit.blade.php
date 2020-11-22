@extends('layouts.app')

@section('content')

  <!-- Bootstrap шаблон... -->

  <div class="container">
    <!-- Отображение ошибок проверки ввода -->


    @if (count($errors) > 0)
		  <div class="alert alert-danger">
		    <ul>
		      @foreach ($errors->all() as $error)
		        <li>{{ $error }}</li>
		      @endforeach
		    </ul>
		  </div>
		@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Предмет</div>
                <div class="card-body">
    <!-- Форма новой задачи -->
    <form action="{{ route('item.update', $item->id) }}" method="POST" class="form-horizontal">
      
      {{ csrf_field() }}
      {{method_field('PATCH')}}
   

      <!-- Имя задачи -->
      <div class="form-group row">
        <label for="item" class="col-md-4 col-form-label text-md-right">Предмет</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="item-name" class="form-control" value="{{ $item->name }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="item" class="col-md-4 col-form-label text-md-right">Описание</label>
        <div class="col-sm-6">
         <input type="text" name="description" id="item-description" class="form-control" value="{{ $item->description }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="item" class="col-md-4 col-form-label text-md-right">Характеристика</label>
        <div class="col-sm-6">
          <input type="text" name="characters" id="item-characters" class="form-control" value="{{ $item->characters }}">
        </div>
      </div> 


      <div class="form-group row">
        <label for="item" class="col-md-4 col-form-label text-md-right">Активность (1 или 0)</label>
        <div class="col-sm-6">
           <input type="text" name="active" id="item-active" class="form-control" value="{{ $item->active }}">
    		<br>
    		<select name="bag_id" style="width: 100%; height: 35px;">
          <option selected value="{{ $bag->id }}">{{ $bag->name }}</option>
          @foreach ($bags as $baggi)
            @if ($bag->id  !=  $baggi->id)
			  		<option value="{{ $baggi->id }}">{{ $baggi->name }}</option>
            @endif
			  	@endforeach
			</select>    
	    </div>
      </div>
        

      <!-- Кнопка добавления задачи -->
      <div class="form-group row">
        <div class="col-sm-6 offset-md-4">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Изменить предмет
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- TODO: Текущие задачи -->

<!-- Текущие задачи -->




@endsection