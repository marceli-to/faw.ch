<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <div v-if="isFetched" class="is-loaded">
    <form @submit.prevent="submit">
      <div :class="[this.errors.title ? 'has-error' : '', 'form-row is-narrow']">
        <label>Titel *</label>
        <input type="text" v-model="data.title">
        <label-required />
      </div>
      <div :class="[this.errors.url ? 'has-error' : '', 'form-row is-narrow']">
        <label>Url *</label>
        <input type="text" v-model="data.url">
        <label-required />
      </div>
      <div class="form-row">
        <div class="select-wrapper">
          <label>Öffnen in...</label>
          <select name="target" v-model="data.target">
            <option value="_self" selected>gleiches Fenster</option>
            <option value="_blank">neues Fenster</option>
          </select>
        </div>
      </div>
    </form>
    <div>
      [listing]
    </div>
  </div>
</div>
</template>
<script>
import Helpers from "@/mixins/Helpers";
import LabelRequired from "@/components/ui/LabelRequired.vue";

export default {

  components: {
    LabelRequired
  },

  mixins: [Helpers],

  props: {
    typeId: null,
    type: null,
    links: null,
  },

  data() {
    return {

      // Data
      data: [],

      // Link
      link: {
        title: null,
        url: null,
        target: '_self',
      },

      // Validation
      errors: {
        title: false,
        url: false,
      },


      // Routes
      routes: {
        get: '/api/links',
        store: '/api/link',
        delete: '/api/link',
        toggle: '/api/link/state',
      },

      // States
      isLoading: false,
      isFetched: false,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Links vorhanden...',
        saved: 'Datei gespeichert!',
        updated: 'Änderungen gespeichert!',
      },
    };
  },

  created() {
    if (this.$props.links) {
      this.data = this.$props.links;
      this.isFetched = true;
    }
    else {
      this.fetch();
    }
  },

  methods: {

    fetch() {
      this.axios.get(`${this.routes.get}`).then(response => {
        this.data = response.data.data;
        this.isFetched = true;
      });
    },

    store() {
      let link = {
        id: null,
        title: this.link.title,
        url: this.link.url,
        publish: 1,
        linkable_id: this.$props.typeId,
        linkable_type: this.$props.type,
      };

      this.axios.post(`${this.routes.store}`, link).then(response => {
        this.$notify({ type: "success", text: this.messages.saved });
        link.id = response.data.linkId;
        this.data.push(link);
      });
    },

    destroyLink(link) {
      if (confirm("Bitte löschen bestätigen!")) {
        this.isLoading = true;
        this.axios.delete(`${this.routes.delete}/${link}`).then(response => {
          const index = this.data.findIndex(x => x.name === link);
          this.data.splice(index, 1);
          this.isLoading = false;
        });
      }
    },

    toggleLink(link) {
      this.isLoading = true;
      this.axios.get(`${this.routes.toggle}/${link.id}`).then(response => {
        const index = this.data.findIndex(x => x.id === link.id);
        this.data[index].publish = response.data;
        this.isLoading = false;
      });
    },
  }
}
</script>