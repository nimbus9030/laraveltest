<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
// use Flight;

use Log;
// use Storage;
use Illuminate\Support\Facades\Storage;


class FlightController extends Controller
{
    public function showDatatable()
    {
        // $tasks = Flight::orderBy('order','ASC')->select('id','title','status','created_at')->get();

        $tasks = Flight::find(8);
        return view('demos.sortabledatatable',compact('tasks'));
    }


    public function updateOrder(Request $request)
    {
        $tasks = Flight::all();

        foreach ($tasks as $task) {
            $task->timestamps = false; // To disable update_at field updation
            $id = $task->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $task->update(['order' => $order['position']]);
                }
            }
        }
        
        Log::info( $request->order );

        return response('Update Successfully.', 200);
    }

    public function updateHtml(Request $request)
    {
        $task = Flight::find(8);
        $task->update([ 'title' => $request->order ]);
        Log::info( $task );
        Log::info( $request->order );

        return response('OK', 200);
    }

    public function exportHtml(Request $request)
    {   
        // Log::info( $request->text );

        Storage::disk('local')->put('file.html', $request->text);
        // $url = Storage::url('file.html');
        // Log::info($url);

        // return asset('storage/file.html');

        // return redirect($url);
        // return response('OK', 200);
    }

}
