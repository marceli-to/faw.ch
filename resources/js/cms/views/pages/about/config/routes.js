import Dashboard from '@/views/pages/about/Index.vue';
import BackerIndex from '@/views/pages/about/backer/Index.vue';
import BackerCreate from '@/views/pages/about/backer/partials/Create.vue';
import BackerEdit from '@/views/pages/about/backer/partials/Edit.vue';

const routes = [
  {
    name: 'about',
    path: '/administration/about',
    component: Dashboard,
  },
  {
    name: 'backers',
    path: '/administration/about/backers',
    component: BackerIndex,
  },
  {
    name: 'backer-create',
    path: '/administration/about/backer/create',
    component: BackerCreate,
  },
  {
    name: 'backer-edit',
    path: '/administration/about/backer/edit/:id',
    component: BackerEdit,
  },
];

export default routes;