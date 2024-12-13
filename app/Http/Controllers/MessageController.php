<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use resources\views\messages;

class MessageController extends Controller
{

    // Mostrar todos los mensajes
    public function index()
    {
        // Obtener todos los mensajes de la base de datos
        $messages = Message::all();

        // Retornar la vista principal y pasar los mensajes a la vista
        return view('messages', compact('messages'));
    }


    public function lista()
    {
        // Obtener todos los mensajes de la base de datos
        $messages = Message::all();

        // Retornar la vista principal y pasar los mensajes a la vista
        return view('listaEliminar', compact('messages'));
    }


    //Ir a la vista de creacion de mensajes
    public function create()
    {
        return view('create');
    }

    // Metodo para almacenar los mensajes
    public function store(Request $request)
    {
        $request->validate([
        'text' => 'required|max:255',
        'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ],$messages = [
            'mimes' => 'Por favor, introduce una imagen válida',
            'max'   => 'Imagen no puede ser mayor de 4 MB'
        ]);

        $imgPath = null; 
        if ($request->hasFile('img_path')) {
            $imgPath = $request->file('img_path')->store('messages', 'public');
        }

        Message::create([
            'text' => $request->text,
            'img_path' => $imgPath
        ]);

        return redirect()->route('messages')->with('success', 'Mensaje creado con éxito.');

    }

     // Método para mostrar el formulario de edición
     public function edit($id)
     {
         // Buscar el mensaje por su ID
         $message = Message::findOrFail($id);
 
         // Retornar la vista de edición con el mensaje
         return view('modificar', compact('message'));
     }
 
     // Método para actualizar el mensaje
     public function update(Request $request, $id)
     {
         // Validar los datos del formulario
         $request->validate([
             'text' => 'required|max:255',
             'negrita' => 'nullable|boolean',
             'subrayado' => 'nullable|boolean',
             'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
         ]);
 
         // Buscar el mensaje por su ID
         $message = Message::findOrFail($id);
 
         // Actualizar el mensaje
         $message->update([
             'text' => $request->text,
             'negrita' => $request->has('negrita') ? 1 : 0,
             'subrayado' => $request->has('subrayado') ? 1 : 0        
         ]);

         if ($request->hasFile('img_path')) {
            // Elimina la imagen anterior si existe
            if ($message->img_path) {
                Storage::delete('public/' . $message->img_path);
            }
    
            // Guardar la nueva imagen
            $imgPath = $request->file('img_path')->store('message', 'public');
            $message->img_path = $imgPath;
        }
 
        // Verificar si el usuario desea eliminar la imagen
        if ($request->has('delete_image') && $request->delete_image == '1') {
            if ($message->img_path) {
                Storage::delete('public/' . $message->img_path); 
            }

            $message->img_path = null;
        }

        $message->save();

         // Redirigir a la lista de mensajes con un mensaje de éxito
         return redirect()->route('messages')->with('success', 'Mensaje actualizado con éxito.');
     }

    // Método para eliminar un mensaje
public function destroy($id)
{
    $message = Message::findOrFail($id);
    $message->delete();
    
    // Redirige a la lista de mensajes con un mensaje de éxito
    return redirect()->route('messages')->with('success', 'El mensaje ha sido borrado con éxito.');
}



}
