// Dashboard Home
import HomeDashboard from '@/views/pages/home/Index.vue';

// Image
import HomeImageIndex from '@/views/pages/home/image/Index.vue';
import TeaserIndex from '@/views/pages/home/teaser/Index.vue';
import TeaserCreate from '@/views/pages/home/teaser/partials/Create.vue';
import TeaserEdit from '@/views/pages/home/teaser/partials/Edit.vue';

const routes = [

  // Dashboard 
  {
    name: 'home-dashboard',
    path: '/administration/home',
    component: HomeDashboard,
  },

  // Home: Images
  {
    name: 'home-images',
    path: '/administration/home/images',
    component: HomeImageIndex,
  },


  // Home: Teasers
  {
    name: 'teasers',
    path: '/administration/home/teasers',
    component: TeaserIndex,
  },
  {
    name: 'teaser-create',
    path: '/administration/home/teaser/create',
    component: TeaserCreate,
  },
  {
    name: 'teaser-edit',
    path: '/administration/home/teaser/edit/:id',
    component: TeaserEdit,
  },

  // Home: Layout
];

export default routes;