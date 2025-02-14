    <!-- Notification -->
    <li class="dropdown-notifications-list scrollable-container">

        <ul class="list-group list-group-flush">

            @if ($invoiceNotifications)
                @foreach ($invoiceNotifications as $invoiceNotification)
                    @if (isset($invoiceNotification->client->name))
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-success"><i
                                                class="ti ti-shopping-cart"></i></span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Whoo! You have new order 🛒</h6>
                                    <p class="mb-0">{{ $invoiceNotification->client->name }}. made new order SR
                                        {{ $invoiceNotification->calcPrice() }}</p>
                                    <small
                                        class="text-muted">{{ $invoiceNotification->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                            class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" wire:click="deleteNotification"
                                        class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            @endif

        </ul>
    </li>

    <!--/ Notification -->
