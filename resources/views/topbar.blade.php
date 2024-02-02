<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-phone d-flex align-items-center"><span><a
                        href="tel:{{ $string = str_replace(' ', '', $settings['company_phone_number']); }}"
                        class="text-white">{{ $settings['company_phone_number'] }}</a></span></i>
            <i class="bi bi-clock d-flex align-items-center ms-4"><span>
                    {{ $settings['company_business_hours'] }}</span></i>
        </div>

        {{-- TODO: Supporto multi-lingua 
         <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>It</li>
          <li><a href="#">En</a></li>
        </ul>
      </div>  --}}


    </div>
</div>
