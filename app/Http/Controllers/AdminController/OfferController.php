<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\OfferRequest;
use App\Models\Offer;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class OfferController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.offers.index', [
            'offers' => Offer::all(),
        ]);
    }


    public function store(OfferRequest $request)
    {
        Offer::query()->create([
            'code' => $request->get('code'),
            'start_at' => Offer::start_at($request),   //jalali --> miladi
            'end_at' => Offer::end_at($request),
        ]);
        return redirect(route('offer.create'))->with('success', 'کد تخفیف با موفقیت افزوده شد');
//      return redirect()->route('offer.create');
//      return redirect('offer/create');
//      return back();
    }


    public function show(Offer $offer)
    {
        //
    }


    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', [
            'offer' => $offer,
        ]);
    }


    public function update(OfferRequest $request, Offer $offer)
    {
        $offerUnique = Offer::query()->where('code', '=', $request->get('code'))->where('id', '!=', $offer->id)->exists();
        if ($offerUnique) {
            return back()->withErrors(['کد تخفیف قبلا انتخاب شده لطفا یک کد تخفیف جدید وارد نمایید']);
        }

        $offer->update([
            'code' => $request->get('code'),
            'start_at' => Offer::start_at($request),
            'end_at' => Offer::end_at($request),
        ]);
        return redirect(route('offer.create'))->with('update' , 'کد تخفیف با موفقیت به روز رسانی شد');
    }


    public function destroy(Offer $offer)
    {
        $offer->delete();
//      Offer::destroy($id);
//      Offer::query()->findOrFail($id)->delete();
//      Offer::query()->where('id' , '=' , $id)->delete();
        return redirect(route('offer.create'))->with('delete' , 'کد تخفیف با موفقیت حذف شد');
    }


}
