<?php

namespace Modules\Lawyer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Lawyer\Entities\Entity;
use Modules\Lawyer\Http\Requests\EntityRequest;

class EntitiesController extends Controller
{
    private $entity;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $entities = $this->entity->orderBy('name')->paginate(5);

        return view('lawyer::entities.index', compact('entities'));
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view("lawyer::entities.create");
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(EntityRequest $request)
    {
        $entitiy = Entity::create($request->all());

        return redirect()->route("entities.index")->withToastSuccess("Entidade criada!");
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Entity $entity)
    {
        return view('lawyer::entities.show', compact('entity'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Entity $entity)
    {
        return view('lawyer::entities.edit', compact('entity'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(EntityRequest $request, Entity $entity)
    {
        $entity->update($request->all());

        return redirect()->route('entities.show', compact('entity'))->withToastSuccess('Entidade atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Entity $entity)
    {
        if ($entity->delete($entity->id)) {
            return redirect()->route('entities.index')->withSuccess('Entidade removida com sucesso!');
        } else {
            return redirect()->back()->withType('Entidade removida com sucesso!');
        }
    }
}
