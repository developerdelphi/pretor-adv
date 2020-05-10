<?php

namespace Modules\Lawyer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Modules\Lawyer\Entities\Persona;

class PersonasController extends Controller
{
    private $persona;

    public function __construct(Persona $persona)
    {
        $this->persona = $persona;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $personas = $this->persona;

        $search = [];
        $search = Arr::add($search, 'name', $request->has('name') ? $request->get('name') : null);
        $search = Arr::add($search, 'per_page', $request->has('per_page') ? $request->get('per_page') : 10);
        $search = Arr::add($search, 'order', $request->has('order') ? $request->get('order') : 'name');
        $search = Arr::add($search, 'order_type', $request->has('order_type') ? $request->get('order_type') : 'ASC');

        if ($search['name']) {
            // dd('where name: ' . $search['name']);
            $personas = $personas->where('name', 'like', '%' . $search['name'] . '%');

            // dd($personas);
        }

        if (($search['order']) && ($search['order_type'] == 'DESC')) {
            $personas = $personas->orderByDesc($search['order']);
        } elseif ($search['order']) {
            $personas = $personas->orderBy($search['order']);
        }

        $personas = $personas->paginate($search['per_page'])->appends($request->query());
        // dd($personas);
        return view('lawyer::personas.index', compact('personas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('lawyer::personas.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Persona $persona)
    {
        // dd($persona);
        return view('lawyer::personas.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('lawyer::personas.edit');
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
