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
    <form action="{{ url('item/create') }}" method="POST" class="justify-content-center">
      {{ csrf_field() }}

      <!-- Имя задачи -->
      <div class="form-group row">
        <label for="item" class="col-md-4 col-form-label text-md-right">Название</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="item-name" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="item" class="col-md-4 col-form-label text-md-right">Описание</label>
        <div class="col-sm-6">
         <input type="text" name="description" id="item-description" class="form-control">
        </div>
       </div>
      <div class="form-group row">
        <label for="item" class="col-md-4 col-form-label text-md-right">Характеристика</label>
        <div class="col-sm-6">
          <input type="text" name="characters" id="item-characters" class="form-control">
        </div>
      </div>      
      <div class="form-group row">
        <label for="item" class="col-md-4 col-form-label text-md-right">Активность (1 или 0)</label>
        <div class="col-sm-6">
           <input type="text" name="active" id="item-active" class="form-control">
    		<br>
      </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 offset-md-4">
      		<select name="bag_id" style="width: 100%; height: 35px;">
      			<option value="">-</option>
      			@foreach ($bags as $bag)
  			  		<option value="{{ $bag->id }}">{{ $bag->name }}</option>
  			  	@endforeach
  			  </select>    
	    </div>
      </div>
      
      <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Добавить предмет
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</div> 
</div>
</div> 
@endsection