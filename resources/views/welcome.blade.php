<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta de CEP</title>
  <!-- Incluir o CSS do Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  @if(session('msg'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('msg') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center">Consulta de CEP</h2>
        <form action="{{ route('consulta') }}" method="">
          @csrf
          <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP">
          </div>
          <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-6 offset-md-3">
        <h2>Cidades Consultadas</h2>
        <table class="table">
          <thead>
            <tr>
              <th>CEP</th>
              <th>Logradouro</th>
              <th>Complemento</th>
              <th>Bairro</th>
              <th>Localidade</th>
              <th>UF</th>
              <th>IBGE</th>
              <th>GIA</th>
              <th>DDD</th>
              <th>SIAFI</th>
            </tr>
          </thead>
          <tbody>
          @if (!empty($data['cep']))
            <tr>
              <td>{{ $data['cep'] }}</td>
              <td>{{ $data['logradouro'] }}</td>
              <td>{{ $data['complemento']}}</td>
              <td> {{ $data['bairro']}}</td>
              <td> {{ $data['localidade']}}</td>
              <td> {{ $data['uf']}}</td>
              <td> {{ $data['ibge']}}</td>
              <td> {{ $data['gia']}}</td>
              <td> {{ $data['ddd']}}</td>
              <td> {{ $data['siafi']}}</td>
            </tr>
          @else
            <tr>
                <td class="text-center" colspan="10">Nenhum CEP para ser exibido</td>
            </tr>
          @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Incluir o JavaScript do Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>