<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddonCat1;
use App\Models\Product;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AddonCat1Controller extends Controller
{
    public function index($id)
    {
        try {
            $data['proId'] = $id;
            $proDecID = Crypt::decryptString($data['proId']);
            $whereArr = [
                ['admin_id', '=', Auth::id()],
                ['product_id', '=', $proDecID],
            ];
            $data['addonCatOnes'] = AddonCat1::select('id', 'product_id', 'name', 'has_addon_cat', 'status')->where($whereArr)
                                ->orderByDesc('created_at')->paginate(20);
        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }
        
        return view('admin.addonCat1.index', $data);
    }

    public function add(Request $request, $id) {
        try {
            $data['proId'] = $id;
            $proDecID = Crypt::decryptString($data['proId']);
        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }

        if($request->input()) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $name = $request->input('name');
            $status = !empty($request->input('status')) ? 1 : 0;

            try {
                Product::find($proDecID)->update(['has_addon_cat'=> 1]);
                try {
                    AddonCat1::create([
                        'admin_id' => Auth::id(),
                        'product_id' => $proDecID,
                        'name' => $name,
                        'has_addon_cat' => 0,
                        'status' => $status
                    ]);
    
                    return redirect()->route('addon.cat1', ['proId' => $id])->with('success', 'Addon Product has been added Successfully.');
                } catch (\Throwable $th) {
                    return back()->withInput($request->all())->with('error', 'We encountered an error while inserting the data, please try again later.');
                }
            } catch (\Throwable $th) {
                return back()->withInput($request->all())->with('error', 'Failed to update product, please try again!');
            }
        }
        return view('admin.addonCat1.add', $data);
    }

    public function view($proId, $id) {
        try {
            $data['proId'] = $proId;
            $proDecID = Crypt::decryptString($data['proId']);
            $decrID = Crypt::decryptString($id);

            $whereArr = [
                ['id', '=', $decrID],
                ['admin_id', '=', Auth::id()],
                ['product_id', '=', $proDecID],
            ];
            $data['addonCatOne'] = AddonCat1::where($whereArr)
                                    ->first(['id', 'product_id', 'name', 'has_addon_cat', 'status']);

        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }
        return view('admin.addonCat1.view', $data);
    }

    public function edit(Request $request, $proId, $id) {
        try {
            $data['proId'] = $proId;
            $proDecID = Crypt::decryptString($data['proId']);
            $decrID = Crypt::decryptString($id);

            $whereArr = [
                ['id', '=', $decrID],
                ['admin_id', '=', Auth::id()],
                ['product_id', '=', $proDecID],
            ];
            $data['addonCatOne'] = AddonCat1::where($whereArr)
                                    ->first(['id', 'admin_id', 'product_id', 'name', 'has_addon_cat', 'status']);

            if($request->input()) {
                if($data['addonCatOne']->admin_id == Auth::id() && $data['addonCatOne']->product_id == $proDecID) {
                    $validated = $request->validate([
                        'name' => 'required|string|max:255',
                    ]);
                    
                    $name = $request->input('name');
                    $status = !empty($request->input('status')) ? 1 : 0;
        
                    if($decrID == $data['addonCatOne']->id) {
                        $addonCat1 = AddonCat1::find($data['addonCatOne']->id);
                        $addonCat1->name = $name;
                        $addonCat1->status = $status;
                        $addonCat1->update(); 
        
                        if($addonCat1) {
                            return redirect()->route('addon.cat1', ['proId' => $proId])->with('success', 'Product data has been updated Successfully.');
                        } else {
                            return back()->withInput($request->all())->with('error', 'We encountered an error while updating, please try again later.');
                        }
                    } else {
                        return back()->withInput($request->all())->with('error', 'Invalid product ID!');
                    }
                } else {
                    abort(401, 'Unauthorised Access');
                }
            }
        } catch (DecryptException $e) {
            return back()->withInput($request->all())->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }

        return view('admin.addonCat1.edit', $data);
    }

    public function delete($proId, $id) {
        try {
            $proDecId = Crypt::decryptString($proId);
            $decrID = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }

        try {
            $whereArr = [
                ['admin_id', '=', Auth::id()],
                ['product_id', '=', $proDecId],
            ];
            $addonData = AddonCat1::where($whereArr)->count();
            if($addonData === 1) {
                try {
                    Product::find($proDecId)->update(['has_addon_cat'=> 0]);
                } catch (\Throwable $th) {
                    return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
                }
            }

            $addArrI = count($whereArr);
            $whereArr = Arr::add($whereArr, $addArrI, ['id', '=', $decrID]);
            
            AddonCat1::find($decrID)->delete();

            return back()->with('warning', 'Product has been deleted.');
            
        } catch (\Throwable $th) {
            return back()->with('error', 'We encountered an error while deleting the records, please try again later.');
        }
    }
}
