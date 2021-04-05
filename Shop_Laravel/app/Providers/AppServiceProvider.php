<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Session;
use App\Models\Department;
use App\Models\Category;
use View;
use   paginate;
class AppServiceProvider extends ServiceProvider
{


  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    app()->singleton(
     Translater::class, Vietnamese::class
    );
    app()->singleton(
     ProductInterFace::class, ProductRepositories::class
    );
    app()->singleton(
     ProductNameInterFace::class, NameRepositories::class
    );
    $this->app->bind(ProductInterFace::class, ProductRepositories::class);
    $this->app->bind(ProductNameInterFace::class, NameRepositories::class);

    // view()->composer('page/Carts',function($view)
    //  {
    //     if(Session('cart'))//nếu cái session giỏ hàng là cart
    //     {
    //         //tạo 1 cái biến để kiểm tra xem giỏ hàng mình có sản phẩm nào được mua hay chưa
    //         $oldCart =Session::get('cart');//lấy cái session của cái cart hiện tại của mình gán vào cái cũ,nếu mình mua sp mới thì sản phẩm đó sẽ được thêm vào giỏ hàng,$oldCart vẫn sẽ được thêm vào giỏ hàng đó
    //         $cart = new Carts($oldCart);//để mình kiểm tra xem cái giỏ hàng mình hiện tại cso hay chưa,nếu có thì gán vào giỏ hàng mới,giỏ hàng mới sẽ gán vào $cart mới này
    //
    //      $view->with(['cart'=>Session::get('cart'),'cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQly'=>$cart->totalQty]);
    //
    //        //2 cái đầu rồi tới productcart là sản phẩm sẽ nằm trong giỏ hàng, tiếp theo là item là 1 phần thử trong giỏ hàng,có ngĩa là 1 sản phẩm:Tiếp theo là tổng tiền là totaltrỏ đến $cart rồi đến tôtllPrice,tiếp là là số lương Qly     Mấy cái biến đó có trong file Cart.php
    //         }
    //  });


  }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $department = Department::all();
      View::share('new_department',$department);
      $category = Category::all();
      View::share('new_category',$category);
      // paginate::useBootstrap();
    }



}
