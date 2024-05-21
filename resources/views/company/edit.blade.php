<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form action="{{url('/company/update/'.$company->id)}}" method="POST"  id="companyForm" enctype="multipart/form-data">
                
                            @csrf <!-- CSRF protection -->

                            <label for="logo">Company Logo:</label>
                            <input type="file" id="logo" name="logo"  ><br><br>
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                            <label for="name">Company Name:</label>
                            <input type="text" id="name" name="name"  value="{{ $company->name}}"><br><br>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email"  value="{{ $company->email}}"><br><br>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            <label for="mobile">Mobile:</label>
                            <input type="text" id="mobile" name="mobile"  value="{{ $company->mobile}}"><br><br>
                            <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
 
                            <label for="services">Services:</label><br>
                            <select id="services" name="services[]" multiple>
                                <option value="Hardware and Software Support">Hardware and Software Support.</option>
                                <option value="Network Infrastructure Management">Network Infrastructure Management.</option>
                                <option value="Network Security">Network Security.</option>
                                <option value="Mobile Device Management">Mobile Device Management.</option>
                                <option value="Data Storage and Management">Data Storage and Management.</option>
                                <option value="Cloud Services">Cloud Services.</option>
                                <option value="Cloud Services">Cloud Services.</option>
                                <option value="Cybersecurity">Cybersecurity.</option>
                                <option value="Technology Training">Technology Training.</option>
                                <!-- Add more options as needed -->
                            </select><br><br>
                            <x-input-error :messages="$errors->get('services')" class="mt-2" />

                            <label for="country">Country:</label>
                            <select id="country" name="country">
                                <option value="">Select Country</option>
                                <!-- Options will be populated dynamically -->
                            </select><br><br>
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />


                            <label for="state">State:</label>
                            <select id="state" name="state">
                                <option value="">Select State</option>
                                <!-- State options will be populated dynamically based on selected country -->
                            </select><br><br>
                            <x-input-error :messages="$errors->get('state')" class="mt-2" />

                            <label for="city">City:</label>
                            <select id="city" name="city">
                                <option value="">Select City</option>
                                <!-- City options will be populated dynamically based on selected state -->
                            </select><br><br>

                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            <label>Branch:</label><br>
                            <input type="checkbox" id="branch1" name="branches[]" value="India">
                            <label for="branch1">India </label><br>
                            <input type="checkbox" id="branch2" name="branches[]" value="US">
                            <label for="branch2">US</label><br>
                            <!-- Add more branches as needed -->

                            <br><br>
                          
                            <x-primary-button class="ms-4">
                {{ __('Submit') }}
            </x-primary-button> 
                        </form>

                        <script>
        // Fetch countries from server and populate the country dropdown
        fetch('/countries')
            .then(response => response.json())
            .then(data => {
                const countrySelect = document.getElementById('country');
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.id;
                    option.textContent = country.name;
                    countrySelect.appendChild(option);
                });
            });

        // Event listener for country change to fetch and populate states
        document.getElementById('country').addEventListener('change', function() {
            const countryId = this.value;
            const stateSelect = document.getElementById('state');
            // Clear existing options
            stateSelect.innerHTML = '<option value="">Select State</option>';
            if (countryId) {
                fetch(`/states/${countryId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(state => {
                            const option = document.createElement('option');
                            option.value = state.id;
                            option.textContent = state.name;
                            stateSelect.appendChild(option);
                        });
                    });
            }
        });

        // Event listener for state change to fetch and populate cities
        document.getElementById('state').addEventListener('change', function() {
            const stateId = this.value;
            const citySelect = document.getElementById('city');
            // Clear existing options
            citySelect.innerHTML = '<option value="">Select City</option>';
            if (stateId) {
                fetch(`/cities/${stateId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.id;
                            option.textContent = city.name;
                            citySelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
              
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

