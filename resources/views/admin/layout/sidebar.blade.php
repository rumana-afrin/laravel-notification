<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Alerts</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

        {{-- end settings --}}

      <li class="nav-heading">Profile</li>
        <li class="nav-item">
            <a class="nav-link {{ @$parentAdminShowCalass ? '' : 'collapsed' }}"
                data-bs-target="#profile-setting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Profile Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="profile-setting-nav" class="nav-content collapse {{ @$parentAdminShowCalass }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('web/admin.edit.profile') }}" class="{{ @$parentAdminActiveCalass }}">

                        <i class="bi bi-circle"></i><span>My Profile</span>
                    </a>
                </li>

            </ul>
        </li>
        <!-- End Profile Page Nav -->

        <!-- start Items Page Nav -->
        <li class="nav-heading">Items</li>
        <li class="nav-item">
            <a class="nav-link {{ @$parentItemShowCalass ? '' : 'collapsed' }}"
                data-bs-target="#item-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Items</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="item-nav" class="nav-content collapse {{ @$parentItemShowCalass }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('web/admin.items.index') }}" class="{{ @$parentAllItemActiveCalass }}">
                        <i class="bi bi-circle"></i><span>All Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('web/admin.items.create') }}" class="{{ @$parentAddItemActiveCalass }}">
                        <i class="bi bi-circle"></i><span>Add Items</span>
                    </a>
                </li>

            </ul>
        </li>
        <!-- End Items Page Nav -->




    </ul>

</aside>
