<x-basic-layout>
    <x-slot name="title">
        Edit your Profile
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
    <form method="POST" action="/save-edit" enctype="multipart/form-data"
          class="flex flex-col w-96 shadow-lg border-gray-300 border-2 rounded inline-block p-6" style="margin-left: 35%">
        @csrf

        <img src="{{ asset('storage/ProfilePictures/' . $userdata->profilepicture) }}"
             alt="{{ $userdata->name }}'s Profile Picture"
             class="w-52 h-52 ml-16">

        <!-- Image Upload Button -->
        <div>
            <x-label for="ProfilePicture" :value="__('Profile Picture')" class="mt-2.5"/>
            <x-input id="ProfilePicture" class="block my-2 w-full" type="file" name="ProfilePicture" :value="old('ProfilePicture')"
                     autofocus/>
        </div>


        <label for="name" class="mt-2">Name</label>
        <input type="text" name="name" value="{{ $userdata->name }}" class="rounded" required>


        <label for="status" class="mt-2">Status</label>
        <input type="text" name="status" value="{{ $userdata->status }}" class="rounded" required>


        <label for="gender" class="mt-6">Gender</label>
        <div class="flex flex-row">
            <input type="radio" name="gender" id="male" value="male" class="mr-1"
                   <?php echo ($userdata->gender == 'male') ? 'checked' : ''?> required>
            <label for="male">Male</label>
        </div>

        <div class="flex flex-row">
            <input type="radio" name="gender" id="female" value="female" class="mr-1"
                   <?php echo ($userdata->gender == 'female') ? 'checked' : ''?> required>
            <label for="female">Female</label>
        </div>

        <div class="flex flex-row">
            <input type="radio" name="gender" id="other" value="other" class="mr-1"
                   <?php echo ($userdata->gender == 'other') ? 'checked' : ''?> required>
            <label for="other">Other</label>
        </div>



        <div class="flex my-4">
            <x-button>
                {{ __('Save Changes') }}
            </x-button>
        </div>

        <hr class="my-6">

        <p>{{ $userdata->email }}</p>
        <p>{{ $userdata->gender }}</p>

    </form>


</x-basic-layout>
