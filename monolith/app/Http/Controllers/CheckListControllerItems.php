<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckListItem;
class CheckListControllerItems extends Controller
{
    public function show($id)
    {
        $checkList = CheckListItem::findOrFail($id);
        return response()->json($checkList);
    }

    public function create(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name' =>['required', 'srting'],
            'check_lists_id' =>['required', 'exists:check_lists,id']
        ]);
        $checkList = CheckListItem::create($validatedData);
        return response()->json(['message'=> 'List created', 'data' =>$checkList]);
    }

    public function update(Request $request, $id)
    {
        $checkListItem = CheckListItem::findOrFail($id);
        $checkListItem->name = $request->get('name');
        $checkListItem->save();
        return response()->json(['massage' => 'List updated']);
    }

    public function delete($id)
    {
        $checkListItem = CheckListItem::findOrFail($id);
        $checkListItem->delete();

        return response()->json(['message'=> 'List deleted']);
    }
}
