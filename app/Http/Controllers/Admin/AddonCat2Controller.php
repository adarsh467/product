<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddonCat1;
use App\Models\AddonCat2;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AddonCat2Controller extends Controller
{
    public function index($id, $addonId)
    {
        try {
            $data['proId'] = $id;
            $proDecID = Crypt::decryptString($data['proId']);
            $data['addonId'] = $addonId;
            $addonDecID = Crypt::decryptString($data['addonId']);
            $whereArr = [
                ['admin_id', '=', Auth::id()],
                ['product_id', '=', $proDecID],
                ['addon_cat_1_id', '=', $addonDecID],
            ];
            $data['addonCatTwos'] = AddonCat2::select('id', 'product_id', 'addon_cat_1_id', 'name', 'price', 'status')
                                    ->where($whereArr)->orderByDesc('created_at')->paginate(20);
        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }
        
        return view('admin.addonCat2.index', $data);
    }

    public function add(Request $request, $id, $addonId) {
        try {
            $data['proId'] = $id;
            $proDecID = Crypt::decryptString($data['proId']);
            $data['addonId'] = $addonId;
            $addonDecID = Crypt::decryptString($data['addonId']);
        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }

        if($request->input()) {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min_digits:1',
            ]);

            $name = $request->input('name');
            $price = $request->input('price');
            $status = !empty($request->input('status')) ? 1 : 0;

            try {
                AddonCat1::find($addonDecID)->update(['has_addon_cat'=> 1]);
                try {
                    AddonCat2::create([
                        'admin_id' => Auth::id(),
                        'product_id' => $proDecID,
                        'addon_cat_1_id' => $addonDecID,
                        'name' => $name,
                        'price' => $price,
                        'status' => $status
                    ]);
    
                    return redirect()->route('addon.cat2', ['proId' => $id, 'cat1Id' => $addonId])->with('success', 'Addon Product has been added Successfully.');
                } catch (\Throwable $th) {
                    return back()->withInput($request->all())->with('error', 'We encountered an error while inserting the data, please try again later.');
                }
            } catch (\Throwable $th) {
                return back()->withInput($request->all())->with('error', 'Failed to update product, please try again!');
            }
        }
        return view('admin.addonCat2.add', $data);
    }

    public function view($proId, $addonId, $id) {
        try {
            $data['proId'] = $proId;
            $proDecID = Crypt::decryptString($data['proId']);
            $data['addonId'] = $addonId;
            $addonDecID = Crypt::decryptString($data['addonId']);
            $decrID = Crypt::decryptString($id);

            $whereArr = [
                ['id', '=', $decrID],
                ['admin_id', '=', Auth::id()],
                ['product_id', '=', $proDecID],
                ['addon_cat_1_id', '=', $addonDecID],
            ];
            $data['addonCatTwo'] = AddonCat2::where($whereArr)
                                    ->first(['id', 'product_id', 'addon_cat_1_id', 'name', 'price', 'status']);

        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }
        return view('admin.addonCat2.view', $data);
    }

    public function edit(Request $request, $proId, $addonId, $id) {
        try {
            $data['proId'] = $proId;
            $proDecID = Crypt::decryptString($data['proId']);
            $data['addonId'] = $addonId;
            $addonDecID = Crypt::decryptString($data['addonId']);
            $decrID = Crypt::decryptString($id);

            $whereArr = [
                ['id', '=', $decrID],
                ['admin_id', '=', Auth::id()],
                ['product_id', '=', $proDecID],
                ['addon_cat_1_id', '=', $addonDecID],
            ];
            $data['addonCatTwo'] = AddonCat2::where($whereArr)
                                    ->first(['id', 'admin_id', 'product_id', 'addon_cat_1_id', 'name', 'price', 'status']);

            if($request->input()) {
                if($data['addonCatTwo']->admin_id == Auth::id() && $data['addonCatTwo']->product_id == $proDecID && $data['addonCatTwo']->addon_cat_1_id == $addonDecID) {
                    $request->validate([
                        'name' => 'required|string|max:255',
                        'price' => 'required|numeric|min_digits:1',
                    ]);
                    
                    $name = $request->input('name');
                    $price = $request->input('price');
                    $status = !empty($request->input('status')) ? 1 : 0;
        
                    if($decrID == $data['addonCatTwo']->id) {
                        $addonCat2 = AddonCat2::find($data['addonCatTwo']->id);
                        $addonCat2->name = $name;
                        $addonCat2->price = $price;
                        $addonCat2->status = $status;
                        $addonCat2->update(); 
        
                        if($addonCat2) {
                            return redirect()->route('addon.cat2', ['proId' => $proId, 'cat1Id' => $addonId])->with('success', 'Product data has been updated Successfully.');
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

        return view('admin.addonCat2.edit', $data);
    }

    public function delete($proId, $addonId, $id) {
        try {
            $proDecId = Crypt::decryptString($proId);
            $addonDecID = Crypt::decryptString($addonId);
            $decrID = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }

        try {
            $whereArr = [
                ['admin_id', '=', Auth::id()],
                ['product_id', '=', $proDecId],
                ['addon_cat_1_id', '=', $addonDecID],
            ];
            $addonData = AddonCat2::where($whereArr)->count();
            if($addonData === 1) {
                try {
                    AddonCat1::find($addonDecID)->update(['has_addon_cat'=> 0]);
                } catch (\Throwable $th) {
                    return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
                }
            }

            $addArrI = count($whereArr);
            $whereArr = Arr::add($whereArr, $addArrI, ['id', '=', $decrID]);
            
            AddonCat2::where($whereArr)->delete();

            return back()->with('warning', 'Product has been deleted.');
        } catch (\Throwable $th) {
            return back()->with('error', 'We encountered an error while deleting the records, please try again later.');
        }
    }
}
