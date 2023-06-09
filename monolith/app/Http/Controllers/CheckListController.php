<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
    public function index()
    {
        return response()->json(['data' => CheckList::all()]);
    }

    public function show($id)
    {
        $checkList = CheckList::findOrFail($id);
        return response()->json($checkList);
    }

    public function create(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name' =>['required', 'srting'],
            'user_id' =>['required', 'exists:users,id']
        ]);
        $checkList = CheckList::create($validatedData);
        return response()->json(['message'=> 'List created', 'data' =>$checkList]);
    }

    public function update(Request $request, $id)
    {
        $checkList = CheckList::findOrFail($id);
        $checkList->name = $request->get('name');
        $checkList->save();
        return response()->json(['massage' => 'List updated']);
    }

    public function delete($id)
    {
        $checkList = CheckList::findOrFail($id);
        $checkList->delete();

        return response()->json(['message'=> 'List deleted']);
    }
}
