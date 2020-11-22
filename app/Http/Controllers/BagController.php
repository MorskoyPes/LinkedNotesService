<?php

namespace App\Http\Controllers;

use App\Bag;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BagController extends Controller
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

    public function print()
    {

    	$bags = Bag::paginate(2);
      foreach ($bags as $bag) {
        $items = $bag->items()->get();
        $bag->setAttribute('items', $items);
      }
     
    	return view('bags.index', ['bags' => $bags]);
    }

  public function create(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'description' => 'required',
            ]);


        $bag = new Bag;
        $bag->name = $request->name;
        $bag->description = $request->description;
        $bag->save();
        return redirect('bag');
    }

    public function create_view(Request $request){
        if ($request->sort == 'items.name') {
            $bags = Item::getSortInBags($request->sort, $request->sortDir);
        }
        else{
         $bags = Item::getSortAllItems($request->sort, $request->sortDir);
        }
        
        return view('bags.bagCreate', ['bags' => $bags]);
    }

   public function destroy(Request $request, Bag $bag)
    {
        $bag->delete();

        return redirect('/bag');
    }

    public function edit(Request $request, $id)
    {

        $bag = Bag::find($id);
            
        return view('bags.bagEdit', ['bag' => $bag]);
    }

        public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required',
          'description' => 'required',
        ]);

        $bag = Bag::find($id);
        $bag->name = $request->name;
        $bag->description = $request->description;
        $bag->save();

        return redirect('bag')->with('success', 'Contact updated!');
    }
}
