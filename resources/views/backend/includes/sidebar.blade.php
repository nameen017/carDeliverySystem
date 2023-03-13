<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link" target="_blank">
    <img src="{{ asset('backend/layout/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Car Delivery System</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('backend/layout/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <?php $authUser = Auth::user(); //dd(Auth::user()->roles); ?>
        <a href="#" class="d-block">{{ (!empty($authUser)? $authUser->name : '') }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                                
        <li class="nav-item">
          <a href="{{ route('car.index') }}" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>Car</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('car-model.index') }}" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>Car Model</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('zone.index') }}" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>Zone</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('location.index') }}" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>Location</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('customer.index') }}" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>Customer</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('delivery-transaction.index') }}" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>Delivery Transaction</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a  href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i> logout
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>