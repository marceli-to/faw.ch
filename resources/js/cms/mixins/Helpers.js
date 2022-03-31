export default {

  methods: {

    moneyFormat(amount) {
      return amount.toFixed(2);
    },

    shorten(str, length = 10, suffix = "...") {
      return str.substring(0, length) + suffix;
    },

    randomString() {
      return Math.random().toString(36).slice(2);
    },

    getImageSrc(image, template, maxWidth = 2400, maxHeight = 1600) {
      let coords = '0,0,0,0';
      if (image.coords_w && image.coords_h) {
        coords = `${image.coords_w},${image.coords_h},${image.coords_x},${image.coords_y}`;
      }
      return `/img/${template}/${image.name}/${maxWidth}/${maxHeight}/${coords}`;
    },
  }
};