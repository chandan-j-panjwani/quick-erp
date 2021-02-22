<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASEPAGES; ?>index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Quick ERP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $sideBarSection == 'dashboard' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= BASEPAGES; ?>index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Categories Collapse Menu -->
    <li class="nav-item <?= $sideBarSection == 'category' ? 'active' : ''; ?>">
        <a class="nav-link <?= $sideBarSection == 'category' ? '' : 'collapsed'; ?>" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="<?= $sideBarSection == 'category' ? 'true' : 'false'; ?>" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-bars"></i>
            <span>Category</span>
        </a>
        <div id="collapseCategory" class="collapse <?= $sideBarSection == 'category' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $sideBarSubSection == 'add' && $sideBarSection == 'category' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>add-category.php">Add Category</a>
                <a class="collapse-item <?= $sideBarSubSection == 'manage' && $sideBarSection == 'category' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>manage-category.php">Manage Category</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Customer Collapse Menu -->
    <li class="nav-item <?= $sideBarSection == 'customer' ? 'active' : ''; ?>">
        <a class="nav-link <?= $sideBarSection == 'customer' ? '' : 'collapsed'; ?>" href="#" data-toggle="collapse" data-target="#collapseCustomer" aria-expanded="<?= $sideBarSection == 'customer' ? 'true' : 'false'; ?>" aria-controls="collapseCustomer">
            <i class="fas fa-fw fa-user"></i>
            <span>Customer</span>
        </a>
        <div id="collapseCustomer" class="collapse <?= $sideBarSection == 'customer' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $sideBarSubSection == 'add' && $sideBarSection == 'customer' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>add-customer.php">Add Customer</a>
                <a class="collapse-item <?= $sideBarSubSection == 'manage' && $sideBarSection == 'customer' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>manage-customers.php">Manage Customer</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Supplier Collapse Menu -->
    <li class="nav-item <?= $sideBarSection == 'supplier' ? 'active' : ''; ?>">
        <a class="nav-link <?= $sideBarSection == 'supplier' ? '' : 'collapsed'; ?>" href="#" data-toggle="collapse" data-target="#collapseSupplier" aria-expanded="<?= $sideBarSection == 'supplier' ? 'true' : 'false'; ?>" aria-controls="collapseSupplier">
            <i class="fas fa-fw fa-truck-moving"></i>
            <span>Supplier</span>
        </a>
        <div id="collapseSupplier" class="collapse <?= $sideBarSection == 'supplier' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $sideBarSubSection == 'add' && $sideBarSection == 'supplier' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>add-supplier.php">Add Supplier</a>
                <a class="collapse-item <?= $sideBarSubSection == 'manage' && $sideBarSection == 'supplier' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>manage-suppliers.php">Manage Supplier</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Product Collapse Menu -->
    <li class="nav-item <?= $sideBarSection == 'product' ? 'active' : ''; ?>">
        <a class="nav-link <?= $sideBarSection == 'product' ? '' : 'collapsed'; ?>" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="<?= $sideBarSection == 'product' ? 'true' : 'false'; ?>" aria-controls="collapseProduct">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>Product</span>
        </a>
        <div id="collapseProduct" class="collapse <?= $sideBarSection == 'product' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $sideBarSubSection == 'add' && $sideBarSection == 'product' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>add-product.php">Add Product</a>
                <a class="collapse-item <?= $sideBarSubSection == 'manage' && $sideBarSection == 'product' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>manage-product.php">Manage Product</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?= $sideBarSection == 'transaction' ? 'active' : ''; ?>">
        <a class="nav-link <?= $sideBarSection == 'transaction' ? '' : 'collapsed'; ?>" href="#" data-toggle="collapse" data-target="#collapseTransaction" aria-expanded="<?= $sideBarSection == 'transaction' ? 'true' : 'false'; ?>" aria-controls="collapseTransaction">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Transaction</span>
        </a>
        <div id="collapseTransaction" class="collapse <?= $sideBarSection == 'transaction' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $sideBarSubSection == 'purchase' && $sideBarSection == 'transaction' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>add-purchase.php">Purchase</a>
                <a class="collapse-item <?= $sideBarSubSection == 'sales' && $sideBarSection == 'transaction' ? 'active' : ''; ?>" href="<?= BASEPAGES; ?>add-sales.php">Sale</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                     <i class="fas fa-fw fa-wrench"></i>
                     <span>Utilities</span>
              </a>
              <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Utilities:</h6>
                            <a class="collapse-item" href="utilities-color.html">Colors</a>
                            <a class="collapse-item" href="utilities-border.html">Borders</a>
                            <a class="collapse-item" href="utilities-animation.html">Animations</a>
                            <a class="collapse-item" href="utilities-other.html">Other</a>
                     </div>
              </div>
       </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>