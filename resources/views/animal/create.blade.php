<!doctype html>
<html lang="pt-BR">
  <head>
    
    <link href="/css/app.css" rel="stylesheet">
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="" style="padding: 2%;"><h1>Cadastro de Animais</h1></div>
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

    <form action="/animal/create" method="post">
    @csrf
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" required="" class="form-control" placeholder="Nome" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" required="" class="form-control" placeholder="Descrição"autocomplete="off">
    </div>
    <div class="form-group">
        <label>Idade</label>
        <input type="number" name="age" required="" class="form-control" placeholder="Idade"autocomplete="off">
    </div>
    <div class="form-group">
        <label>Pertence a</label>
        <select type="text" name="human_id" required="" class="form-control" autocomplete="off">
            @foreach($humans as $human)
                <option value="{{ $human->id }}">{{ $human->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</body>
</html>