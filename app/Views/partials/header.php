<!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="m-header">
    <a href="index.html" class="b-brand">
      <!-- ========   change your logo hear   ============ -->
      <img src="<?= base_url('assets/images/logo_ayam_nangkring.svg') ?>" alt="" class="logo logo-lg" />
    </a>
    <!-- ======= Menu collapse Icon ===== -->
    <div class="pc-h-item">
      <a href="#" class="pc-head-link head-link-secondary m-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </div>
  </div>
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
    <div class="me-auto pc-mob-drp">
      <ul class="list-unstyled">
        <li class="pc-h-item header-mobile-collapse">
          <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="dropdown pc-h-item d-inline-flex d-md-none">
          <a class="pc-head-link head-link-secondary dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
            role="button" aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-search"></i>
          </a>
          <div class="dropdown-menu pc-h-dropdown drp-search">
            <form class="px-3">
              <div class="form-group mb-0 d-flex align-items-center">
                <i class="ti ti-search"></i>
                <input type="search" class="form-control border-0 shadow-none" placeholder="Search here..." />
              </div>
            </form>
          </div>
        </li>
      </ul>
    </div>
    <!-- [Mobile Media Block end] -->
    <div class="ms-auto">
      <ul class="list-unstyled">

        <li class="pc-h-item">
          <label class="pc-head-link head-link-secondary arrow-none me-0">
            <input type="checkbox" id="p_dark_mode" class="d-none">
            <i class="ti ti-sun" id="p_mode_icon"></i>
          </label>
        </li>

        <li class="dropdown pc-h-item header-user-profile">
          <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0" href="<?= site_url('/logout') ?>"
            role="button" aria-haspopup="false" aria-expanded="false">
            <img src="<?= base_url('assets/images/logo_ayam_nangkring.jpg') ?>" alt="user-image" class="user-avtar" />
            <span>
              <i class="ti ti-logout"></i>
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</header>
<!-- [ Header ] end -->