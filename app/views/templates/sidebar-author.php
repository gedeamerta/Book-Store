 <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $data['validate'] == "Author_validate" ? baseurl . '/author/dashboard' : (($data['validate'] == 'Admin_validate') ? baseurl . '/admin/dashboard' : '') ?>">
             <div class="sidebar-brand-icon rotate-n-15">
                 <i class="fas fa-book"></i>
             </div>
             <div class="sidebar-brand-text mx-3">Book Media</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item <?= $data['set_active'] == 'dashboard' ? 'active' : '' ?>">
             <a class="nav-link" href="<?= $data['validate'] == 'Author_Validate' ? baseurl . '/author/dashboard' : (($data['validate'] == 'Admin_Validate') ? baseurl . '/admin/dashboard' : '') ?>">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
             Interface
         </div>

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item <?= $data['set_active'] == 'forms' ? 'active' : '' ?>">
             <a class="nav-link collapsed" href="<?= $data['validate'] == 'Author_Validate' ? baseurl . '/author/forms' : (($data['validate'] == 'Admin_Validate') ? baseurl . '/admin/forms' : '') ?>" data-toggle=" collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-keyboard"></i>
                 <span>Forms</span>
             </a>
         </li>

         <?php if ($data['validate'] == 'Admin_Validate') : ?>
             <li class="nav-item <?= $data['set_active'] == 'delete' ? 'active' : '' ?>">
                 <a class="nav-link collapsed" href="<?= baseurl; ?>/admin/delete" data-toggle=" collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                     <i class="fas fa-fw fa-trash-alt"></i>
                     <span>Delete</span>
                 </a>
             <?php else : ?>
                 <a style="display:none;" class="nav-link collapsed" href="<?= baseurl; ?>/admin/delete" data-toggle=" collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                     <i class="fas fa-fw fa-trash-alt"></i>
                     <span>Delete</span>
                 </a>
             </li>
         <?php endif; ?>
     </ul>
     <!-- End of Sidebar -->