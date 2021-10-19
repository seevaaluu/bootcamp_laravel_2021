<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Listado de libros</title>
  </head>
  <body>
      
      <div class="container">
          <div class="row">
              <div class="col">
                <h1>Formulario de edicion de libro {{ $libro->nombre }}</h1>
                <form action="{{ route('libros.update', $libro) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label class="form-label">Nombre del libro</label>
                        <input type="text" value="{{ $libro->nombre }}" name="nombre" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editorial</label>
                        <input type="text" value="{{ $libro->editorial }}" required name="editorial" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de publicacion</label>
                        <input type="date" value="{{ $libro->fecha_de_publicacion }}" required name="fecha_de_publicacion" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($errors->any()) 
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
