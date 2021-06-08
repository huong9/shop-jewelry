<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;
use Route;

class RoleController extends Controller
{

    public function index()
    {
        $role = role::all();
        return view('admin.role.index', compact('role'));
    }

    public function create()
    {

        $all = Route::getRoutes();
        $routes = [];

        foreach ($all as $item) {
            $name = $item->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes) && $name !== 'admin.') {
                array_push($routes, $item->getName());
            }
        }
        return view('admin.role.create', compact('routes'));
    }

    public function p_create(Request $request)
    {
        $add = role::them();
        if ($add) {
            return redirect()->route('admin.role')->with('success', 'Success!');
        }
        return redirect()->route('admin.role')->with('error', 'Failure!');
    }
    public function edit($id)
    {
        $permissions = [];
        $model = role::find($id);
        $permissions = json_decode($model->permissions);
        $all = Route::getRoutes();
        $routes = [];

        foreach ($all as $item) {
            $name = $item->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes) && $name !== 'admin.') {
                array_push($routes, $item->getName());
            }
        }
        return view('admin.role.edit', compact('routes', 'model', 'permissions'));
    }
    public function p_edit($id, Request $request)
    {
        $sua = role::sua($id);
        if ($sua) {
            # code...
            return redirect()->route('admin.role')->with('success', 'Success!');
        }
        return redirect()->route('admin.role')->with('error', 'Failure!');
    }
    public function delete($id)
    {
        $xoa = role::xoa($id);
        if ($xoa > 0) {
            return redirect()->route('admin.role')->with('error', 'Failure!');
        }
        return redirect()->route('admin.role')->with('success', 'Success!');
    }
}
