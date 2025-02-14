<a
class="nav-link dropdown-toggle hide-arrow"
href="javascript:void(0);"
data-bs-toggle="dropdown"
data-bs-auto-close="outside"
aria-expanded="false"
wire:click.prevent="readNotification"
  >
  <i class="ti ti-bell ti-md"></i>
  <span class="badge bg-danger rounded-pill badge-notifications">{{ $count}}</span>
</a>
