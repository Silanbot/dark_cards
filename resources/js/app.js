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
            .use({
                install(app, options) {
                    app.config.globalProperties.telegram = window.Telegram.WebApp
                    const authToken = axios.get('/api/auth/token', {
                        params: {
                            id: window.Telegram.WebApp.initDataUnsafe.user.id
                        }
                    })
                    app.config.globalProperties.authToken = authToken

                    const centrifuge = new Centrifuge('ws://127.0.0.1:3400/connection/websocket', {
                        token: authToken
                    })

                    centrifuge.on('connected', ctx => (app.config.globalProperties.user = ctx.data.user))
                    centrifuge.connect()

                    app.config.globalProperties.centrifuge = centrifuge
                }
            })
            .mount(el)
    },
})
