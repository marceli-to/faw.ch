<template>
<div>
  <header class="page-header">
    <div>
      <a href="/administration" class="brand">
        <svg xmlns="http://www.w3.org/2000/svg" width="233.8" height="81.1" viewBox="0 0 233.8 81.1"><path fill="#181716" d="M7 80.8h5.1l4.2-12.1 4.2 12.1h5.1l7-21.1h-6l-3.7 12.1-4.1-12.2h-5l-4 12.2-3.6-12.1H0l7 21.1zm28.8-.1h5.9v-21h-5.9v21zm10.4 0H52V69.2l9 11.5h5.1v-21h-5.8v11.1l-8.6-11.1h-5.4v21zm29.5 0h5.8V64.8h6.3v-5.1H69.4v5.1h6.3v15.9zm15.4 0h17v-5H96.8v-3.3h10.1v-4.6H96.8v-3.2H108v-4.9H91.1v21zm20.7 0h5.8v-6.4h2.6l4.2 6.4h6.7l-5-7.3c2.6-1.1 4.3-3.2 4.3-6.5v-.1c0-2.1-.6-3.7-1.9-4.9-1.4-1.4-3.6-2.3-6.8-2.3h-9.9v21.1zm5.9-10.9v-5h3.8c2 0 3.1.8 3.1 2.5v.1c0 1.5-1.1 2.5-3.1 2.5h-3.8zm21.6 10.9h5.8V64.8h6.3v-5.1H133v5.1h6.3v15.9zm15.4 0h5.8v-8h7.5v8h5.8v-21H168v7.9h-7.5v-7.9h-5.8v21zm33 .4c6 0 9.8-3 9.8-9.7V59.7h-5.9v11.8c0 2.9-1.5 4.3-3.9 4.3-2.3 0-3.9-1.4-3.9-4.5V59.7H178v11.8c0 6.5 3.8 9.6 9.7 9.6m14.1-.4h5.8v-6.4h2.6l4.2 6.4h6.7l-5-7.3c2.6-1.1 4.3-3.2 4.3-6.5v-.1c0-2.1-.6-3.7-1.9-4.9-1.4-1.4-3.6-2.3-6.8-2.3h-9.9v21.1zm5.8-10.9v-5h3.8c2 0 3.1.8 3.1 2.5v.1c0 1.5-1.1 2.5-3.1 2.5h-3.8zM1.4 49.9h6.1L9 46.2h8.1l1.5 3.8h6.2L16 28.8h-5.6l-9 21.1zm9.3-8.3l2.4-6 2.3 6h-4.7zm17 8.3h5.8v-6.4h2.6l4.2 6.4H47l-5-7.3c2.6-1.1 4.3-3.2 4.3-6.4v-.1c0-2.1-.6-3.7-1.9-4.9-1.4-1.4-3.6-2.3-6.8-2.3h-9.9v21zM33.5 39v-5h3.8c1.9 0 3.2.8 3.2 2.5v.1c0 1.5-1.1 2.5-3.1 2.5h-3.9zm26.6 11.3c4.6 0 7.3-2 9.3-4.7L65 42.5C63.8 44 62.5 45 60.3 45c-2.9 0-5-2.5-5-5.6v-.1c0-3.1 2.1-5.5 5-5.5 2 0 3.4 1 4.6 2.5l4.4-3.4c-1.9-2.6-4.6-4.4-8.9-4.4-6.4 0-11.1 4.8-11.1 10.9v.1c0 6.2 4.8 10.8 10.8 10.8m12.6-.4h5.8v-8H86v8h5.8v-21H86v7.9h-7.5v-7.9h-5.8v21zm23.7 0h5.8v-21h-5.8v21zm15.5 0h5.8V34h6.3v-5.1h-18.4V34h6.3v15.9zm15.5 0h17v-5h-11.3v-3.3h10.1V37h-10.1v-3.2h11.1v-5h-16.9v21.1zm20.7 0h5.8v-5.4l2.1-2.4 5.3 7.8h7l-8.2-12 8-9h-6.9l-7.2 8.5v-8.5h-5.8v21zm27.5 0h5.8V34h6.3v-5.1h-18.4V34h6.3v15.9zm24.9.4c6 0 9.8-3 9.8-9.8V28.9h-5.9v11.8c0 2.9-1.5 4.3-3.9 4.3-2.3 0-3.9-1.4-3.9-4.5V28.9h-5.9v11.8c0 6.6 3.8 9.6 9.8 9.6m14-.4h5.8v-6.4h2.6l4.2 6.4h6.7l-5-7.3c2.6-1.1 4.3-3.2 4.3-6.4v-.1c0-2.1-.6-3.7-1.9-4.9-1.4-1.4-3.6-2.3-6.8-2.3h-9.9v21zm5.8-10.9v-5h3.8c1.9 0 3.1.8 3.1 2.5v.1c0 1.5-1.1 2.5-3.1 2.5h-3.8zM6.3 21.4h5.8v-7.5H22V9.1h-9.9V5.5h11V.4H6.3v21zm30.7.4c6.5 0 11.3-4.9 11.3-10.9v-.1c0-6-4.8-10.9-11.3-10.9s-11.3 5-11.3 11v.1c0 6 4.8 10.8 11.3 10.8m.1-5.2c-3.2 0-5.4-2.6-5.4-5.7v-.1c0-3 2.1-5.6 5.3-5.6 3.2 0 5.4 2.6 5.4 5.7v.1c0 3-2.1 5.6-5.3 5.6m15 4.8H58V15h2.6l4.2 6.4h6.7l-5-7.3c2.6-1.1 4.3-3.2 4.3-6.4v-.1c0-2.1-.6-3.7-1.9-4.9C67.5 1.3 65.3.4 62.1.4h-9.9v21zM58 10.5v-5h3.8c2 0 3.2.8 3.2 2.5 0 1.5-1.1 2.5-3.1 2.5H58zm25.9 11.3c6 0 9.8-3 9.8-9.7V.4h-5.9v11.8c0 2.9-1.5 4.3-3.9 4.3S80 15.1 80 12V.4h-5.9v11.8c.1 6.6 3.8 9.6 9.8 9.6m14-.4h5.7v-12l5.3 8.2h.1l5.4-8.2v12.1h5.8V.5h-6.1l-5 8.1-5-8.1H98v20.9z"/></svg>
      </a>
      <a href="javascript:;" @click="toggleMenu()" class="feather-icon">
        <menu-icon size="24"></menu-icon>
      </a>
    </div>
  </header>
  <nav :class="[!menuVisible ? '' : 'is-visible', 'page']">
    <header>
      <span>
        <strong>{{user}}</strong><br>
        <a href="/logout" class="feather-icon feather-icon--prepend">
          <log-out-icon size="12"></log-out-icon>
          <span>Logout</span>
        </a>
      </span>
      <a href="javascript:;" @click="toggleMenu()" class="feather-icon ">
        <arrow-right-icon size="24"></arrow-right-icon>
      </a>
    </header>
    <ul>
      <li>
        <router-link :to="{name: 'home-dashboard'}">
          <span>Startseite</span>
        </router-link>
        <router-link :to="{name: 'events'}">
          <span>Veranstaltungen</span>
        </router-link>
        <router-link :to="{name: 'annual-programs'}">
          <span>Jahresprogramm</span>
        </router-link>
        <router-link :to="{name: 'page'}">
          <span>Spezialseiten</span>
        </router-link>
        <router-link :to="{name: 'about'}">
          <span>Über uns</span>
        </router-link>
        <router-link :to="{name: 'activities'}">
          <span>Aktivitäten</span>
        </router-link>
        <router-link :to="{name: 'galleries'}">
          <span>Mediengalerien</span>
        </router-link>
      </li>
    </ul>
  </nav>
</div>
</template>
<script>

import { ArrowRightIcon, MenuIcon, LogOutIcon } from 'vue-feather-icons';

export default {
  components: {
    ArrowRightIcon,
    MenuIcon,
    LogOutIcon,
  },

  props: {
    user: '',
  },

	data() {
		return {
			menuVisible: false
		}
  },
  
	methods: {
		toggleMenu() {
			this.menuVisible = this.menuVisible ? false : true;
		}
  },

  watch: {
    '$route'() {
      this.menuVisible = false
    }
  }
}
</script>
