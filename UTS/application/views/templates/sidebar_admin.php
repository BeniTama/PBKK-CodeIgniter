<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">POS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main App</li>
            <li><a class="nav-link" href="<?= base_url('cashier') ?>"><i class="fas fa-cash-register"></i> <span>Cashier</span></a></li>
            <li class="menu-header">Admin App</li>
            <li><a class="nav-link" href="<?= base_url('admin/product_list') ?>"><i class="fas fa-boxes"></i> <span>Products</span></a></li>
            <li><a class="nav-link" href="<?= base_url('admin/user_list') ?>"><i class="fas fa-user"></i> <span>Users</span></a></li>
            <li><a class="nav-link" href="<?= base_url('admin/transaction') ?>"><i class="fas fa-random"></i> <span>Transactions</span></a></li>
        </ul>
    </aside>
</div>