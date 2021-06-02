import { createRouter, createWebHistory } from "vue-router"
import Index from "../components/Index.vue" 
import Create from "../components/Create.vue" 
import Edit from "../components/Edit.vue" 

const routes = [
	{
		path: "/",
		name: "fruit.index",
		component: Index
	},
	{
		path: "/create",
		name: "fruit.create",
		component: Create
	},
	{
		path: "/edit/:id",
		name: "fruit.edit",
		component: Edit
	}
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;