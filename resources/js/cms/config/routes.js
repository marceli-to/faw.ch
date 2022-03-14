import ErrorForbidden from '@/views/errors/Forbidden.vue';
import ErrorNotFound from '@/views/errors/NotFound.vue';

// Dashboard
import Dashboard from '@/views/pages/Index.vue';

// Dashboard ITDV
import DashboardItdv from '@/views/pages/itdv/Index.vue';

// Article
import ArticleIndex from '@/views/pages/itdv/article/Index.vue';
import ArticleCreate from '@/views/pages/itdv/article/Create.vue';
import ArticleEdit from '@/views/pages/itdv/article/Edit.vue';

// Brands
import BrandIndex from '@/views/pages/itdv/brand/Index.vue';

// Image
import ImageIndex from '@/views/pages/itdv/image/Index.vue';

// Files
import FileIndex from '@/views/pages/file/Index.vue';
import FileCreate from '@/views/pages/file/Create.vue';
import FileEdit from '@/views/pages/file/Edit.vue';

// Event
import EventDashboard from '@/views/pages/event/Index.vue';
import EventIndex from '@/views/pages/event/edizione/Index.vue';
import EventCreate from '@/views/pages/event/edizione/Create.vue';
import EventEdit from '@/views/pages/event/edizione/Edit.vue';
import EventBookingIndex from '@/views/pages/event/edizione/booking/Index.vue';
import EventBookingParticipantIndex from '@/views/pages/event/edizione/booking/participant/Index.vue';

// Participants
import ParticipantIndex from '@/views/pages/event/participant/Index.vue';
import ParticipantCreate from '@/views/pages/event/participant/Create.vue';
import ParticipantEdit from '@/views/pages/event/participant/Edit.vue';

// Newsletter
import NewsletterDashboard from '@/views/pages/newsletter/Index.vue';
import NewsletterIndex from '@/views/pages/newsletter/newsletter/Index.vue';
import NewsletterCreate from '@/views/pages/newsletter/newsletter/Create.vue';
import NewsletterEdit from '@/views/pages/newsletter/newsletter/Edit.vue';

import NewsletterArticleIndex from '@/views/pages/newsletter/newsletter/article/Index.vue';
import NewsletterArticleCreate from '@/views/pages/newsletter/newsletter/article/Create.vue';
import NewsletterArticleEdit from '@/views/pages/newsletter/newsletter/article/Edit.vue';

// Subscriber
import SubscriberIndex from '@/views/pages/newsletter/subscriber/Index.vue';
import SubscriberCreate from '@/views/pages/newsletter/subscriber/Create.vue';
import SubscriberEdit from '@/views/pages/newsletter/subscriber/Edit.vue';

const routes = [

  // Home
  {
    name: 'home',
    path: '/administration/',
    component: Dashboard,
  },

  // Dashboard
  {
    name: 'dashboard',
    path: '/administration/dashboard',
    component: Dashboard,
  },

  // Dashboard "Forum Architektur Winterthur"
  {
    name: 'itdv',
    path: '/administration/itdv',
    component: DashboardItdv,
  },

  // Article
  {
    name: 'articles',
    path: '/administration/itdv/articles',
    component: ArticleIndex,
  },
  {
    name: 'article-create',
    path: '/administration/itdv/article/create',
    component: ArticleCreate,
  },
  {
    name: 'article-edit',
    path: '/administration/itdv/article/edit/:id',
    component: ArticleEdit,
  },

  // Brands
  {
    name: 'brands',
    path: '/administration/itdv/brands',
    component: BrandIndex,
  },

  // Images
  {
    name: 'images',
    path: '/administration/itdv/images',
    component: ImageIndex,
  },

  // File
  {
    name: 'files',
    path: '/administration/files',
    component: FileIndex,
  },
  {
    name: 'file-create',
    path: '/administration/file/create',
    component: FileCreate,
  },
  {
    name: 'file-edit',
    path: '/administration/file/edit/:id',
    component: FileEdit,
  },

  // Event
  {
    name: 'events',
    path: '/administration/events',
    component: EventDashboard,
  },
  {
    name: 'edizioni',
    path: '/administration/edizioni',
    component: EventIndex,
  },
  {
    name: 'edizione-create',
    path: '/administration/edizione/create',
    component: EventCreate,
  },
  {
    name: 'edizione-edit',
    path: '/administration/edizione/edit/:id',
    component: EventEdit,
  },

  {
    name: 'edizione-bookings',
    path: '/administration/edizione/bookings/:id',
    component: EventBookingIndex,
  },
  {
    name: 'edizione-booking-participants',
    path: '/administration/edizione/booking/participants/:id',
    component: EventBookingParticipantIndex,
  },

  // Participant
  {
    name: 'participants',
    path: '/administration/participants',
    component: ParticipantIndex,
  },
  {
    name: 'participant-create',
    path: '/administration/itdv/participant/create',
    component: ParticipantCreate,
  },
  {
    name: 'participant-edit',
    path: '/administration/itdv/participant/edit/:id',
    component: ParticipantEdit,
  },

  // Newsletter
  {
    name: 'newsletters',
    path: '/administration/newsletters',
    component: NewsletterDashboard,
  },
  {
    name: 'newsletter-index',
    path: '/administration/newsletter/newsletter',
    component: NewsletterIndex,
  },
  {
    name: 'newsletter-create',
    path: '/administration/newsletter/newsletter/create',
    component: NewsletterCreate,
  },
  {
    name: 'newsletter-edit',
    path: '/administration/newsletter/newsletter/edit/:id',
    component: NewsletterEdit,
  },

  {
    name: 'newsletter-articles',
    path: '/administration/newsletter/newsletter/articles/:newsletterId',
    component: NewsletterArticleIndex,
  },
  {
    name: 'newsletter-article-create',
    path: '/administration/newsletter/newsletter/article/create/:newsletterId',
    component: NewsletterArticleCreate,
  },
  {
    name: 'newsletter-article-edit',
    path: '/administration/newsletter/newsletter/article/edit/:newsletterId/:id',
    component: NewsletterArticleEdit,
  },

  // Subscriber
  {
    name: 'subscribers',
    path: '/administration/newsletter/subscribers',
    component: SubscriberIndex,
  },
  {
    name: 'subscriber-create',
    path: '/administration/newsletter/subscriber/create',
    component: SubscriberCreate,
  },
  {
    name: 'subscriber-edit',
    path: '/administration/newsletter/subscriber/edit/:id',
    component: SubscriberEdit,
  },

  // Authorization
  {
    name: 'forbidden',
    path: '/forbidden',
    component: ErrorForbidden,
  },
  {
    name: 'not-found',
    path: '/not-found',
    component: ErrorNotFound,
  }
];

export default routes;