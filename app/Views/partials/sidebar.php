<!-- Sidebar-->
<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">Admin Dashboard</div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php if (isset($index) && $index == 0) echo 'active'; ?>" href="/views/admin/dataManagement.php" class="fa fa-fw fa-home">Admin Accounts</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php if (isset($index) && $index == 1) echo 'active'; ?>" href="/views/admin/attractionsManagement.php">Tourist Centre</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php if (isset($index) && $index == 2) echo 'active'; ?>" href="/views/admin/foodManagement.php">Food Tourism</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php if (isset($index) && $index == 3) echo 'active'; ?>" href="/views/admin/newsManagement.php">News and Announcements</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php if (isset($index) && $index == 4) echo 'active'; ?>" href=<?= site_url('aboutus/edit'); ?>>About Us Edit</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= site_url('logout'); ?>">Logout</a>
    </div>
</div>