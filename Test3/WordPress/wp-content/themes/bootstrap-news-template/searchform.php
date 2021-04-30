<form class="search" role="search" method="get" action="<?php esc_url(home_url('/')); ?>">
  <input type="text" name="s" placeholder="Search"
  value="<?php the_search_query(); ?>"
  id="<?php esc_attr( uniqid('search-form-')); ?>">

  <button id="close" type="submit"><i class="fa fa-search"></i></button>
</form>
