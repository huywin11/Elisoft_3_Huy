<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Rating;
use App\Models\Comment;
use Hash;
use Auth;
use add;
use content;
use Carbon\Carbon;
use Session;
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
    public function getnoProduct(Request $req)
    {
      $category = new Category();
      $new_category = $category->getCategory();
      $nameListing = Category::where('id',$req->id)->get();
      return view('page.noProduct',compact('new_category','category','nameListing'));
    }
    public function getProduct()
    {
         $product = new Product();
         $new_product = $product->getProduct();
         return view('page.trangchu',compact('product'));
    }
    public function getDetailProduct(Request $req)
    {
        //dd(Session::get('view'));
        $id = $req->id;
        $department = new Department();
        $category = new Category();
        $product = new Product();
        $new_department = $department->getDepartment();
        $new_category = $category->getCategory();
        $new_product = $product->getProduct();
        $Detail = Product::where('id',$req->id)->first();
        $rating = Rating::where('product_id',$req->id)->avg('star');
        $rating = round($rating);
        $tt_Detail =Product::where('category_id',$Detail->category_id)->limit(10)->get();
        $productView =Product::where('id',$req->id)->first();
        $comment = Comment::where('comment_id',$req->id)->first();
        // $cmt = Comment::where('comment_id',$req->id)->count('cmt');
        $rating = round($rating);
          $user = Auth::user();
          $view = (Session::get('view'));
          if ($view != null && in_array($id, $view)) {

            // echo "có rồi";
            // die();
        }
        else {
            //echo "CHưa có";
            $pr = Product::find($id);
            Product::where('id', $id)->update(['view'=>$pr->view + 1]);
        };
        if(Session::get('view') == null){
           // set products.name as array
            session()->put('view', []);
            // somewhere later
            session()->push('view', $id);
        }
        else{
            $view = Session::get('view');
            session()->put('view', $view);
            session()->push('view', $id);

        }


         return view('detail',compact('Detail','rating','tt_Detail','user','productView','new_department','new_category','new_product','comment'));
    }
    public function getListingProduct(Request $req)
    {       $department = new Department();
            $category = new Category();
            $product = new Product();
            $new_department = $department->getDepartment();
            $new_category = $category->getCategory();
            $new_product = $product->getProduct();
            $rating = Rating::where('product_id',$req->id)->avg('star');
            $rating = round($rating);
            $Listing = Product::where('category_id',$req->category_id)->paginate(10);
            $nameListing = Category::where('id',$req->category_id)->first();

         return view('listing',compact('Listing','new_department','new_category','new_product','nameListing','rating'));
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
      $Products = Product::where('name','like','%'.$req->key.'%')->get();
      return   view('page.Search',compact('Products','new_department','new_category','new_product'));
    }
    public function insert_rating(Request $req)
      {
      $data  = $req->all();
      $rating = new Rating();
      $rating->product_id = $data['product_id'];
      $rating->rating =$data['index'];
      $rating->save();
      echo "done";
      }
    public function send_comment(Request $req)
      {
        print_r($req);
        $product_id  = $req->product_id;
        $comment_name = $req->comment_name;
        $comment_content = $req->comment_content;
        $comment = new comment();
        $comment->comment =$comment_content;
        $comment->comment_name =$comment_name;
        $comment->comment_product_id =$product_id;
        $comment->save();
        echo "done";
      }
      public function ajax(Request $request){
          if($request->task == 'rating'){
              $user_id = $request->user_id;
              $product_id = $request->product_id;
              $star = $request->star;
              $product_comment = $request->product_comment;
              $count = RatingProduct::where('id_product', $product_id)->where('id_user', $user_id)->count('comment');
              if($count == 0){
                  $object = new RatingProduct();
                  $user = Auth::user();
                      $object->id_product = $product_id;
                      $object->id_user = $user_id;
                      $object->star = $star;
                      $object->comment = $product_comment;
                      $object->name = $user->name;
                      $object->save();
                      echo"Cảm ơn bạn đã đánh giá và
                      nhận xét về sản phẩm !";
              }
              else echo"Bạn chỉ được rating 1 lần cho 1 sản phẩm !";
          }
      }
}
