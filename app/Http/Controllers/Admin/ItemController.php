<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | public Function / Items List page View
      |--------------------------------------------------------------------------
     */

     public function index() {
        try {
            $items = Item::orderBy('id', 'asc')->paginate(10);
            return view('admin.items.index')->with([
                        'items' => $items,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'something went wrong');
        }
    }
}
