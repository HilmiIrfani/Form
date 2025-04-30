<header class="d-flex align-items-center justify-content-between bg-white shadow-sm px-3" style="height: 60px;">
    <div class="d-flex align-items-center">
    <img src="/assets/images/AuRevoirNB2.png" alt="Logo" class="me-2" style="height: 35px; object-fit: contain;">
        <span class="fw-bold text-dark fs-5">AuRevoir</span>
        <button class="btn btn-link text-dark ms-3" id="sidebarToggle">
            <i class="bi bi-list" style="font-size: 1.5rem;"></i>
        </button>
    </div>

    <div class="d-flex align-items-center flex-grow-1 mx-3">
    <style>
    .search-input:focus {
        border-color:rgb(0, 0, 0) !important;
        box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.51) !important;
    }
</style>

        <input type="text" class="form-control search-input" placeholder="Search">
        <button class="btn btn-outline-dark ms-2">
            <i class="bi bi-search"></i>
        </button>
    </div>

    <div class="d-flex align-items-center">
        <div class="position-relative me-3">
            <i class="bi bi-bell fs-4"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">4</span>
        </div>

        <div class="position-relative me-3">
            <i class="bi bi-chat-left-text fs-4"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
        </div>

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if (session('role') == 'admin') : ?>
                    <i class="bi bi-person-badge fs-4 me-2"></i> 
                <?php else : ?>
                    <i class="bi bi-person-circle fs-4 me-2"></i> 
                <?php endif; ?>
                <span><strong><?= session('username') ?></strong> (<?= session('role') ?>)</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item text-danger" href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</header>
