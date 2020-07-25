<!doctype html>
<html lang="pt-BR">
  <head>
    
    <link href="/css/app.css" rel="stylesheet">
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="" style="padding: 2%;"><h1>Cadastro de Humans</h1></div>
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

    <form action="/human/create" method="post">
    @csrf
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" required="" class="form-control" placeholder="Nome" autocomplete="off">
    </div>
    <div class="form-group">
        <label>CEP</label>
        <input type="text" name="zipcode" required="" class="form-control" placeholder="CEP"autocomplete="off">
    </div>
    <div class="form-group">
        <label>Número</label>
        <input type="text" name="number" required="" class="form-control" placeholder="Número"autocomplete="off">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</body>
</html>