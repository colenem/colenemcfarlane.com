import menuActions from '../components/menu-actions';

export default {
  init() {
    // JavaScript to be fired on the home page
    menuActions.init();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
