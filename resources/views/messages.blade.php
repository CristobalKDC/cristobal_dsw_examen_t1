<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
       
        <h1>Mensajes</h1>

        <button type="button" class="btn btn-create" onclick="window.location.href='/messages/create';">Crear Mensaje</button>

        @if($messages->isEmpty())
            <p class="no-messages">No hay mensajes en la base de datos</p>
        @else

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mensaje</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->text }}</td>
                        <td style="display: flex; justify-content: center; align-items: center;">
                            @if ($message->img_path)
                                <img src="{{ asset('storage/' . $message->img_path) }}" alt="{{ $message->name }}" width="100" height="100">
                            @else
                                Sin imagen
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-modificar" onclick="window.location.href='/messages/modificar/{{ $message->id }}';">Modificar</button>

                            

                        </td>
                        

                    </tr>
                    @endforeach


                </tbody>

            </table>
            <button type="button" class="btn btn-listaEliminar" onclick="window.location.href='/messages/listaEliminar';">Seleccione para eliminar</button>

        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
