<style type="text/css">
    .a-admin .bs-stepper-header button.step-trigger {
        width: 100% !important;
        justify-content: flex-start !important;
    }

    .v-admin a.delete-software {
        color: #FFF !important;
    }
</style>
<div class="bs-stepper-header">
    <div class="step" data-target="#account-details-vertical">
        <button
            data-create="{{ !empty($current_route) ? $current_route == 'manage_listing.create' || $current_route == 'listing.create' : 0 }}"
            data-url="{{ !empty($listing) && $listing->getMeta('is_information') == 1 ? (auth()->user()->is_admin() ? url('admin/listing/information/' . $listing->id) : url('vendor/listing/information/' . $listing->id)) : '' }}"
            type="button" class="step-trigger"
            {{ empty($type) ? '' : ($type == 'information' ? '' : 'disabled="disabled"') }}>
            <span class="bs-stepper-circle">
                <i class="ti ti-device-desktop-exclamation"></i>
            </span>
            <span class="bs-stepper-label">
                <span class="bs-stepper-title">Software information</span>
                <span class="bs-stepper-subtitle">Setup Software Details2</span>
            </span>
        </button>
    </div>
    <div class="line"></div>
    <div class="step {{ empty($listing) ? 'menu_disabled' : '' }}" data-depend="Software Information"
        data-target="#personal-info-vertical">
        <button
            data-url="{{ !empty($listing) && $listing->getMeta('is_information') == 1 ? (auth()->user()->is_admin() ? url('admin/listing/description/' . $listing->id) : url('vendor/listing/description/' . $listing->id)) : '' }}"
            type="button"
            {{ !empty($listing) && $listing->getMeta('is_information') == 1 ? '' : 'disabled="disabled"' }}
            class="step-trigger">
            <span class="bs-stepper-circle">
                <i class="ti ti-file-text"></i>
            </span>
            <span class="bs-stepper-label">
                <span class="bs-stepper-title">Description</span>
                <span class="bs-stepper-subtitle">Add Description</span>
            </span>
        </button>
    </div>
    <div class="line"></div>
    <div class="step {{ empty($listing) ? 'menu_disabled' : '' }}" data-depend="Software Information"
        data-target="#social-links-vertical">
        <button
            data-url="{{ !empty($listing) && $listing->getMeta('is_information') == 1 ? (auth()->user()->is_admin() ? url('admin/listing/features/' . $listing->id) : url('vendor/listing/features/' . $listing->id)) : '' }}"
            type="button"
            {{ !empty($listing) && $listing->getMeta('is_information') == 1 ? '' : 'disabled="disabled"' }}
            class="step-trigger">
            <span class="bs-stepper-circle">
                <i class="ti ti-list"></i>
            </span>
            <span class="bs-stepper-label">
                <span class="bs-stepper-title">Features</span>
                <span class="bs-stepper-subtitle">Add Features</span>
            </span>
        </button>
    </div>
    <div class="line"></div>
    <div class="step {{ empty($listing) ? 'menu_disabled' : '' }}" data-depend="Software Information"
        data-target="#social-links-vertical">
        <button
            data-url="{{ !empty($listing) && $listing->getMeta('is_information') == 1 ? (auth()->user()->is_admin() ? url('admin/listing/media/' . $listing->id) : url('vendor/listing/media/' . $listing->id)) : '' }}"
            type="button"
            {{ !empty($listing) && $listing->getMeta('is_information') == 1 ? '' : 'disabled="disabled"' }}
            class="step-trigger">

            <span class="bs-stepper-circle">
                <i class="ti ti-file-delta"></i>
            </span>
            <span class="bs-stepper-label">
                <span class="bs-stepper-title">Media</span>
                <span class="bs-stepper-subtitle">Add Media</span>
            </span>
        </button>
    </div>
    <div class="line"></div>
    <div class="step {{ empty($listing) ? 'menu_disabled' : '' }}" data-depend="Software Information"
        data-target="#social-links-vertical">
        <button
            data-url="{{ !empty($listing) && $listing->getMeta('is_information') == 1 ? (auth()->user()->is_admin() ? url('admin/listing/destination/' . $listing->id) : url('vendor/listing/destination/' . $listing->id)) : '' }}"
            type="button"
            {{ !empty($listing) && $listing->getMeta('is_information') == 1 ? '' : 'disabled="disabled"' }}
            class="step-trigger">

            <span class="bs-stepper-circle">
                <i class="ti ti-link"></i>
            </span>
            <span class="bs-stepper-label">
                <span class="bs-stepper-title">Destination URLs</span>
                <span class="bs-stepper-subtitle">Setup Destination URLs</span>
            </span>
        </button>
    </div>
    <div class="line"></div>
    <div class="step {{ empty($listing) ? 'menu_disabled' : '' }}" data-depend="Software Information"
        data-target="#social-links-vertical">
        <button
            data-url="{{ !empty($listing) && $listing->getMeta('is_information') == 1 ? (auth()->user()->is_admin() ? url('admin/listing/pricing/' . $listing->id) : url('vendor/listing/pricing/' . $listing->id)) : '' }}"
            type="button"
            {{ !empty($listing) && $listing->getMeta('is_information') == 1 ? '' : 'disabled="disabled"' }}
            class="step-trigger">

            <span class="bs-stepper-circle">
                <i class="ti ti-coin"></i>
            </span>
            <span class="bs-stepper-label">
                <span class="bs-stepper-title">Pricing</span>
                <span class="bs-stepper-subtitle">Add Pricing & plans</span>
            </span>
        </button>
    </div>
    <div class="line"></div>
    <div class="step {{ empty($listing) ? 'menu_disabled' : '' }}" data-depend="Software Information"
        data-target="#social-links-vertical">
        <button
            data-url="{{ !empty($listing) && $listing->getMeta('is_information') == 1 ? (auth()->user()->is_admin() ? url('admin/listing/integration/' . $listing->id) : url('vendor/listing/integration/' . $listing->id)) : '' }}"
            type="button"
            {{ !empty($listing) && $listing->getMeta('is_information') == 1 ? '' : 'disabled="disabled"' }}
            class="step-trigger">

            <span class="bs-stepper-circle">
                <i class="ti ti-code"></i>
            </span>
            <span class="bs-stepper-label">
                <span class="bs-stepper-title">Integration & API</span>
                <span class="bs-stepper-subtitle">Add Integration & API</span>
            </span>
        </button>
    </div>
    <div class="line"></div>
    <div class="step {{ empty($listing) ? 'menu_disabled' : '' }}" data-depend="Software Information"
        data-target="#social-links-vertical">
        <button
            data-url="{{ !empty($listing) && $listing->getMeta('is_information') == 1 ? (auth()->user()->is_admin() ? url('admin/listing/training/' . $listing->id) : url('vendor/listing/training/' . $listing->id)) : '' }}"
            type="button"
            {{ !empty($listing) && $listing->getMeta('is_information') == 1 ? '' : 'disabled="disabled"' }}
            class="step-trigger">

            <span class="bs-stepper-circle">
                <i class="ti ti-headset"></i>
            </span>
            <span class="bs-stepper-label">
                <span class="bs-stepper-title">Support Training</span>
                <span class="bs-stepper-subtitle">Add Support details</span>
            </span>
        </button>
    </div>


    @if (!empty($listing) && $listing->status == 0 && auth()->user()->is_admin())
        <a href="javascript:void(0)" class="btn btn-danger delete-software d-block mt-3"
            data-id="{{ $listing->id ?? '' }}">Delete Software</a>
        <a href="javascript:void(0)" class="btn btn-primary status_change d-block mt-3" data-action="1"
            data-id="{{ $listing->id ?? '' }}">Approve</a>
        <a href="javascript:void(0)" class="btn btn-danger status_change d-block mt-3" data-action="0"
            data-id="{{ $listing->id ?? '' }}">Decline</a>
    @endif

</div>
<div class="bs-stepper-content">
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
