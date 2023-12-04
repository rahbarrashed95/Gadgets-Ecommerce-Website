<?php

namespace App\Http\Controllers\WEB\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\AboutUs;
use App\Models\ChildCategory;
use App\Models\FlashSaleProduct;
use App\Models\FooterLink;
use App\Models\Footer;
use App\Models\CustomPage;
use App\Models\FlashSale;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status', 1)->get();
        // dd($slider);
        $offer = AboutUs::find('2');
        $feateuredCategories = featuredCategories();
         $popularCats = popularCategories();
    $popularProducts = [];

    foreach ($popularCats as $pCats) {
        $poProducts = Product::where('category_id', $pCats->category_id)->where('status', 1)->limit(12)->latest()->get();
        $popularProducts[$pCats->category_id] = $poProducts;
    }

        // dd($popularCats);
        // dd($feateuredCategories);
        $products = Product::with(['category', 'subCategory', 'childCategory'])
                                        ->latest()
                                        ->take(25)
                                        ->get();
        $comp_pro = Product::latest()->get();

        $products = Product::with('category', 'subCategory', 'childCategory', 'brand')
                                ->whereHas('brand', function($q){
                                    $q->whereSlug(request('slug'));
                                })
                                ->get();
        $cat_wise_prod = Category::with('subCategories', 'products', 'activeSubCategories')
                            ->has('products')
                            ->where('status', 1)
                            ->latest()
                            ->get();

                            // dd($cat_wise_prod);
        $about = DB::table('about_us')->first();
        // dd($about);
        // dd($about);

        $flashSell = FlashSaleProduct::with('product')->limit(10)->where('status', 1)->latest()->get();
        $firstColumns  = FooterLink::where('column', 1)->get();
        $secondColumns = FooterLink::where('column', 2)->get();
        $thirdColumns  = FooterLink::where('column', 3)->get();
        $recomended = Product::where('is_recomended', 1)->get();
        // dd($recomended);
        $new_arrival = Product::where('status', 1)->latest()->limit(12)->get();
        // dd($new_arrival);
        $title  = Footer::first();
        $brands = Brand::where('status', 1)->get();
        $all_brands = Brand::all();
        $cart = session()->get('cart', []);
        
        $topSellingProducts = Product::select('products.*', DB::raw('SUM(order_products.qty) as total_sold'))
    ->join('order_products', 'products.id', '=', 'order_products.product_id')
    ->groupBy('products.id')
    ->orderByDesc('total_sold')
    ->take(12) // Limit the result to the top 12
    ->get();
    
    // $hotItems = Product::select('products.*', DB::raw('SUM(order_products.qty) as total_sold'))
    // ->join('order_products', 'products.id', '=', 'order_products.product_id')
    // ->groupBy('products.id')
    // ->orderByDesc('total_sold')
    // ->orderByDesc('order_products.created_at') // Order by the most recent sales
    // ->take(12)
    // ->get();
    $hotItems = Product::whereNotNull('offer_price')->where('status', 1)->limit(12)->latest()->get();
    // dd($hotItem);
    // dd($hotItems);

        // dd($topSellingProducts);
        // dd($most_sell);
        
        $brandwise = Product::with('category', 'subCategory', 'childCategory', 'brand')
                                ->whereHas('brand', function($q){
                                    $q->whereSlug(request('slug'));
                                })
                                ->get();
                                
        $all_brand_product = Product::where('brand_id',  '>',  0)->get();
        // dd($all_brand_product);
        
        $flashSale = FlashSale::first(); // Retrieve the flash sale details
        $endTime = $flashSale->end_time;

        return view('frontend.home.index', compact(
                'all_brand_product', 'brandwise', 'endTime',
                'slider', 'feateuredCategories', 'products',
                'firstColumns',
                'secondColumns',
                'thirdColumns',
                'title',
                'brands',
                'flashSell',
                'cat_wise_prod',
                'cart',
                'comp_pro',
                'about',
                'popularCats',
                'poProducts',
                'popularProducts',
                'offer',
                'recomended',
                'new_arrival', 
                'topSellingProducts', 
                'hotItems',
                'all_brands'
        ));
    }

    public function subCategoriesByCategory(Request $request)
    {
        if($request->type == 'subcategory')
        {
            $id = Category::whereSlug($request->slug)->first()->id;
            $categories = SubCategory::where(['category_id' => $id])->get();
            if($categories->count() <= 0)
            {
                return redirect()->route('front.shop', ['slug'=> $request->slug ] );
            }

            return view('frontend.category.sub-category', compact('categories'));
        }
        else if($request->type == 'childcategory')
        {
            $id = SubCategory::whereSlug($request->slug)->first()->id;
            $categories = ChildCategory::where(['sub_category_id' => $id])->get();
            if($categories->count() <= 0)
            {
                return redirect()->route('front.shop', ['slug'=> $request->slug ] );
            }

            return view('frontend.category.child-category', compact('categories'));
        }

    }
    
