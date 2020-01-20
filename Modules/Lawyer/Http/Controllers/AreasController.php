<?php

namespace Modules\Lawyer\Http\Controllers;

use Alert;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Lawyer\Entities\Area;
use Modules\Lawyer\Http\Requests\AreaRequest;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $areas = Area::paginate(10);
        return view('lawyer::areas.index', compact('areas'));
    }

    public function search(Request $request){
        if($request->ajax()){
            $areas = Area::first();
            return response()->json([
                'areas' => $areas
            ], 200);

        }


    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $origin = [0 =>'Administrativo', 1 => 'Judicial'];
        return view('lawyer::areas.create', compact('origin'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AreaRequest $request)
    {
        $area = Area::create($request->all());
        return redirect()->route('areas.index')->withToastSuccess('Área criada!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Area $area)
    {
        return view('lawyer::areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Area $area)
    {
        $origin = [0 =>'Administrativo', 1 => 'Judicial'];

        return view('lawyer::areas.edit', compact('area','origin'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(AreaRequest $request, Area $area)
    {
        $area->update($request->all());

        return redirect()->route('areas.show', compact('area'))->withToastSuccess('Área atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Area $area)
    {
        $area->forceDelete();

        return redirect()->route('areas.index')->withSuccess('Área excluída!');
    }
}
