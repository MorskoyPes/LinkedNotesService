<?php

namespace App\Http\Controllers;

use App\Bag;
use App\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{

	  /**
   * Создание нового экземпляра контроллера.
   *
   * @return void
   */
	public function __construct()
	{
	   $this->middleware('auth');
	}

    public function create(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'description' => 'required',
          'bag_id' => 'required',
            ]);


        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->characters = $request->characters;
        $item->active = $request->active;
        $item->bag_id = $request->bag_id;
        $item->save();


        return redirect('/item');
    }

    public function create_view(){

        $bags = Bag::get();
        $items = Item::get();
        return view('items.itemCreate', ['items' => $items], ['bags' => $bags]);
    }


    public function print(Request $request)
    {
        if ($request->sort == 'bags.name') {
            $items = Item::getSortInBags($request->sort, $request->sortDir);
        }
        else{
    	   $items = Item::getSortAllItems($request->sort, $request->sortDir);
        }
        

    	return view('items.itemOne', ['items' => $items]);
    }

    public function destroy(Request $request, Item $item)
    {
        $item->delete();

        return redirect('/item');
    }

    public function edit(Request $request, $id)
    {

        $bags = Bag::get();
        $item = Item::find($id);
        $bag = Bag::find($item->bag_id);

        return view('items.itemEdit', ['bags' => $bags, 'bag' => $bag, 'item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required',
          'description' => 'required',
          'bag_id' => 'required',
        ]);

        $item = Item::find($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->characters = $request->characters;
        $item->active = $request->active;
        $item->bag_id = $request->bag_id;
        $item->save();

        return redirect('item')->with('success', 'Contact updated!');
    }

}
