<link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
@csrf
<x-bladewind::modal
    backdrop_can_close="false"
    name="form-mode"
    ok_button_action="saveProfile()"
    ok_button_label="Update"
    close_after_action="false"
    center_action_buttons="true">

    <form method="post" action="" class="profile-form">
        @csrf
        <b class="mt-0">Edit Your Profile</b>
        <div class="grid grid-cols-2 gap-4 mt-6">
            <x-bladewind::input required="true" name="first_name"
                error_message="Please enter your first name" label="First name" />

            <x-bladewind::input required="true" name="last_name"
                 error_message="Please enter your last name" label="Last name" />
        </div>
        <x-bladewind::input required="true" name="email"
             error_message="Please enter your email" label="Email address" />

        <x-bladewind::input numeric="true" name="mobile" label="Mobile" />
    </form>

</x-bladewind::modal>


