<template>
	<div class="card">
		<div v-for="(full_data, index) in full_data.data" :key="index">
			<div class="card-header">
				<i class="fa fa-align-justify"></i> {{ full_data.name }}
			</div>
			<div class="row d-flex justify-content-center mt-5">
				<div v-for="(data, index) in full_data.product" :key="index" class="col-4">
					<div class="card col-11 mb-4 bg-light">
						<div class="card-header d-flex justify-content-center">
							<img class="card-img-top" alt="..." style="width: 250px">
						</div>
						<div class="card-body">
							<h5 class="card-title">name {{ data.name }}</h5>
							<p class="card-text"> Size {{data.size}}</p>
							<div>
								<div class="price text-success">
									<h5 class="mt-4">Product Brand {{ data.product_brand }}</h5>
								</div>
								<a type="date" class="p-2 text-dark" href="#">Shipment Date {{ data.shipment_date }}</a>
							</div>
							<a class="btn btn-success">Comprar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		components: {},
		data() {
			return {
				full_data: [],
			};
		},
		created() {
			this.getData1();
		},
		methods: {
			getData1() {
				axios
					.get("/api/client/brand")
					.then((response) => (this.full_data = response));
			},
		},
	};
</script>
