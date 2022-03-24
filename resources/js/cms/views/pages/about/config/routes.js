import Dashboard from '@/views/pages/about/Index.vue';
import BackerIndex from '@/views/pages/about/backer/Index.vue';
import BackerCreate from '@/views/pages/about/backer/partials/Create.vue';
import BackerEdit from '@/views/pages/about/backer/partials/Edit.vue';

import PartnerIndex from '@/views/pages/about/partner/Index.vue';
import PartnerCreate from '@/views/pages/about/partner/partials/Create.vue';
import PartnerEdit from '@/views/pages/about/partner/partials/Edit.vue';

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

  {
    name: 'partners',
    path: '/administration/about/partners',
    component: PartnerIndex,
  },
  {
    name: 'partner-create',
    path: '/administration/about/partner/create',
    component: PartnerCreate,
  },
  {
    name: 'partner-edit',
    path: '/administration/about/partner/edit/:id',
    component: PartnerEdit,
  },
];

export default routes;