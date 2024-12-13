<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mensaje</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
            color: #333;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        label {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Crear Mensaje</h1>
        <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="text" class="form-label">Texto del mensaje:</label>
                <input type="text" id="text" name="text" class="form-control" placeholder="Escribe tu mensaje" required>
            </div>
           
            <div class="form-group">
                <label for="img_path">Imagen:</label>
                <input type="file" name="img_path" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Mensaje</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
