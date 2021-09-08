<template>
	<div class="modal fade" id="modalEditUser">
		<div class="modal-dialog modal-xl modal-primary" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form @submit.prevent="store" autocomplete="off">
						<div class="form-group row">
							<div class="col-md-6">
								<label>Name</label>
								<input type="text" class="form-control" placeholder="Name" v-model="user.name" required>
							</div>
							<div class="col-md-6">
								<label>Document</label>
								<input type="text" class="form-control" placeholder="document" v-model="user.document" required>
							</div>
							<div class="col-md-6">
								<label>Phone Number</label>
								<input type="text" class="form-control" placeholder="phone_number" v-model="user.phone_number" required>
							</div>
							<div class="col-md-6">
								<label>Address</label>
								<input type="text" class="form-control" placeholder="address" v-model="user.address" required>
							</div>
							<div class="col-md-6">
								<label>Email</label>
								<input type="email" class="form-control" placeholder="Email" v-model="user.email" required>
							</div>
							<div class="col-md-6">
								<label>Password</label>
								<input type="password" class="form-control" placeholder="Password" v-model="user.password">
							</div>
							<div class="col-md-6">
								<label>Roles</label>
								<v-select multiple label="name" :options="roles" :reduce="name => name.name" v-model="user.roles">
								</v-select>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary" type="submit">Save</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ["user", "roles", "type"],
		methods: {
			async store() {
				var url = "";
				if (this.type == "created") url = `/Admin/store`;
				if (this.type == "updated") url = `/Admin/update/${this.user.id}`;

				await axios.post(url, this.user).then((res) => {
					if (res.data.saved) {
						location.reload();
					}
				});
			},
		},
	};
</script>
