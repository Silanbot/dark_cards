<template>
    <section v-if="widthLoad < 100" class="load section section-load">
        <div class="load__logotype logotype">
            <img src="./sources/logo.png" alt=""/>
        </div>
        <div class="load__progress">
            <div id="progress" :style="{ width: widthLoad + '%' }"></div>
        </div>
    </section>
</template>

<script>
import telegram from './api/telegram.js'

export default {
    data() {
        return {
            widthLoad: 0
        }
    },
    async mounted() {
        let width = 0
        for (let i = 0; i < 501; i++) {
            width++
            this.widthLoad = width / 5
            await sleep(1)
        }

        location.replace('/profile')
    },
    created() {
        telegram.hideBackButton()
    }
}

function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms))
}
</script>
