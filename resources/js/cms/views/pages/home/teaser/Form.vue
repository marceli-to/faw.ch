<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <form @submit.prevent="submit" v-if="isFetched">
    <header class="content-header">
      <h1>{{title}}</h1>
    </header>
    <tabs :tabs="tabs" :errors="errors"></tabs>
    <div v-show="tabs.data.active">
      <div>
        <div :class="[this.errors.title ? 'has-error' : '', 'form-row']">
          <label>Titel *</label>
          <input type="text" v-model="data.title">
          <label-required />
        </div>
        <div class="form-row">
          <label>Subtitel</label>
          <input type="text" v-model="data.subtitle">
        </div>
        <div class="form-row">
          <label>Text</label>
          <textarea v-model="data.text"></textarea>
        </div>
        <div class="form-row">
          <label class="flex justify-between">
            <span>Link</span>
            <a 
              :href="data.link" 
              class="feather-icon ml-2x"
              target="_blank"
              v-if="data.link">
              <external-link-icon size="1.2x"></external-link-icon>
            </a>
          </label>
          <input type="text" v-model="data.link">
        </div>
      </div>
    </div>
    <div v-show="tabs.image.active">
      <images 
        :imageRatioW="3" 
        :imageRatioH="2"
        :images="data.images">
      </images>
    </div>
    <div v-show="tabs.file.active">
      <files :files="data.files"></files>
    </div>
    <page-footer>
      <button type="submit" class="btn-primary">Speichern</button>
      <router-link :to="{ name: 'teasers' }" class="btn-secondary">
        <span>Zurück</span>
      </router-link>
    </page-footer>
  </form>
</div>
</template>
<script>
import { ExternalLinkIcon } from 'vue-feather-icons';
import ErrorHandling from "@/mixins/ErrorHandling";
import RadioButton from "@/components/ui/RadioButton.vue";
import LabelRequired from "@/components/ui/LabelRequired.vue";
import Tabs from "@/components/ui/Tabs.vue";
import tabsConfig from "@/views/pages/home/teaser/config/tabs.js";
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";
import Images from "@/modules/images/Index.vue";
import Files from "@/modules/files/Index.vue";

export default {
  components: {
    ExternalLinkIcon,
    RadioButton,
    LabelRequired,
    Tabs,
    PageFooter,
    PageHeader,
    Images,
    Files,
  },

  mixins: [ErrorHandling],

  props: {
    type: String
  },

  data() {
    return {
      
      // Model
      data: {
        title: null,
        subtitle: null,
        text: null,
        link: null,
        publish: 1,
        images: [],
        files: [],
      },

      // Validation
      errors: {
        title: false,
      },

      // Routes
      routes: {
        get: '/api/teaser',
        store: '/api/teaser',
        update: '/api/teaser',
      },

      // States
      isLoading: false,
      isFetched: true,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        stored: 'Daten erfasst!',
        updated: 'Daten aktualisiert!',
      },

      // Tabs config
      tabs: tabsConfig,
    };
  },

  created() {
    if (this.$props.type == "edit") {
      this.isFetched = false;
      this.axios.get(`${this.routes.get}/${this.$route.params.id}`).then(response => {
        this.data = response.data;
        this.isFetched = true;
      });
    }
  },

  methods: {

    // Submit form
    submit() {
      if (this.$props.type == "edit") {
        this.update();
      }

      if (this.$props.type == "create") {
        this.store();
      }
    },

    store() {
      this.isLoading = true;
      this.axios.post(this.routes.store, this.data).then(response => {
        this.$router.push({ name: "teasers"});
        this.$notify({ type: "success", text: this.messages.stored });
        this.isLoading = false;
      });
    },

    update() {
      this.isLoading = true;
      this.axios.put(`${this.routes.update}/${this.$route.params.id}`, this.data).then(response => {
        this.$router.push({ name: "teasers"});
        this.$notify({ type: "success", text: this.messages.updated });
        this.isLoading = false;
      });
    },
  },

  computed: {
    title() {
      return this.$props.type == "edit" 
        ? "Teaser bearbeiten" 
        : "Teaser hinzufügen";
    }
  }
};
</script>
