<li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
    @livewire('notification.read-notification')
    <ul class="dropdown-menu dropdown-menu-end py-0">
        <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">Notification</h5>
                <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                        class="ti ti-mail-opened fs-4"></i></a>
            </div>
        </li>

        @livewire('notification.index')

        @livewire('notification.delete-notification')

    </ul>
</li>
