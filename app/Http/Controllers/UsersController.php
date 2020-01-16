<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')->withToastSuccess('Formulário Carregado!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            If( User::create($request->all())) {
                $success = 'toast_success';
                $message = 'Usuário cadastrado!';
            }
        } catch (Exception $e) {
            $success = 'toast_error';
            $message = $e->getMessage();
        } finally {
            return redirect()->route('users.index')->with($success, $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //$user->hasRole('administrator');
        $roles = []; // $user->getRoles();
        $permissions = [];// $user->getPermissions();
        //\Alert::success('Success Title', 'Success Message');
        return view('users.show', compact('user', 'roles', 'permissions'))->with('success','Cadastro de usuário atualizado!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $success = 'toast_success';
        $message = 'Não foi possível realizar a consulta.';
        try {
            //$user = User::first($id);
            $success = 'toast_success';
            $message = 'Cadastro do usuário localizado.';
            return view('users.edit', compact('user'))->with($success, $message);
        } catch (Exception $e) {
            $success = 'toast_error';
            $message = $e->getMessage();
            return redirect()->route('users.index')->with($success, $message);
        } finally {
            //
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $success = 'toast_success';
        $message = 'Não foi possível realizar a consulta.';

        $user->update($request->all());

        return redirect()->route('users.show', compact('user'))->with($success, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::destroy($id);
            $success = 'toast_success';
            $message = 'Usuário excluído com sucesso.';
        } catch (Exception $e) {
            $success = 'toast_error';
            $message = $e->getMessage();
        } finally {
            return redirect()->route('users.index')->with($success, $message);
        }
    }
}
