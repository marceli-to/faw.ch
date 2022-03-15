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
          <label>Link</label>
          <input type="text" v-model="data.link">
        </div>
      </div>
    </div>
    <div v-show="tabs.image.active">
      <div>
        <div class="form-row" v-if="data.images.length == 0">
          <image-upload
            :restrictions="'jpg, png | max. 8 MB'"
            :maxFiles="99"
            :maxFilesize="8"
            :acceptedFiles="'.png,.jpg'"
          ></image-upload>
        </div>
        <div class="form-row">
          <image-edit 
            :images="data.images"
            :imagePreviewRoute="'cache'"
            :aspectRatioW="4"
            :aspectRatioH="3"
          ></image-edit>
        </div>
      </div>
    </div>
    <page-footer>
      <button type="submit" class="btn-primary">Speichern</button>
      <router-link :to="{ name: 'home-teasers' }" class="btn-secondary">
        <span>Zurück</span>
      </router-link>
    </page-footer>
  </form>
</div>
</template>
<script>
import ErrorHandling from "@/mixins/ErrorHandling";
import RadioButton from "@/components/ui/RadioButton.vue";
import LabelRequired from "@/components/ui/LabelRequired.vue";
import Tabs from "@/components/ui/Tabs.vue";
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";
import ImageUpload from "@/components/images/Upload.vue";
import ImageEdit from "@/views/pages/home/teaser/images/Edit.vue";
import tabsConfig from "@/views/pages/home/teaser/config/tabs.js";

export default {
  components: {
    RadioButton,
    LabelRequired,
    Tabs,
    PageFooter,
    PageHeader,
    ImageUpload,
    ImageEdit
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
        images: [],
      },

      // Validation
      errors: {
        title: false,
      },

      // Routes
      routes: {
        get: '/api/home/teaser',
        store: '/api/home/teaser',
        update: '/api/home/teaser',
        storeImage: '/api/home/teaser/image',
        deleteImage: '/api/home/teaser/image',
        toggleImage: '/api/home/teaser/image/state',
        saveImageCoords: '/api/home/teaser/image/coords',
      },

      // States
      isLoading: false,
      isFetched: true,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        stored: 'Daten erfasst!',
        updated: 'Daten aktualisiert!',
        imageStored: 'Bild gespeichert!',
        confirmDeletion: 'Bitte löschen bestätigen!',
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
        this.$router.push({ name: "home-teasers"});
        this.$notify({ type: "success", text: this.messages.stored });
        this.isLoading = false;
      });
    },

    update() {
      this.isLoading = true;
      this.axios.put(`${this.routes.update}/${this.$route.params.id}`, this.data).then(response => {
        this.$router.push({ name: "home-teasers"});
        this.$notify({ type: "success", text: this.messages.updated });
        this.isLoading = false;
      });
    },

    // Store uploaded image
    storeImage(upload) {
      let image = {
        id: null,
        name: upload.name,
        orientation: upload.orientation,
        coords_w: 0,
        coords_h: 0,
        coords_x: 0,
        coords_y: 0,
        publish: 1,
        home_teaser_id: null
      }

      if (this.$props.type == "edit") {
        image.home_teaser_id = this.$route.params.id;
        this.axios.post(`${this.routes.storeImage}`, image).then(response => {
          this.$notify({ type: "success", text: this.messages.imageStored });
          image.id = response.data.homeTeaserId;
          this.data.images.push(image);
        });
      }
      else {
        this.data.images.push(image);
      }
    },

    destroyImage(image, event) {
      if (confirm(this.messages.confirmDeletion)) {
        this.isLoading = true;
        this.axios.delete(`${this.routes.deleteImage}/${image}`).then(response => {
          const index = this.data.images.findIndex(x => x.name === image);
          this.data.images.splice(index, 1);
          this.isLoading = false;
        });
      }
    },

    toggleImage(image, event) {
      this.isLoading = true;
      this.axios.get(`${this.routes.toggleImage}/${image.id}`).then(response => {
        const index = this.data.images.findIndex(x => x.id === image.id);
        this.data.images[index].publish = response.data;
        this.isLoading = false;
      });
    },

    saveImageCoords(image) {
      this.isLoading = true;
      this.axios.put(`${this.routes.saveImageCoords}/${image.id}`, image).then(response => {
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
