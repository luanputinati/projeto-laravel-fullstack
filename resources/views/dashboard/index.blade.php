<!doctype html>
<html lang="pt-BR">
  <head>
    
    <link href="/css/app.css" rel="stylesheet">
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="" style="padding: 2%;"><h1>Dashboard</h1></div>
    </div>
  </head>
  <body>
  <h3>Listagem Humans</h3>
  <a href="/human/create">
    <h4><button class="btn btn-primary">Cadastrar</button></h4>
  </a>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Zipcode</th>
      <th scope="col">Number</th>
      <th scope="col">Botões</th>
    </tr>
  </thead>
  <tbody>
    @foreach($humans as $human)
    <tr>
      <td>{{ $human->id }}</td>
      <td>{{ $human->name }}</td>
      <td>{{ $human->zipcode }}</td>
      <td>{{ $human->number }}</td>
      <td>
        <a href="/human/edit/{{ $human->id }}" class="btn btn-secondary">Editar</a>
        <form action="/human/{{ $human->id }}" method="post">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<h3 style="padding-top: 30px;">Listagem Animals</h3>
<a href="/animal/create">
<h4><button class="btn btn-primary">Cadastrar</button></h4>
</a>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Age</th>
      <th scope="col">Pertence a</th>
      <th scope="col">Botões</th>
    </tr>
  </thead>
  <tbody>
    @foreach($animals as $animal)
    <tr>
      <td>{{ $animal->id }}</td>
      <td>{{ $animal->name }}</td>
      <td>{{ $animal->description }}</td>
      <td>{{ $animal->age }}</td>
      <td>{{ $animal->human->name }}</td>
      <td>
      <a href="/animal/edit/{{ $animal->id }}" class="btn btn-secondary">Editar</a>
        <form action="/animal/{{ $animal->id }}" method="post">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
</body>
</html>