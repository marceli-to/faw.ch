// Dashboard Home
import HomeDashboard from '@/views/pages/home/Index.vue';

// Image
import HomeImageIndex from '@/views/pages/home/image/Index.vue';
import HomeTeaserIndex from '@/views/pages/home/teaser/Index.vue';
import HomeTeaserCreate from '@/views/pages/home/teaser/partials/Create.vue';
import HomeTeaserEdit from '@/views/pages/home/teaser/partials/Edit.vue';

const routes = [

  // Dashboard 
  {
    name: 'home-dashboard',
    path: '/administration/home',
    component: HomeDashboard,
  },

  // Home - Images
  {
    name: 'home-images',
    path: '/administration/home/images/:type',
    component: HomeImageIndex,
  },


  // Home - Teasers
  {
    name: 'home-teasers',
    path: '/administration/home/teasers',
    component: HomeTeaserIndex,
  },
  {
    name: 'home-teaser-create',
    path: '/administration/home/teaser/create',
    component: HomeTeaserCreate,
  },
  {
    name: 'home-teaser-edit',
    path: '/administration/home/teaser/edit/:id',
    component: HomeTeaserEdit,
  },

  // Home - Layout
];

export default routes;