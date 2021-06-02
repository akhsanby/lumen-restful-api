<template>
	<div class="row my-5">
		<div class="col-6 offset-3">
			<div class="card">
				<div class="card-header h4 fw-bolder">
					Create Fruit Form
				</div>
				<div class="card-body">
					<form @submit.prevent="store">
						<div class="mb-3">
							<label class="form-label">Name</label>
							<input type="text" class="form-control" v-model="fruit.name">
							<div v-if="validation.name">
								<div class="text-danger">
									{{ validation.name[0] }}
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Category</label>
							<select class="form-select" v-model="fruit.category">
								<option selected disabled>Choose..</option>
								<option value="Hard Fruit">Hard Fruit</option>
								<option value="Soft Fruit">Soft Fruit</option>
								<option value="Citrus Fruit">Citrus Fruit</option>
								<option value="Tropical Fruit">Tropical Fruit</option>
							</select>
							<div v-if="validation.category">
								<div class="text-danger">
									{{ validation.category[0] }}
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Price</label>
							<input type="number" class="form-control" v-model="fruit.price">
							<div v-if="validation.price">
								<div class="text-danger">
									{{ validation.price[0] }}
								</div>
							</div>
						</div>
						<div class="btn-group">
							<button type="submit" class="btn btn-primary">Save</button>
							<router-link :to="{ name: 'fruit.index' }" class="btn btn-secondary">Cancel</router-link>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</template>

<script>
	import axios from "axios"

	export default {
		data() {
			return {
				fruit: {},
				validation: []
			}
		},
		methods: {
			store() {
				axios.post("api/fruit", this.fruit)
				.then(() => {
					this.$router.push({
						name: "fruit.index"
					});
				}).catch(err => {
					this.validation = err.response.data;
				})
			}
		}
	}
</script>