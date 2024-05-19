import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import {Centrifuge} from "centrifuge";
import axios from "axios";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        return pages[`./Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            // .use({
                // install(app, options) {
                //     app.config.globalProperties.telegram = window.Telegram.WebApp
                //     axios.get('/api/profile', {
                //         params: {
                //             id: 36, // window.Telegram.WebApp.initDataUnsafe.user.id
                //             username: 'armani.hoeger', //window.Telegram.WebApp.initDataUnsafe.user.username
                //         }
                //     }).then(response => (app.config.globalProperties.user = response.data))
                //     let authToken = ''
                //     fetch(`/api/auth/token?id=1`)
                //         .then(response => response.json())
                //         .then(data => {
                //             authToken = data.token
                //         })
                //     console.log(authToken)
                //     app.config.globalProperties.authToken = authToken
                //
                //     const centrifuge = new Centrifuge('ws://127.0.0.1:3312/connection/websocket', {
                //         token: authToken
                //     })
                //
                //     centrifuge.on('connected', ctx => (app.config.globalProperties.user = ctx.data.user))
                //     centrifuge.connect()
                //
                //     app.config.globalProperties.centrifuge = centrifuge
                // }
            // })
            .mount(el)
    },
})
