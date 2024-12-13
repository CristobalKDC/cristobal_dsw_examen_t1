<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mensaje</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Bootstrap CSS para diseño moderno -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-secondary {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .checkbox-group {
            margin-bottom: 20px;
        }

        .checkbox-group input {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Editar Mensaje</h1>

        <!-- Formulario para editar el mensaje -->
        <form action="{{ route('messages.update', $message->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="text">Texto del Mensaje</label>
                <textarea id="text" name="text" rows="4" class="form-control">{{ $message->text }}</textarea>
            </div>

            <div class="form-group">
                <label for="img_path">Imagen:</label>
                @if ($message->img_path)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $messages->img_path) }}" alt="imagen" width="100">
                    </div>
                @endif
            <input type="file" name="img_path" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>

            <div class="form-group">
                <a href="{{ route('messages') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS y Popper.js para funcionalidad de formularios y otros componentes -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
