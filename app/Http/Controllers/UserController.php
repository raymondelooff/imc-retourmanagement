<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Retailer;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Session;
use Validator;
use Auth;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user_roles = UserRole::all();
        $retailers = Retailer::all();

        $user_roles_values = [];
        foreach($user_roles as $role) {
            $user_roles_values[$role->alias] = $role->title;
        }

        $retailer_values = [];
        foreach($retailers as $retailer) {
            $retailer_values[$retailer->id] = $retailer->name;
        }

        return view('user.create', compact('user_roles_values', 'retailer_values'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'activated' => 'boolean',
            'user_role' => 'required',
            'retailer_id' => 'numeric'
        ]);

        User::create($request->all());

        Flash::success('Gebruiker toegevoegd!');

        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $retailer = null;
        if(!is_null($user->retailer_id)) {
            $retailer = Retailer::find($user->retailer_id);
        }

        return view('user.show', compact('user', 'retailer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user_roles = UserRole::all();
        $retailers = Retailer::all();

        $user_roles_values = [];
        foreach($user_roles as $role) {
            $user_roles_values[$role->alias] = $role->title;
        }

        $retailer_values = [];
        foreach($retailers as $retailer) {
            $retailer_values[$retailer->id] = $retailer->name;
        }

        return view('user.edit', compact('user', 'user_roles_values', 'retailer_values'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'activated' => 'boolean',
            'user_role' => 'required',
            'retailer_id' => 'numeric'
        ]);

        // Extra checks if the user edits his own account
        if($id == $user->id) {
            $validator->after(function($validator) use ($request, $user) {
                // Check if the user wants to deactivate his own account
                if(!$request->get('activated')) {
                    $validator->errors()->add('activated', 'het is niet toegestaan jezelf te deactiveren.');
                    $request->merge(['activated' => $user->activated]);
                }
                
                // Check if the user wants to change his own role
                if($request->get('user_role') != $user->user_role) {
                    $validator->errors()->add('user_role', 'het is niet toegestaan om je eigen rol te wijzigen.');
                    $request->merge(['user_role' => $user->user_role]);
                }
            });
        }

        if($validator->fails()) {
            return redirect(route('user.edit', $user->id))
                ->withErrors($validator)
                ->withInput();
        }
        
        $user = User::findOrFail($id);
        $user->update($request->all());

        Flash::success('Gebruiker bijgewerkt.');

        return redirect(route('user.edit', $user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        Flash::success('Gebruiker verwijderd!');

        return redirect('user');
    }

    /**
     * Activate or deactivate the given user.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function activate($id, Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'activated' => 'boolean'
        ]);

        // Validate current password
        $validator->after(function($validator) use ($id, $user) {
            if($id == $user->id) {
                $validator->errors()->add('activated', 'het is niet toegestaan jezelf te activeren of deactiveren.');
            }
        });

        if($validator->fails()) {
            return redirect('user')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);
        $user->update($request->only('activated'));

        $activated = $request->get('activated');
        if($activated) {
            Flash::success('Gebruiker geactiveerd.');
        }
        else {
            Flash::success('Gebruiker gedeactiveerd.');
        }

        return redirect('user');
    }

}
