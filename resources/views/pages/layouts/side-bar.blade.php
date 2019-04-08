<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <!-- PRODUCT-LEFT-SIDEBAR START -->
    <div class="product-left-sidebar">
      <h2 class="left-title pro-g-page-title">Catalog</h2>
      <!-- SINGLE SIDEBAR ENABLED FILTERS START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Tìm kiếm theo giá : </span>
      <form action="{{route('page.search.price')}}" method="post">
        @csrf
        <ul class="filtering-menu">
          <li>
            Giá bắt đầu : 
            <input type="text" class="form-control" name="price_begin">
          </li>
          <li>
            Giá kết thúc : 
            <input type="text" class="form-control" name="price_finish">
          </li>
          <li>
            Tìm kiếm : 
            <button type="submit" class="btn btn-danger">Tìm kiếm</button>
          </li>
        </ul>
        </form>
      </div>
      <!-- SINGLE SIDEBAR ENABLED FILTERS END -->
      <!-- SINGLE SIDEBAR CATEGORIES START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Categories</span>
        <ul>
          <li>
            <label class="cheker">
              <input type="checkbox" name="categories" />
              <span></span>
            </label>
            <a href="#">Tops<span> (12)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="categories" />
              <span></span>
            </label>
            <a href="#">Dresses<span> (13)</span></a>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR CATEGORIES END -->
      <!-- SINGLE SIDEBAR AVAILABILITY START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Availability</span>
        <ul>
          <li>
            <label class="cheker">
              <input type="checkbox" name="availability" />
              <span></span>
            </label>
            <a href="#">In stock<span> (13)</span></a>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR AVAILABILITY END -->
      <!-- SINGLE SIDEBAR CONDITION START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Condition</span>
        <ul>
          <li>
            <label class="cheker">
              <input type="checkbox" name="condition" />
              <span></span>
            </label>
            <a href="#">new<span> (13)</span></a>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR CONDITION END -->
      <!-- SINGLE SIDEBAR MANUFACTURER START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Manufacturer</span>
        <ul>
          <li>
            <label class="cheker">
              <input type="checkbox" name="manufacturer" />
              <span></span>
            </label>
            <a href="#">Fashion Manufacturer<span> (13)</span></a>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR MANUFACTURER END -->
      <!-- SINGLE SIDEBAR PRICE START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Price</span>
        <ul>
          <li>
            <label><strong>Range:</strong><input type="text" id="slidevalue" /></label>
          </li>
          <li>
            <div id="price-range">
              
            </div>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR PRICE END -->
      <!-- SINGLE SIDEBAR SIZE START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Size</span>
        <ul>
          <li>
            <label class="cheker">
              <input type="checkbox" name="size" />
              <span></span>
            </label>
            <a href="#">S<span> (10)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="size" />
              <span></span>
            </label>
            <a href="#">m<span> (10)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="size" />
              <span></span>
            </label>
            <a href="#">l<span> (10)</span></a>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR SIZE END -->
      <!-- SINGLE SIDEBAR COLOR START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Color</span>
        <ul class="product-color-var">
          <li>
            <i class="fa fa-square color-beige"></i>
            <a href="#">Beige<span> (1)</span></a>
          </li>
          <li>
            <i class="fa fa-square color-white"></i>
            <a href="#">white<span> (2)</span></a>
          </li>
          <li>
            <i class="fa fa-square color-black"></i>
            <a href="#">black<span> (2)</span></a>
          </li>
          <li>
            <i class="fa fa-square color-orange"></i>
            <a href="#">orange<span> (5)</span></a>
          </li>
          <li>
            <i class="fa fa-square color-blue"></i>
            <a href="#">blue<span> (8)</span></a>
          </li>
          <li>
            <i class="fa fa-square color-green"></i>
            <a href="#">green<span> (3)</span></a>
          </li>
          <li>
            <i class="fa fa-square color-yellow"></i>
            <a href="#">yellow<span> (4)</span></a>
          </li>
          <li>
            <i class="fa fa-square color-pink"></i>
            <a href="#">pink<span> (6)</span></a>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR COLOR END -->
      <!-- SINGLE SIDEBAR COMPOSITIONS START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Compositions</span>
        <ul>
          <li>
            <label class="cheker">
              <input type="checkbox" name="compositions" />
              <span></span>
            </label>
            <a href="#">Cotton<span>(8)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="compositions" />
              <span></span>
            </label>
            <a href="#"> Polyester<span>(3)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="compositions" />
              <span></span>
            </label>
            <a href="#"> Viscose<span>(2)</span></a>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR COMPOSITIONS END -->
      <!-- SINGLE SIDEBAR STYLES START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Styles</span>
        <ul>
          <li>
            <label class="cheker">
              <input type="checkbox" name="styles" />
              <span></span>
            </label>
            <a href="#">Casual<span>(5)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="styles" />
              <span></span>
            </label>
            <a href="#">Dressy<span>(1)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="styles" />
              <span></span>
            </label>
            <a href="#">Girly<span>(7)</span></a>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR STYLES END -->
      <!-- SINGLE SIDEBAR PROPERTIES START -->
      <div class="product-single-sidebar">
        <span class="sidebar-title">Properties</span>
        <ul>
          <li>
            <label class="cheker">
              <input type="checkbox" name="properties" />
              <span></span>
            </label>
            <a href="#">Colorful Dress<span>(4)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="properties" />
              <span></span>
            </label>
            <a href="#">Maxi Dress <span>(1)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="properties" />
              <span></span>
            </label>
            <a href="#">Midi Dress<span>(2)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="properties" />
              <span></span>
            </label>
            <a href="#">Short Dress<span>(2)</span></a>
          </li>
          <li>
            <label class="cheker">
              <input type="checkbox" name="properties" />
              <span></span>
            </label>
            <a href="#"> Short Sleeve<span>(4)</span></a>
          </li>
        </ul>
      </div>
      <!-- SINGLE SIDEBAR PROPERTIES END -->
    </div>
    <!-- PRODUCT-LEFT-SIDEBAR END -->
    <!-- SINGLE SIDEBAR TAG START -->
    <div class="product-left-sidebar">
      <h2 class="left-title">Tags </h2>
      <div class="category-tag">
        <a href="#">fashion</a>
        <a href="#">handbags</a>
        <a href="#">women</a>
        <a href="#">men</a>
        <a href="#">kids</a>
        <a href="#">New</a>
        <a href="#">Accessories</a>
        <a href="#">clothing</a>
        <a href="#">New</a>
      </div>
    </div>
    <!-- SINGLE SIDEBAR TAG END -->
  </div>