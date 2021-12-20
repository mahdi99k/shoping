<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductSearchController extends Controller
{

    public function fetchData(Request $request)
    {
        $value = $request->get('value'); //ajax value
        //امنیت بالا | جلوگیری کد جاوااکریپت | patern = validation | replacement = string | subject = value
        $value = preg_replace('[a-zA-Zالف-ی]', '', $value);
        $result = '';  //show html

        if ($value != null) {
            //اول بیا اسم محصولات بگیر و سرچ اول و وسط و آخر کلمات داشته باش | بیا از طریق آیدی بگیر از آخر نمایش بده محصولات و ممکن تعداد زیاد باش ده تا ده تا
            $data = Product::query()->where('name', 'like', '%' . $value . '%')->orderBy('id', 'desc')->paginate(10);
        } else {
            $data = Product::query()->orderBy('id', 'desc');  //آیدی محصول بگیر و آخری
        }

        $total_products = $data->count(); //تعداد سرچ محصول

        foreach ($data as $getRow) {         //$result.= بیا پر بکن این مقدار یا آپدیت کن ی مقدار
            $result .= '

            <tr>

              <td>
                <a href="/productDetails/' . $getRow->slug . '" >
                   <img src="' . str_replace('public/image-products/', 'storage/image-products/', $getRow->image) . '" width="70" height="70" />
                </a>
              </td>

              <td>
                <a style="color: deepskyblue;font-size:13px " href="productDetails/' . $getRow->slug . '" >' . $getRow->name . '</a>
              </td>

            </tr>';
        }

        $data = array(
            'table_data' => $result, //code html
            'total_products' => $total_products, //count
        );

        return response()->json($data);

    }

}
