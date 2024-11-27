<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


      <li class="nav-heading">Profile</li>
        <li class="nav-item">
            <a class="nav-link {{ @$parentUserShowCalass ? '' : 'collapsed' }}"
                data-bs-target="#profile-setting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Profile Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="profile-setting-nav" class="nav-content collapse {{ @$parentUserShowCalass }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('user') }}" class="{{ @$parentUserActiveCalass }}">
                        <i class="bi bi-circle"></i><span>My Profile</span>
                    </a>
                </li>

            </ul>
        </li>
      <li class="nav-heading">Items</li>
        <li class="nav-item">
            <a class="nav-link {{ @$parentItemShowCalass ? '' : 'collapsed' }}"
                data-bs-target="#item-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Items</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="item-nav" class="nav-content collapse {{ @$parentItemShowCalass }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('items.index') }}" class="{{ @$parentAllItemActiveCalass }}">
                        <i class="bi bi-circle"></i><span>All Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('items.create') }}" class="{{ @$parentAddItemActiveCalass }}">
                        <i class="bi bi-circle"></i><span>Add Items</span>
                    </a>
                </li>

            </ul>
        </li>
        <!-- End Profile Page Nav -->

      
        <!-- End Manage Admin Nav -->



    </ul>

</aside>
