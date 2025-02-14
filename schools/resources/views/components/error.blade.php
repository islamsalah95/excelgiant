    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
          <h2 class="mb-1 mt-4">Page Not Found :(</h2>
          <p class="mb-4 mx-2">Oops! 😖 {{$message}}</p>
          <p class="mb-4 mx-2">code: {{$code}}</p>
          <a href="{{ url()->previous() }}" class="btn btn-primary mb-4">Back</a>
          <div class="mt-4">
            <img
              src="{{asset('dash/assets/img/illustrations/page-misc-error.png')}}"
              alt="page-misc-error"
              width="225"
              class="img-fluid" />
          </div>
        </div>
      </div>
      <div class="container-fluid misc-bg-wrapper">
        <img
          src="{{asset('dash/assets/img/illustrations/bg-shape-image-light.png')}}"
          alt="page-misc-error"
          data-app-light-img="{{asset('dash/assets/img/illustrations/bg-shape-image-light.png')}}"
          data-app-dark-img="{{asset('dash/assets/img/illustrations/bg-shape-image-dark.png')}}" />
      </div>
      <!-- /Error -->





