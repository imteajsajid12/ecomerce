  <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('backend/assets/img/sidebar-1.jpg') }}">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo"><a href="" class="simple-text logo-normal">
         Male Fashon

          </a></div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item active  ">
              <a class="nav-link" href="{{ asset('admin/home') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{ asset('admin/add_product') }}">
                  <i class="material-icons">library_books</i>
                  <p>Add product</p>
                </a>
              </li>

            <li class="nav-item ">
              <a class="nav-link" href="{{ asset('admin/product_table') }}">
                <i class="material-icons">content_paste</i>
                <p>Product List</p>
              </a>
            </li>

            <li class="nav-item ">
              <a class="nav-link" href="{{ asset('admin/order') }}">
                <i class="material-icons">location_ons</i>

                <p>Order</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ asset('admin/contacts') }}">
                <i class="material-icons">bubble_chart</i>
                <p>Contacts</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ asset('admin/sell') }}">
                <i class="material-icons">Total Sell</i>
                <p>Total Sell</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="">
                <i class="material-icons">language</i>
                <p>RTL Support</p>
              </a>
            </li>

          </ul>
        </div>
      </div>