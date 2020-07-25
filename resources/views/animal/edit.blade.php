<!doctype html>
<html lang="pt-BR">
  <head>
    
    <link href="/css/app.css" rel="stylesheet">
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="" style="padding: 2%;"><h1>Edição de Animals</h1></div>
    </div>
  </head>
<body>
    
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="/animal/{{ $animal->id }}" method="post">
    <input type="hidden" name="_method" value="put">
    @csrf
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" required="" class="form-control" value="{{ isset($animal) ? $animal->name : '' }}" 
        placeholder="Nome" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" required="" class="form-control" value="{{ isset($animal) ? $animal->description : '' }}" 
        placeholder="CEP"autocomplete="off">
    </div>
    <div class="form-group">
        <label>Idade</label>
        <input type="number" name="age" required="" class="form-control" value="{{ isset($animal) ? $animal->age : '' }}" 
        placeholder="Número"autocomplete="off">
    </div>
    <div class="form-group">
        <label>Pertence a</label>
        <select type="text" name="human_id" required="" class="form-control" 
        placeholder="Número"autocomplete="off">
        @foreach($humans as $human)
            <option value="{{ $human->id }}">{{ $human->name }}</option>
        @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</body>
</html>