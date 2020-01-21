<?php

namespace Modules\Lawyer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Lawyer\Entities\Process;
use Modules\Lawyer\Entities\Situation;
use Modules\Lawyer\Http\Requests\ProcessRequest;

class ProcessesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $processes = Process::with('kinds')->paginate(10);

        return view('lawyer::processes.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $states = ["Ativo" => "Ativo", "Encerrado" => "Encerrado", "Suspenso" => "Suspenso"];
        return view('lawyer::processes.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProcessRequest $request)
    {
        $process = Process::create($request->all());
        return redirect()->route('processes.show', compact('process'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Process $process)
    {
        return view('lawyer::processes.show', compact('process'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Process $process)
    {
        $situations = Situation::pluck('name','id');
        $states = ["Ativo" => "Ativo", "Encerrado" => "Encerrado", "Suspenso" => "Suspenso"];
        return view('lawyer::processes.edit', compact('process','states','situations'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
