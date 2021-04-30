<?php
function display_menu()
{

   $output = '';
   $location = get_nav_menu_locations();

     // $primary_menu =get_term($location['primary']);
     // $primary_menu = null;
     if(isset($location['primary'])){
       // $primary_menu_items = wp_get_nav_menu_items($primary_menu->term_id);
        $primary_menu =get_term($location['primary']);
     }
     else{
       $primary_menu = null;
     }
     if($primary_menu != null)
     {
         $primary_menu_items = wp_get_nav_menu_items($primary_menu->term_id);
     }
     else {
       $primary_menu_items = null;
     }
      $output .="<div class='navbar-nav mr-auto'>";

         //dd($primary_menu_items);
         if(isset($primary_menu_items))
           foreach ($primary_menu_items as $item){
             if($item->menu_item_parent == 0){
               $flag = false;
               foreach ($primary_menu_items as $i)
                 if($i->menu_item_parent == $item->ID):
                  $flag = true;
                 endif;
               if($flag == false)
                  $output .='<a href="'.$item->url.'" class="nav-item nav-link active">'.$item->title.'</a>';
               else{
                  $output .='<div class="nav-item dropdown">';
                  $output .='<a href="'.$item->url.'" class="nav-link dropdown-toggle" data-toggle="dropdown">'.$item->title.'</a>';
                  $output .= '<div class="dropdown-menu">';

                       foreach ($primary_menu_items as $childItem):
                         if($childItem->menu_item_parent == $item->ID)
                           $output .='<a href="'.$childItem->url.'" class="dropdown-item">'.$childItem->title.'</a>';
                       endforeach;
                   $output .='</div></div>';
                 }
               }}
               else
           $output .='<a href="#" class="nav-item nav-link active">Home</a>';
 echo $output;

}
  // .home_url();
