        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                fill="#7367F0" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                fill="#7367F0" />
                        </svg>
                    </span>
                    <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                    <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">


                <!-- Dashboards -->
                <li class="menu-item active">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i> <!-- Home Icon -->
                        <div data-i18n="Dashboards">Dashboards</div>
                    </a>
                </li>
                <!-- Dashboards -->

                <!-- Components -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Pages</span>
                </li>
                <!-- Components -->






                <!-- contacts -->
                <li class="menu-item {{ route_is('contacts.*', 'open') }}" id="contacts">
                    <a href="{{ router('contacts.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-phone"></i>
                        <div data-i18n="{{ __('contacts/index.main_titel') }}">
                            {{ __('contacts/index.main_titel') }}</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('contacts.index', 'active') }}">
                            <a href="{{ router('contacts.index') }}" class="menu-link">
                                <div data-i18n="{{ __('contacts/index.main_titel') }}">
                                    {{ __('contacts/index.main_titel') }}
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- side_bar -->

                <!-- Languages -->
                <li class="menu-item {{ route_is('languages.*', 'open') }}" id="languages">
                    <a href="{{ router('languages.index', ['slug' => 'home']) }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-language"></i> <!-- Languages Icon -->
                        <div data-i18n="{{ __('languages/index.main_titel') }}">
                            {{ __('languages/index.main_titel') }}</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        @foreach ($translationFiles as $translationFile)
                            <li class="menu-item">
                                <a href="{{ router('languages.index', ['slug' => $translationFile]) }}"
                                    class="menu-link">
                                    <div data-i18n="{{ $translationFile }}">{{ $translationFile }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <!-- Languages -->

                <!-- Settings -->
                <li class="menu-item {{ route_is('settings.*', 'open') }}" id="settings">
                    <a href="{{ router('settings.edit') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-settings"></i> <!-- Settings Icon -->
                        <div data-i18n="{{ __('settings/edit.main_titel') }}">{{ __('settings/edit.main_titel') }}
                        </div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('settings.edit', 'active') }}">
                            <a href="{{ router('settings.edit') }}" class="menu-link">
                                <div data-i18n="{{ __('settings/edit.sub_titel') }}">
                                    {{ __('settings/edit.sub_titel') }}</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Settings -->

                <!-- Roles -->
                <li class="menu-item {{ route_is('roles.*', 'open') }}" id="roles">
                    <a href="{{ router('roles.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-shield-lock"></i> <!-- Roles Icon -->
                        <div data-i18n="{{ __('roles/index.main_titel') }}">{{ __('roles/index.main_titel') }}</div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('roles.index', 'active') }}">
                            <a href="{{ router('roles.index') }}" class="menu-link">
                                <div data-i18n="{{ __('roles/index.main_titel') }}">
                                    {{ __('roles/index.main_titel') }}
                                </div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('roles.create', 'active') }}">
                            <a href="{{ router('roles.create') }}" class="menu-link">
                                <div data-i18n="{{ __('roles/create.title.sub') }}">
                                    {{ __('roles/create.title.sub') }}
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Roles -->

                <!-- Admins -->
                <li class="menu-item {{ route_is('admins.*', 'open') }}" id="admins">
                    <a href="{{ router('admins.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i> <!-- Admins Icon -->
                        <div data-i18n="{{ __('admins/index.main_titel') }}">{{ __('admins/index.main_titel') }}
                        </div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('admins.index', 'active') }}">
                            <a href="{{ router('admins.index') }}" class="menu-link">
                                <div data-i18n="{{ __('admins/index.main_titel') }}">
                                    {{ __('admins/index.main_titel') }}</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('admins.create', 'active') }}">
                            <a href="{{ router('admins.create') }}" class="menu-link">
                                <div data-i18n="{{ __('admins/create.sub_titel') }}">
                                    {{ __('admins/create.sub_titel') }}</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Admins -->


                <!-- Admins -->
                <li class="menu-item {{ route_is('backups.*', 'open') }}" id="backups">
                    <a href="{{ router('backups.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i> <!-- Admins Icon -->
                        <div data-i18n="{{ __('backups/index.main_titel') }}">{{ __('backups/index.main_titel') }}
                        </div>
                        <div class="badge bg-primary rounded-pill ms-auto">0</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ route_is('backups.index', 'active') }}">
                            <a href="{{ router('backups.index') }}" class="menu-link">
                                <div data-i18n="{{ __('backups/index.main_titel') }}">
                                    {{ __('backups/index.main_titel') }}</div>
                            </a>
                        </li>
                        <li class="menu-item {{ route_is('backups.index.create', 'active') }}">
                            <a href="{{ router('backups.create') }}" class="menu-link">
                                <div data-i18n="{{ __('backups/index.create.sub_titel') }}">
                                    {{ __('backups/index.create.sub_titel') }}</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- backups -->


            </ul>
        </aside>
        <!-- / Menu -->
