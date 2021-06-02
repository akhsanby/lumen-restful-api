<template>
	<div class="row my-5">
		<div class="col-6 offset-3">
			<div class="card">
				<div class="card-header fw-bolder h4">
					Fruit List
				</div>
				<div class="card-body">
					<router-link :to="{ name: 'fruit.create' }" class="btn btn-primary mb-2">create</router-link>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Name</th>
								<th scope="col">Category</th>
								<th scope="col">Price</th>
								<th scope="col">Option</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="fruit, index in fruits" :key="index">
								<th scope="row">{{ index + 1 }}</th>
								<td>{{ fruit.name }}</td>
								<td>{{ fruit.category }}</td>
								<td>{{ fruit.price }}</td>
								<td>
									<div class="btn-group">
										<router-link :to="{ name: 'fruit.edit', params: { id: fruit.id } }" class="btn btn-success badge">edit</router-link>
										<button @click.prevent="deleteFruit(fruit.id, index)" class="btn btn-danger badge">delete</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>
</template>																				

<script>
	import axios from 'axios'

	export default {
		data() {
			return {
				fruits: []
			}
		},
		created() {
			axios.get("api/fruit")
			.then(response => {
				this.fruits = response.data.data;
			}).catch(err => {
				console.log(err);
			});
		},
		methods: {
			deleteFruit(id, index) {
				axios.delete(`api/fruit/${id}`)
				.then((response) => {
					this.fruits.splice(index, 1);
					console.log(response);
				}).catch(err => {
					console.log(err.response);
				})
			}
		}
	}
</script>