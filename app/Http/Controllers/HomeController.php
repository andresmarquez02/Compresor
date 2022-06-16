<?php

namespace App\Http\Controllers;

use App\Events\Destroy;
use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    //Funcion que retorna la vista principal
    public function index()
    {
        //Borrado de las fotos que hayan quedado en el servidor.
        event(new Destroy);
        return view('welcome');
    }

    //Guardado de las fotos en la carpeta
    public function store(ImageRequest $request)
    {
        if($request->hasFile("file")){
            //Transacion por si hay algun fallo
            DB::beginTransaction();
            try {

                event(new Destroy);
                $response = $this->subirImagen($request->file("file"),"img");
                DB::commit();
                return response()->json(["response" => $response], 200);

            } catch (\Throwable $th) {
                return $th;
                DB::rollBack();
                return response()->json(["errors" => ["error" => ["Error inesperado.."]]], 500);
            }
        }
        return response()->json(['errors' => ["error" => ["No se ha conseguido ningun archivo.."]]], 500);
    }

    //Compresor de imagenes
    #Este compresor es de PHP nativo.
    private function subirImagen($imagen, $carpeta){

        //Obteniendo la informacion de la imagen
        $imgInfo = getimagesize($imagen);
        $mime = $imgInfo['mime'];

        //Que tipo de extension crear un nuevo archivo segun el archivo que pasamos como parametro
        switch($mime){
            case 'image/jpeg':
                $image = imagecreatefromjpeg($imagen);
                break;
            case 'image/png':
                $image = imagecreatefrompng($imagen);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($imagen);
                break;
            default:
                $image = imagecreatefromjpeg($imagen);
        }
        //Nombre para la imagen.
        $name = time(). "_" . date("Y-m-d"). "_." . $imagen->extension();
        //Calidad de la imagen
        $quality = 20;
        //almacenamiento de la imagen
        Storage::makeDirectory("public/$carpeta");
        imagejpeg($image, storage_path()."/app/public/$carpeta/".$name, $quality);

        return [
            "name" => $name,
            "path" => asset("storage/$carpeta/$name")
        ];
    }

    //Descarga de las Fotos
    public function download($name)
    {
        event(new Destroy);
        if(file_exists(storage_path()."/app/public/img/$name")){
            return response()->download(storage_path()."/app/public/img/$name", $name);
        }
        else{
            return view("exception");
        }

    }

}
