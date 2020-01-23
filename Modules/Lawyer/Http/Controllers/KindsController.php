<?php

namespace Modules\Lawyer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Lawyer\Entities\Area;
use Modules\Lawyer\Entities\Kind;
use Modules\Lawyer\Http\Requests\KindRequest;

class KindsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $area = new Area;

        $kinds = Kind::paginate(10);

        return view('lawyer::kinds.index', compact('kinds'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $areas = Area::pluck('name','id');

        return view('lawyer::kinds.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(kindRequest $request)
    {
        Kind::create($request->all());

        return redirect()->route('kinds.index')->withToastSuccess('Classe Processual criada!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Kind $kind)
    {
        return view('lawyer::kinds.show', compact('kind'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Kind $kind)
    {
        $areas = Area::pluck('name','id');

        return view('lawyer::kinds.edit', compact('kind','areas'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(KindRequest $request, Kind $kind)
    {
        $kind->update($request->all());

        return redirect()->route('kinds.show',compact('kind'))->withToastSuccess('Classe Processual atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Kind $kind)
    {
        if($kind->delete($kind->id)){
            return redirect()->route('kinds.index')->withSuccess('Classe Processual removida com sucesso!');
        }else{
            return redirect()->back()->withType('Classe Processual removida com sucesso!');
        }
    }

    public function getKinds(Request $request)
    {
        $params = $request->all();
        $data = Kind::where('area_id',$params['area_id'])->pluck('name', 'id');

        if($request->ajax()) return response()->json($data);
    }
}
