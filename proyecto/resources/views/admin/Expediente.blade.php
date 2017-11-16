@extends('admin.main')

@section('title')
  Categorias
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Sistema</a></li>
    <li class="active">Expediente</li>
  </ol>
@endsection
@section('content')
  <div class="box">
    <div class="box-body">
      <div class="table-responsive">
        <a class="btn btn-success" role="button" data-toggle="collapse" href="#form0" aria-expanded="false" aria-controls="collapseExample">Crear Expediente</a>
        <div class="collapse" id="form0">
          <hr>
          <form method="POST" action="{{route('categories.store')}}" accept-charset="UTF-8">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Expediente</label>
              <input class="form-control" placeholder="Expediente" required="" name="name" type="text" id="name">
            </div>
            <div class="form-group">
              <input class="btn btn-primary" type="submit" value="Registrar">
            </div>
        </form>
        </div>
        <div class="container-fluid">
            <div class="col col-sm-8">
            </div>
  					<div class="col col-sm-4">
              <form method="GET" action="{{route('Expediente.index')}}" accept-charset="UTF-8">
                {{ csrf_field() }}
                  <div class="input-group">
                    <input class="form-control" placeholder="Buscar Categoria" required="" name="name" type="text" id="name">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                  </div>
              </form>
  					</div>
  			</div>
        <hr>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
              <tr>
                  <th>Description</th>
                  <th>Accion</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($locales as $local)
              <tr class="odd gradeX">
                <td>{{$local->description}}</td>
                <td >
                  <a class="btn btn-warning" role="button" data-toggle="collapse" href="#form{{$local->id}}" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a href="{{ route('Expediente.destroy', $local->id) }}" onclick="return confirm('¿Seguro que deseas eliminar?')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr class="odd gradeX collapse"  id="form{{$local->id}}">
                <td COLSPAN=7>
                  <form method="POST" action="{{route('Expediente.update',$local->id)}}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Expediente</label>
                      <input class="form-control" placeholder="Expediente" required="" name="name" type="text" id="name" value="{{$local->description}}">
                    </div>
                    <div class="form-group">
                      <input class="btn btn-primary" type="submit" value="Editar">
                    </div>
                  </form>
              </tr>
              <tr class="odd gradeX collapse">
              </tr>
            @endforeach
          </tbody>
        </table>
        {!! $locales->render() !!}
      </div>
    </div>
  </div>
@endsection