public function offers_product(Request $request) {
    
    $offers_products = Product::where('offer_price', '!=', null)->get();
    return view('frontend.shop.offers', compact('offers_products'));
}    

public function shop(Request $request, $slug = null)
{
    $data = null;

    if (!empty($slug)) {
        $data = Category::with('products')->whereSlug($slug)->first();

        if (!$data) {
            $data = SubCategory::with('products')->whereSlug($slug)->first();
        }

        if (!$data) {
            $data = ChildCategory::with('products')->whereSlug($slug)->first();
        }
    }

    if ($data instanceof Category || $data instanceof SubCategory || $data instanceof ChildCategory) {
        $products = $data->products;
        $brands = $data->products->pluck('brand')->unique();
        // dd($brands);
    } else {
        $products = Product::with(['category', 'subCategory', 'brand', 'childCategory'])->take(30)->get();
        $brands = Product::distinct('brand_id')->pluck('brand_id')->toArray();
        $brands = Brand::whereIn('id', $brands)->get();
        // dd($brands);
    }

    // Apply price range filter
    $minPrice = $products->min('price');
    $maxPrice = $products->max('price');

    $minPriceFilter = $request->input('min_price', $minPrice);
    $maxPriceFilter = $request->input('max_price', $maxPrice);

    $filteredProducts = $products->whereBetween('price', [$minPriceFilter, $maxPriceFilter]);

    // Apply availability filter
    $inStock = $request->input('in_stock');
    $outOfStock = $request->input('out_of_stock');

    if ($request->input('in_stock')) {
        $filteredProducts = $filteredProducts->where('qty', '>', 0);
    }

    if ($request->input('out_of_stock')) {
        $filteredProducts = $filteredProducts->where('sold_qty', '==', 'qty');
    }

    return view('frontend.shop.index', compact('filteredProducts', 'data', 'minPrice', 'maxPrice', 'brands'));
}

    public function mostSellingProducts()
    {
        $products = Product::with(['category', 'subCategory', 'childCategory'])
                            ->leftJoin('order_products as op','products.id','=','op.product_id')
                            ->selectRaw('products.*, COALESCE(sum(op.qty),0) total')
                            ->groupBy('products.id')
                            ->orderBy('total','desc')
                            ->take(50)
                            ->get();

        return view('frontend.shop.most-selling', compact('products'));
    }

     public function flashSellProducts(Request $request)
    {
        $data = null;


    $products = Product::with(['category', 'subCategory', 'childCategory'])->take(30)->get();
       //dd($flashProd);
    // Apply price range filter

   $minPrice = $products->min('price');
    $maxPrice = $products->max('price');

    $minPriceFilter = $request->input('min_price', $minPrice);
    $maxPriceFilter = $request->input('max_price', $maxPrice);

    $filteredProducts = $products->whereBetween('price', [$minPriceFilter, $maxPriceFilter]);

    // Apply availability filter
    $inStock = $request->input('in_stock');
    $outOfStock = $request->input('out_of_stock');

    if ($request->input('in_stock')) {
        $filteredProducts = $filteredProducts->where('qty', '>', 0);
    }

    if ($request->input('out_of_stock')) {
        $filteredProducts = $filteredProducts->where('sold_qty', '==', 'qty');
    }

        $flashSell = FlashSaleProduct::with('product')->where('status', 1)->latest()->get();

        return view('frontend.shop.flash-sell', compact('flashSell', 'filteredProducts', 'minPrice', 'maxPrice'));
    }
    public function customPages($slug){
        $customPage=CustomPage::where('slug', $slug)->first();

        // dd($customPage);
        return view('frontend.pages', compact('customPage'));
    }

}
