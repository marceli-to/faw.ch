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
        <div class="form-row">
          <label>Titel</label>
          <input type="text" v-model="data.title">
        </div>
        <div :class="[this.errors.title ? 'has-error' : '', 'form-row']">
          <label>Lead</label>
          <tinymce-editor
            :init="tinyConfig"
            v-model="data.text"
          ></tinymce-editor>
        </div>
        <template v-if="$props.type == 'edit'">
          <div class="form-row sb-lg">
            <page-header>
              <h3>Artikel</h3>
              <a href="javascript:;" @click="$refs.activityArticleForm.show();" class="btn-add has-icon">
                <plus-icon size="16"></plus-icon>
                <span>Hinzufügen</span>
              </a>
            </page-header>
            <activity-articles :articles="data.articles" :activityId="data.id"></activity-articles>
          </div>
        </template>
        <template v-else>
          <div class="sb-lg"><strong>Artikel können erst nach dem Speichern hinzugefügt werden.</strong></div>
        </template>
        <activity-article-form :type="'create'" :activityId="data.id" ref="activityArticleForm"></activity-article-form>
      </div>
    </div>
    <div v-show="tabs.settings.active">
      <div>
        <div class="form-row">
          <radio-button 
            :label="'Publizieren?'"
            v-bind:publish.sync="data.publish"
            :model="data.publish"
            :name="'publish'">
          </radio-button>
        </div>
      </div>
    </div>
    <page-footer>
      <button-back :route="'activities'">Zurück</button-back>
      <button-submit>Speichern</button-submit>
    </page-footer>
  </form>
</div>
</template>
<script>
import { PlusIcon } from 'vue-feather-icons';
import TinymceEditor from "@tinymce/tinymce-vue";
import tinyConfig from "@/config/tiny.js";
import ErrorHandling from "@/mixins/ErrorHandling";
import RadioButton from "@/components/ui/RadioButton.vue";
import ButtonBack from "@/components/ui/ButtonBack.vue";
import ButtonSubmit from "@/components/ui/ButtonSubmit.vue";
import LabelRequired from "@/components/ui/LabelRequired.vue";
import Tabs from "@/components/ui/Tabs.vue";
import tabsConfig from "@/views/pages/activity/config/tabs.js";
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";
import ActivityArticles from "@/views/pages/activity/article/Index.vue";
import ActivityArticleForm from "@/views/pages/activity/article/Form.vue";

export default {
  components: {
    PlusIcon,
    RadioButton,
    ButtonBack,
    ButtonSubmit,
    LabelRequired,
    Tabs,
    PageFooter,
    PageHeader,
    TinymceEditor,
    ActivityArticles,
    ActivityArticleForm
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
        text: null,
        publish: 1,
        articles: [],
      },

      // Validation
      errors: {
        text: false,
      },

      // Routes
      routes: {
        get: '/api/activity',
        store: '/api/activity',
        update: '/api/activity',
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

      // TinyMCE
      tinyConfig: tinyConfig,
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
        this.$router.push({ name: "activities"});
        this.$notify({ type: "success", text: this.messages.stored });
        this.isLoading = false;
      });
    },

    update() {
      this.isLoading = true;
      this.axios.put(`${this.routes.update}/${this.$route.params.id}`, this.data).then(response => {
        this.$router.push({ name: "activities"});
        this.$notify({ type: "success", text: this.messages.updated });
        this.isLoading = false;
      });
    },
  },

  computed: {
    title() {
      return this.$props.type == "edit" 
        ? "Aktivitäten bearbeiten" 
        : "Aktivitäten hinzufügen";
    }
  }
};
</script>
