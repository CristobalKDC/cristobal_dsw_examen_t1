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

        <button type="button" class="btn btn-inicio" onclick="window.location.href='/messages';">Inicio</button>

        <!-- Botón para crear nuevo mensaje -->
        <button type="button" class="btn btn-create" onclick="window.location.href='/messages/create';">Crear Mensaje</button>

        @if($messages->isEmpty())
            <p class="no-messages">No hay mensajes en la base de datos</p>
        @else

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mensaje</th>
                        <th>Seleccione para eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->text }}</td>
                        <td>

                            <div class="checkbox-group">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="message"class="objetivo" value="deleteModal{{ $message->id }}">
                                    <form id="eliminar-form-{{ $message->id }}" action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>                      
                            

                        </td>

                    </tr>
                    @endforeach


                </tbody>

                <button type="button" id="botonEliminar" onclick="event.preventDefault(); document.getElementById('eliminar-form-{{ $message->id }}').submit();">Eliminar</button>


                <!-- <button type="button" class="btn btn-eliminar" data-bs-toggle="modal" data-bs-target=".objetivo">Eliminar</button> -->

                <!-- <div class="modal fade" id="deleteModal{{ $message->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que deseas eliminar estos mensaje?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="/messages/{{ $message->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div> -->

            </table>
    

        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
