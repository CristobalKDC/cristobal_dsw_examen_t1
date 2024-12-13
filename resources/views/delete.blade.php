<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Mensajes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Eliminar Mensajes</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('messages.delete.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="messages">Selecciona los mensajes a eliminar(Mantener CTRL para multiples):</label>
                <select name="messages[]" id="messages" class="form-control" style="width: 100%; height: 150px;" multiple required>
                    @foreach ($messages as $message)
                        <option value="{{ $message->id }}">{{ $message->text }}</option>
                    @endforeach
                </select>
                @if ($errors->has('messages'))
                    <div class="text-danger">{{ $errors->first('messages') }}</div>
                @endif
            </div>

            <button type="submit" class="btn btn-danger">Eliminar Mensajes</button>
        </form>
    </div>
</body>
</html>
