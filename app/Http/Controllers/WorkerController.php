<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::Get();
    }

    public function update($id, Request $request)
    {
        $worker = Worker::findOrFail($id);

        // $worker->update($request->only());
    }
}
