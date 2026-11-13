<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataInventory = inventory::all();
        return view('inventory.index', compact('dataInventory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([ 
            'code_item' => 'required|max:40', 
            'item_name' => 'required|max:100', 
            'item_condition' => 'required', 
            'item_quantity' => 'required', 
        ]); 
    
        inventory::create($data); 
    
        return redirect()->route('inventory.index') 
            ->with('success', 'New Item added.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(inventory $inventory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {
            $inventory = inventory::findOrFail($id);
            $inventory->delete();
    
            return redirect()->route('inventory.index')
                ->with('success', 'inventory data deleted.');
        }
    
    }
}
