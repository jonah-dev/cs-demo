require('./bootstrap');
const App = require('./components/App.vue').default;

const app = new Vue({
    components: { App },
    el: '#app',
    data: {
        email: 'larhonda.hovis@foo.com',
        password: 'cghmpbKXXK',
        user: null,
    },
    template: `<App/>`
});

