<template>
  <div>
    <div class="upload-listing is-files">
      <div>
        <div
          class="upload-item-file"
          v-for="file in files"
          :key="file.id"
        >
          <div>{{file.name}}</div>
          <div class="upload__actions">
            <file-actions :file="file" :publish="file.publish" :hasEdit="true"></file-actions>
          </div>
        </div>
      </div>
    </div>
    <div :class="[hasOverlayEdit ? 'is-visible' : '', 'upload-overlay-edit']">
      <div class="upload-overlay__close">
        <a
          href="javascript:;"
          class="feather-icon icon-close-overlay"
          @click.prevent="hideEdit()"
        >
          <x-icon size="24"></x-icon>
        </a>
      </div>
      <div class="upload-overlay__grid is-files">
        <figure v-if="hasOverlayEdit">
          <img src="/assets/img/icons/file.svg" height="100" width="100">
          <figcaption v-if="overlayItem.caption">
            <span v-if="overlayItem.caption">{{overlayItem.caption}}</span>
          </figcaption>
        </figure>
        <div>
          <div class="form-row">
            <label>Legende</label>
            <input type="text" v-model="overlayItem.caption" />
          </div>
          <div class="form-row">
            <label>Beschreibung</label>
            <textarea v-model="overlayItem.description"></textarea>
          </div>
          <div class="form-buttons flex">
            <a
              href="javascript:;"
              class="btn-primary"
              @click.prevent="update()"
            >Speichern</a>
            <a
              href="javascript:;"
              class="btn-secondary ml-3x"
              @click.prevent="hideEdit()"
            >Schliessen</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { XIcon } from 'vue-feather-icons';
import FileActions from "@/modules/files/components/Actions.vue";
import FileEdit from "@/modules/files/mixins/edit";
import FileUtils from "@/modules/files/mixins/utils";

export default {
  components: {
    FileActions,
    XIcon
  },

  props: {
    files: Array,
  },

  mixins: [FileEdit, FileUtils],

  data() {
    return {
      hasOverlayEdit: false,

      overlayItem: {
        name: '',
        caption: null
      },

      defaults: {
        item: {
          name: '',
          caption: null
        }
      },

      // States
      isFetched: false,
      isLoading: false,

      // Routes
      routes: {
        update: '/api/file',
      },

      // Messages
      messages: {
        updated: 'Daten aktualisiert!',
      },
    };
  },

  mounted() {
    window.addEventListener("keyup", event => {
      if (event.which === 27) {
        this.hideEdit();
      }
    });
  },

  methods: {
    toggle(file, $event) {
      this.$parent.toggleFile(file, $event)
    },

    destroy(file, $event) {
      this.$parent.destroyFile(file, $event)
    },

    update() {
      this.axios.put(`${this.routes.update}/${this.overlayItem.id}`, this.overlayItem).then((response) => {
        this.$notify({type: 'success', text: this.messages.updated});
        this.hideEdit();
      });
    },

    showEdit(file) {
      this.hasOverlayEdit = true;
      this.overlayItem = file;
    },

    hideEdit() {
      this.hasOverlayEdit = false;
      this.overlayItem = this.defaults.item;
    },
  }
};
</script>