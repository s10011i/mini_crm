import { createRouter, createWebHistory } from 'vue-router';
import LoginEmployee from '../components/LoginEmployee.vue';
import LoginAdmin from '../components/admin/LoginAdmin.vue';
import NotFound from '../components/NotFound.vue';
import DisplayAllEntries from '../components/entries/frontoffice/DisplayAllEntries.vue';
import EntryFrontEdit from '../components/entries/frontoffice/EntryFrontEdit.vue';

import CreateEmployee from '../components/admin/CreateEmployee.vue';
import MyEntries from '../components/entries/backoffice/MyEntries.vue';

const routes = [
  {
    path: "/",
    name: "login",
    component: LoginEmployee
  },
  {
    path: "/admin",
    name: "admin",
    component: LoginAdmin
  },
  {
    path: "/display_all_entries",
    name: "display_all_entries",
    component: DisplayAllEntries
  },
  {
    path: "/entry_front_edit/:id",
    name: "entry_front_edit",
    component: EntryFrontEdit,
    props: true
  },
  {
    path: "/create_employee",
    name: "create_employee",
    component: CreateEmployee,
  },
  {
    path: "/my_entries/:id",
    name: "my_entries",
    component: MyEntries,
    props: true
  },
  {
    path: "/:pathMatch(.*)*",
    name: "not_found",
    component: NotFound
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;