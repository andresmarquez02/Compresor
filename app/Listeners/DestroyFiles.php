<?php

namespace App\Listeners;

use App\Events\Destroy;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DestroyFiles
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $files = Storage::allFiles("public/img");
        foreach($files as $file){
            if(!Str::contains($file,date("Y-m-d"))){
                Storage::delete([$file]);
            }
        }
    }

    /**
     * Handle the event.
     *
     * @param  Destroy  $event
     * @return void
     */
    public function handle(Destroy $event)
    {
        //
    }
}
