<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $items = Item::join('orden_item', 'item.id' '=', 'orden_item.id_item')
                    ->join('orden_compra', 'orden_item.id_orden' '=' 'orden_compra.id')
                    ->select(['item.id', 'item.detalle', 'item.valor',  'orden_compra.numero', '']);
       if (request()->ajax()){
                        return Datatables::of($items)
       
             ->addColumn('action', function ($item) {
                return '<a href="/item/'.$item->id.'" class="btn btn-info"> Ver</a>';                       
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
        }
            return View::make('site/item/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return View::make('site/items/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $data = Input::all();

        if($item->isValid($data))
        {

            $item->fill($data);
            $item->save();

                 $idoc = Session::get('idorden');

                $item->ordencompra()->attach($idoc);
             return Redirect::route('items.index');

        }
        else
        {
            //Si no se valida redirige a create con los errores qeu se encontraron
            return Redirect::route('items.create')->withInput()->withErrors($item->errors);

        }

    }

    public function fromdocumento()
    {
        $items =  DB::table('item')
                    ->join('documento', 'documento.id_orden', '=', 'orden_item.id_orden')
                    ->get();
                return View::make('site/items/act')->with('items', $items);
        /*$items = DB::table('item')
                    ->join('orden_item', 'orden_item.id_item', '=', 'item.id')
                    ->join('orden_compra', 'orden_compra.id', '=', 'orden_item.id_orden')

                    ->select(['item.id', 'item.detalle', 'item.unitario',  'orden_compra.numero']);*/
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response

     */
    public function show(Item $item)
    {


        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
