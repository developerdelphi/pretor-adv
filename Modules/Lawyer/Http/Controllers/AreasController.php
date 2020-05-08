<?php

namespace Modules\Lawyer\Http\Controllers;

use Alert;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Modules\Lawyer\Entities\Area;
use Modules\Lawyer\Http\Requests\AreaRequest;

class AreasController extends Controller
{
    private $area;

    public function __construct(Area $area)
    {
        $this->area = $area;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $areas = $this->area;

        $search = [];
        $search = Arr::add($search, 'name', $request->has('name') ? $request->get('name') : null);
        $search = Arr::add($search, 'per_page', $request->has('per_page') ? $request->get('per_page') : 10);
        $search = Arr::add($search, 'order', $request->has('order') ? $request->get('order') : 'name');
        $search = Arr::add($search, 'order_type', $request->has('order_type') ? $request->get('order_type') : 'ASC');

        if ($search['name']) {
            $areas = $areas->where('name', 'like', '%' . $search['name'] . '%');
        }

        if (($search['order']) && ($search['order_type'] == 'DESC')) {
            $areas = $areas->orderByDesc($search['order']);
        } elseif ($search['order']) {
            $areas = $areas->orderBy($search['order']);
        }

        $areas = $areas->paginate($search['per_page'])->appends($request->query());

        return view('lawyer::areas.index', compact('areas', 'search'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $areas = Area::all();
            return Datatables::of(Area::query())
                ->addColumn('action', function ($row) {
                    $btn = '<a href="\\{{ route(\'areas.show\',[\'areas\'=>1]) \\}}" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $origin = [0 => 'Administrativo', 1 => 'Judicial'];
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
        $origin = [0 => 'Administrativo', 1 => 'Judicial'];

        return view('lawyer::areas.edit', compact('area', 'origin'));
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

    public function getAreas(Request $request)
    {

        $data = Area::pluck('name', 'id');
        //dd($data);
        if ($request->ajax()) return response()->json($data);
    }
}
