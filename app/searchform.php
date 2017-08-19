<form role="search" method="get" id="search-form" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="form-group">
    <div class="input-group">
      <input type="search" class="form-control" placeholder="Enter a search term" value="<?php echo get_search_query() ?>" name="s">
      <div id="submit-search-form" class="input-group-addon" onClick="document.forms['search-form'].submit();"><i class="fa fa-search"></i></div>
    </div>
  </div>
</form>
