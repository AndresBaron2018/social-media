<template>
	<div class="container">
		<h2 class="h3 ServicesList-title mt-5 pl-3 text-color-accedo">Access Information</h2>
		<div class="form-row">
			<div>
				<label class="font__helvetica--light title_label">Email</label>
				<input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
				<!-- <span v-show="errors.has('email')" class="help is-danger text-danger">{{ errors.first('email') }}</span> -->

			</div>
			<div>
				<label class="font__helvetica--light title_label">Password</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="Password" ref="password">
				<!-- <span v-show="errors.has('password')" class="help is-danger text-danger">{{ errors.first('password') }}</span> -->
			</div>
			<div>
				<label class="font__helvetica--light title_label">Confirm Password</label>
				<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password">
				<!-- <span v-show="errors.has('password_confirmation')" class="help is-danger text-danger">{{ errors.first('password_confirmation') }}</span> -->
			</div>
		</div>
		<h2 class="h3 ServicesList-title mt-2 pl-3 ServicesList-title text-color-accedo">Personal Information</h2>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Identification Type</label>
				<select class="form-control" id="identification_type" required>
					<option value="" selected>Please choose one</option>
					<option value="CE">CE</option>
					<option value="CC">CC</option>
					<option value="TI">TI</option>
					<option value="PA">PA</option>
					<option value="PEP">PEP</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Identification</label>
				<input type="text" class="form-control" id="id_number" required>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Gender</label>
				<select class="form-control" id="gender" required>
					<option value="" disabled>Please choose one</option>
					<option value="Female">Female</option>
					<option value="Male">Male</option>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-3">
				<label class="font__helvetica--light title_label">First Name</label>
				<input type="text" class="form-control" id="first_name" placeholder="First Name" required>
			</div>
			<div class="form-group col-md-3">
				<label class="font__helvetica--light title_label">Middle Name</label>
				<input type="text" class="form-control" id="middle_name" placeholder="Middle Name"> <!-- ddddddddddddddddddddddddddddd -->
			</div>
			<div class="form-group col-md-3">
				<label class="font__helvetica--light title_label">Last Name1</label>
				<input type="text" class="form-control" id="last_name" placeholder="Last Name 1" required>
			</div>
			<div class="form-group col-md-3">
				<label class="font__helvetica--light title_label">Last Name2</label>
				<input type="text" class="form-control" id="second_last_name" placeholder="Last Name 2">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Date of Birth</label>
				<input type="date" class="form-control" placeholder="mm/dd/yyyy" required>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Marital Status</label>
				<select class="form-control" id="marital_status" required>
					<option value="" disabled>Please choose one</option>
					<option value="Single">Single</option>
					<option value="Married">Married</option>
					<option value="Single Mother">Single Mother</option>
					<option value="Single Father">Single Father</option>
					<option value="Common law marriage">Common law marriage</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Number of Children</label>
				<input type="number" min="0" max="10" class="form-control" id="number_of_children" required>
			</div>
		</div>
		<!-- <div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Department </label>
				<select class="form-control" id="country_department" v-model="user.personal_information.department" @change="getCities()" v-bind:disabled="departmentsProcessing || (date.getDay() >= 4 && location == 'profile')" required>
					<option value="" v-if="departmentsProcessing">Loading...</option>
					<option value="" disabled>Please choose one</option>
					<option v-for="(country_department, index) in departments" :value="country_department.name" :key="index">{{ country_department.name }}</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">City</label>
				<select class="form-control" id="city" v-model="user.personal_information.city" v-bind:disabled="cityProcessing || (date.getDay() >= 4 && location == 'profile')" @change="getComuna()" required>
					<option value="" v-if="cityProcessing">Loading...</option>
					<option value="" disabled>Please choose one</option>
					<option v-for="(city, index) in cities" :value="city.name" :key="index">{{ city.name }}</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Comuna/Localidad</label>
				<select class="form-control" id="country_comuna" v-model="user.personal_information.comuna" :disabled="comunaProcessing" required>
					<option value="" disabled>Please choose one</option>
					<option v-for="(comuna, index) in comuna_propia" :value="comuna" :key="index">{{ comuna }}</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Neighborhood</label>
				<input type="text" class="form-control" v-tocapitalize id="neighborhood" placeholder="Neighborhood" :disabled="date.getDay() >= 4 && location == 'profile'" v-model="user.personal_information.neighborhood" required>
			</div>
		</div>
		<div :class="`form-row ${location == 'profile'? 'update-profile-content__sections' : ''} `">
			<div class="form-group col-md-8">
				<label class="font__helvetica--light title_label">Current Address</label>
				<input type="text" class="form-control" v-tocapitalizefirst id="address" placeholder="Current Address" v-model="user.personal_information.address" :disabled="date.getDay() >= 4 && location == 'profile'" required>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">City of birth</label>
				<input type="text" class="form-control" id="city_birth" placeholder="City of birth" v-model="user.personal_information.city_birth" required v-tocapitalize>
			</div>
		</div>
		<div :class="`form-row ${location == 'profile'? 'update-profile-content__sections' : ''} `">
			<div class="form-group col-md-6">
				<label class="font__helvetica--light title_label">Personal Phone</label>
				<input type="number" class="form-control" id="phone1" placeholder="Personal Phone" v-model="user.personal_information.phone1" :disabled="date.getDay() >= 4 && location == 'profile'" required>
			</div>
			<div class="form-group col-md-6">
				<label class="font__helvetica--light title_label">Second Contact Phone</label>
				<input type="number" class="form-control" placeholder="Second Contact Phone" id="phone2" v-model="user.personal_information.phone2 " :disabled="date.getDay() >= 4 && location == 'profile'" required>
			</div>
		</div>
		<div :class="`form-row ${location == 'profile'? 'update-profile-content__sections' : ''} `">
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Blood Type</label>
				<select class="form-control" id="blood_type" v-model="user.personal_information.blood_type" required>
					<option value="" disabled>Please choose one</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="AB">AB</option>
					<option value="O">O</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">RH</label>
				<select class="form-control" id="rh_blood" v-model="user.personal_information.rh_blood" required>
					<option value="" disabled>Please choose one</option>
					<option value="Negative">Negative</option>
					<option value="Positive">Positive</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">Socioeconomic</label>
				<select class="form-control" id="socioeconomic" v-model="user.personal_information.stratum" required>
					<option value="" disabled>Please choose one</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</div>
			<div class="form-group col-md-5">
				<label class="font__helvetica--light title_label">How many people depend economically on you</label>
				<input type="number" min="0" class="form-control" id="depend_people" v-model="user.personal_information.depend_people">
			</div>
		</div>
		<div :class="`form-row ${location == 'profile'? 'update-profile-content__sections' : ''} `">
			<div class="form-group col-md-4">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="have_transportation" v-model="user.personal_information.have_transportation" v-on:change="resetTransportation()">
					<label class="form-check-label">Do you have your own transportation?</label>
				</div>
			</div>
			<div :class="(user.personal_information.type_transportation == 'Other') ? 'form-group col-md-4':'form-group col-md-6'" :style="(user.personal_information.have_transportation == true) ? '' : 'display: none;'">
				<label class="font__helvetica--light title_label">Which?</label>
				<select class="form-control" id="type_transportation" v-model="user.personal_information.type_transportation" v-on:change="resetTransportation()">
					<option value="" disabled>Please choose one</option>
					<option value="Car">Car</option>
					<option value="Motorcycle">Motorcycle</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div :class="(user.personal_information.type_transportation == 'Other') ? 'form-group col-md-4' : 'd-none'">
				<label class="font__helvetica--light title_label">Specify</label>
				<input type="text" class="form-control" id="type_transportation_other" v-tocapitalize v-model="user.personal_information.type_transportation_other" :required="user.personal_information.type_transportation == 'Other'">
			</div>
		</div>
		<div :class="`form-row ${location == 'profile'? 'update-profile-content__sections' : ''} `">
			<div class="form-group col-md-4">
				<label class="font__helvetica--light title_label">How did you hear about us?</label>
				<select class="form-control" id="hear_about_us" v-model="user.personal_information.hear_about_us" required>
					<option value="" disabled>Please choose one</option>
					<option value="Acciontrabajo">Acciontrabajo</option>
					<option value="A Friend Working In Accedo">A Friend Working In Accedo</option>
					<option value="Apply On Line / Accedo Page">Apply On Line / Accedo Page</option>
					<option value="Banner">Banner</option>
					<option value="Call">Call</option>
					<option value="Carro Valla">Carro Valla</option>
					<option value="Centro De Empleo De La Alcaldia">Centro De Empleo De La Alcaldia</option>
					<option value="Cine">Cine</option>
					<option value="Computrabajo">Computrabajo</option>
					<option value="El Empleo">El Empleo</option>
					<option value="Expocamello">Expocamello</option>
					<option value="Facebook">Facebook</option>
					<option value="Family">Family</option>
					<option value="Flyer">Flyer</option>
					<option value="Google">Google</option>
					<option value="Instagram">Instagram</option>
					<option value="Invest In Pereira">Invest In Pereira</option>
					<option value="Job Fair">Job Fair</option>
					<option value="Mail">Mail</option>
					<option value="News Paper">News Paper</option>
					<option value="Other">Other</option>
					<option value="Poster">Poster</option>
					<option value="Poster">Poster</option>
					<option value="Radio">Radio</option>
					<option value="Sena">Sena</option>
					<option value="Unmejorempleo">Unmejorempleo</option>
					<option value="Whatsapp">Whatsapp</option>
				</select>
			</div>
		</div> -->
	</div>
</template>

<script>
	export default {
		mounted() {
			console.log("Component mounted.");
		},
	};
</script>
