<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Hash;
use Auth;
use add;
use content;
use Carbon\Carbon;
use App\Services\Vietnamese;

class PageController extends Controller
{
    public function getIndex(Vietnamese $vn )
    {
      // // $tran = new Vietnamese();
      // echo $vn->toASCII("Xã Hội Này của chúng ta ");
      //   die();
      $dt = Carbon::now('Asia/Ho_Chi_Minh');
      $department = new Department();
      $category = new Category();
      $product = new Product();
      $new_department = $department->getDepartment();
      $new_category = $category->getCategory();
      $new_product = $product->getProduct();
      return view('page.trangchu',compact('new_department','new_category','new_product','dt'));
    }
    public function getnoProduct()
    {
      // // $tran = new Vietnamese();
      // echo $vn->toASCII("Xã Hội Này của chúng ta ");
      //   die();


      $category = new Category();
      $new_category = $category->getCategory();
      return view('page.noProduct',compact('new_category','category'));
    }
    public function getProduct()
    {
         $product = new Product();
         $new_product = $product->getProduct();
         return view('page.trangchu',compact('product'));
    }
    public function getDetailProduct(Request $req)
    {
        $department = new Department();
        $category = new Category();
        $product = new Product();
        $new_department = $department->getDepartment();
        $new_category = $category->getCategory();
        $new_product = $product->getProduct();
       $Detail = Product::where('id',$req->id)->first();
            // $view =Product::where('id',$req->id)->update(['view' =>('view','+',1)])->get();

       $tt_Detail =Product::where('category_id',$Detail->category_id)->limit(10)->get();

       $productView =Product::where('id',$req->id)->first();
       $productView->view =$productView->view + 1;
       // $productView->save();
         return view('detail',compact('Detail','tt_Detail','productView','new_department','new_category','new_product'));
    }
    public function getListingProduct(Request $req)
    {       $department = new Department();
            $category = new Category();
            $product = new Product();
            $new_department = $department->getDepartment();
            $new_category = $category->getCategory();
            $new_product = $product->getProduct();
         $Listing = Product::where('category_id',$req->category_id)->paginate(10);
         $nameListing = Category::where('id',$req->id)->get();
         return view('listing',compact('Listing','new_department','new_category','new_product','nameListing'));
    }
    public function getLogin()
    {
      $department = new Department();
      $category = new Category();
      $product = new Product();
      $new_department = $department->getDepartment();
      $new_category = $category->getCategory();
      $new_product = $product->getProduct();
      return  view('page.Login',compact('new_department','new_category','new_product'));
    }
    public function postLogin(Request $req)
    {

      // dd($req);
      // die();
         $this->validate($req,
           [
             'email'=> 'required|email',
             'password'=>'required|min:8|max:20'
           ],
           [
              'email.required'=>'Vui lòng nhập email',
              'email.email'=>'Vui lòng nhập đúng định dạng email',
              'password.required'=>'Vui lòng nhập mật khẩu',
              'password.min'=>'Mật khẩu ít nhất 8 kí tự',
              'password.max'=>'Mật khẩu quá dài'

           ]
         );

         $data = [
            'email'=>$req->email,
            'password'=>$req->password,
        ];
         // echo $req->email;die();
         if(Auth::attempt($data))
         {
          return redirect()->route('index')->with(['thanhcong','Đăng nhập thành công']);
         }
         else
         {
            return redirect()->route('login');
         }

    }

    public function getRegister()
    {
      $department = new Department();
      $category = new Category();
      $product = new Product();
      $new_department = $department->getDepartment();
      $new_category = $category->getCategory();
      $new_product = $product->getProduct();
      return  view('page.Register',compact('new_department','new_category','new_product'));
    }
    public function postRegister(Request $req)
    {
         $this->validate($req,
           [
             'email'=> 'required|email|unique:nn_user,email',
             'password'=>'required|min:8|max:20',
             'mobile'=>'required',
             're_password'=>'required|same:password',
             'fullname'=>'required',
             'address'=>'required|min:10|max:20',
           ],
           [
              'email.required'=>'Vui lòng nhập email',
              'email.email'=>'Vui lòng nhập đúng định dạng email',
              'email.unique'=>'Email đã có người dùng',
              'password.required'=>'Vui lòng nhập mật khẩu',
              're_password.same'=>'Mật khẩu không trùng nhau',
              'password.min'=>'Mật khẩu ít nhất 8 kí tự',
              'address.min'=>'Phải hơn 10 kí tự'

           ]
         );
         $user = new User();
         $user->password = Hash::make($req->password);
         $user->email  =$req->email ;
         $user->name =$req->fullname;
         $user->mobile =$req->mobile;
         $user->address =$req->address;
          // $user->dob =2021;
          $user->gender =1;
          $user->group_id =1;
          $user->active =1;
         $user->save();
         return redirect()->route('login')->with('thanhcong','Bạn đã tạo tài khoản thành công');
    }
    public function getLogout()
    {
      Auth::logout();
      return redirect()->route('index');
    }


    public function getCart(Request $req, $id)
    {   $Product = Product::all();
      $department = new Department();
      $category = new Category();
      $product = new Product();
      $new_department = $department->getDepartment();
      $new_category = $category->getCategory();
      $new_product = $product->getProduct();
      //   if(Session('cart'))
      // {
      //   $oldCart = Session::get('cart');
      //   $cart = new Cart($oldCart);
      // }
      $product =Product::find($id);
      if($req->qty)
      { $qty = $req->qty;}
      else{
        $qty =1;
      }
      $price=$product->price;
      $img_url=$product->img_url;
      $cart =['id'=>$id,'name'=>$product->name,'qty'=>$qty,'price'=>$price,'img_url'=>$product->img_url];
      // Cart::add($cart);
      // dd($cart);

          $total = $price * $qty;

         $Listing = Product::where('category_id',$req->category_id)->paginate(10);
         return view('page.Cart',compact('Product','new_department','new_category','new_product','Listing','product','qty','price','cart','img_url','total'));
    }
    public function getSearch(Request $req){
      //tìm kiếm theo tên và theo giá
      $department = new Department();
      $category = new Category();
      $product = new Product();
      $new_department = $department->getDepartment();
      $new_category = $category->getCategory();
      $new_product = $product->getProduct();
      $Products = Product::where('name','like','%'.$req->key.'%')->get();//tìm theo tên,phương thức là like,nếu có sản phẩm trong key(Key là name của thanh search) thì nó sẽ return ra.  //phương thức like phải đi kèm với % để tìm theo từ khóa chứ không cần đúng y tên,dùng nối chuỗi để nối % vs keywork
                        //lấy hết dữ liệu ra và. đổ về 1 trang mới thì viết bên dưới
      return   view('page.Search',compact('Products','new_department','new_category','new_product'));//trả về page search và mình truyền dữ liệu của mình về có tên là product

    }
}
