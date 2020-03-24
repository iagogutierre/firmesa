@extends('layouts.app')

@section('content')
<div class="container">
  
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Compilar Firmware</h1>
     <form method="post" action="{{ route('firmwares.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">Target:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="version">Profile:</label>
              <input type="text" class="form-control" name="version"/>
          </div>
          <div class="form-group">
              <label for="model">Packages:</label>
              <input type="text" class="form-control" name="model"/>
          </div>
          
          <button type="submit" class="btn btn-primary-outline">Gerar</button>
      </form>
  
</div>
</div>
@endsection
</div>