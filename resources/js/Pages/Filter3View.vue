<script setup></script>

<template>
    <section class="inter section section-inter">
        <div class="inter__header">
            <div class="inter__monet">
                <img src="./sources/coin1.svg" alt=""/>
                <span>{{ user.coins }}</span>
            </div>
            <div class="inter__monet">
                <span>{{ user.cash }}</span>
                <img src="./sources/coin2.svg" alt=""/>
            </div>
        </div>
        <div class="inter__inner el-2" style="margin-top: 0">
            <section class="section-vert vert section">
                <div class="vert__inner">
                    <div class="vert__title">Диапазон ставки</div>
                    <div class="vert__block">
                        <div class="vert__scrollblock" v-if="searchParamHas('cash')">
                            <div class="vert__scrollblock-line"></div>
                            <div class="vert__scroll">
                                <span func="plus" data-sum="0.5" fz="10">0,5</span>
                                <span func="plus" data-sum="1" fz="12">1</span>
                                <span func="plus" data-sum="3" fz="14">3</span>
                                <span func="plus" data-sum="5" fz="16">5</span>
                                <span func="minus" data-sum="10" fz="18">10</span>
                                <span func="minus" data-sum="25" fz="16">25</span>
                                <span func="minus" data-sum="50" fz="14">50</span>
                                <span func="minus" data-sum="100" fz="14">100</span>
                                <span func="minus" data-sum="250" fz="14">250</span>
                                <span func="minus" data-sum="500" fz="14">500</span>
                                <span func="minus" data-sum="1000" fz="14">1к</span>
                            </div>
                            <div class="vert__scroll">
                                <span func="plus" data-sum="0.5" fz="10">0,5</span>
                                <span func="plus" data-sum="1" fz="12">1</span>
                                <span func="plus" data-sum="3" fz="14">3</span>
                                <span func="plus" data-sum="5" fz="16">5</span>
                                <span func="minus" data-sum="10" fz="18">10</span>
                                <span func="minus" data-sum="25" fz="16">25</span>
                                <span func="minus" data-sum="50" fz="14">50</span>
                                <span func="minus" data-sum="100" fz="14">100</span>
                                <span func="minus" data-sum="250" fz="14">250</span>
                                <span func="minus" data-sum="500" fz="14">500</span>
                                <span func="minus" data-sum="1000" fz="14">1к</span>
                            </div>
                        </div>
                        <div class="vert__scrollblock" v-else>
                            <div class="vert__scrollblock-line"></div>
                            <div class="vert__scroll">
                                <span func="plus" data-sum="100" fz="10">100</span>
                                <span func="plus" data-sum="250" fz="12">250</span>
                                <span func="plus" data-sum="500" fz="14">500</span>
                                <span func="plus" data-sum="1000" fz="16">1к</span>
                                <span func="minus" data-sum="2500" fz="18">2.5к</span>
                                <span func="minus" data-sum="5000" fz="16">5к</span>
                                <span func="minus" data-sum="10000" fz="14">10к</span>
                                <span func="plus" data-sum="25000" fz="14">25к</span>
                                <span func="plus" data-sum="50000" fz="14">50к</span>
                                <span func="plus" data-sum="100000" fz="14">100к</span>
                                <span func="plus" data-sum="250000" fz="14">250к</span>
                                <span func="minus" data-sum="500000" fz="14">500к</span>
                                <span func="minus" data-sum="1000000" fz="14">1м</span>
                                <span func="minus" data-sum="2500000" fz="14">2.5м</span>
                                <span func="minus" data-sum="10000000" fz="14">10м</span>
                                <span func="minus" data-sum="25000000" fz="14">25м</span>
                                <span func="plus" data-sum="50000000" fz="14">50м</span>
                                <span func="plus" data-sum="100000000" fz="14">100м</span>
                            </div>
                            <div class="vert__scroll">
                                <span func="plus" data-sum="100" fz="10">100</span>
                                <span func="plus" data-sum="250" fz="12">250</span>
                                <span func="plus" data-sum="500" fz="14">500</span>
                                <span func="plus" data-sum="1000" fz="16">1к</span>
                                <span func="minus" data-sum="2500" fz="18">2.5к</span>
                                <span func="minus" data-sum="5000" fz="10">5к</span>
                                <span func="minus" data-sum="10000" fz="12">10к</span>
                                <span func="plus" data-sum="25000" fz="14">25к</span>
                                <span func="plus" data-sum="50000" fz="16">50к</span>
                                <span func="plus" data-sum="100000" fz="10">100к</span>
                                <span func="plus" data-sum="250000" fz="12">250к</span>
                                <span func="minus" data-sum="500000" fz="14">500к</span>
                                <span func="minus" data-sum="1000000" fz="16">1м</span>
                                <span func="minus" data-sum="2500000" fz="10">2.5м</span>
                                <span func="minus" data-sum="10000000" fz="12">10м</span>
                                <span func="minus" data-sum="25000000" fz="14">25м</span>
                                <span func="plus" data-sum="50000000" fz="16">50м</span>
                                <span func="plus" data-sum="100000000" fz="10">100м</span>
                            </div>
                        </div>
                        <div class="vert__button" @click="submitFilters">Применить</div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="footer">
            <div class="footer__inner">
                <a href="/profile" class="footer__item">
                    <div class="svg">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="66"
                            height="70"
                            viewBox="0 0 66 70"
                            fill="none"
                        >
                            <path
                                d="M48.9994 16.3333C48.9994 25.354 41.6867 32.6667 32.666 32.6667C23.6454 32.6667 16.3327 25.354 16.3327 16.3333C16.3327 7.31268 23.6454 0 32.666 0C41.6867 0 48.9994 7.31268 48.9994 16.3333Z"
                                fill="#EB3D3D"
                            />
                            <path
                                d="M32.6667 69.8333C65.3333 69.8333 65.3333 61.6054 65.3333 51.4583C65.3333 41.3113 50.7068 33.0833 32.6667 33.0833C14.6265 33.0833 0 41.3113 0 51.4583C0 61.6054 0 69.8333 32.6667 69.8333Z"
                                fill="#EB3D3D"
                            />
                        </svg>
                    </div>
                    <span>Профиль</span>
                </a>
                <a href="/home" class="footer__play">
                    <img src="./sources/play.png" alt=""/>
                </a>

                <div class="footer__item">
                    <div class="svg">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="64"
                            height="72"
                            viewBox="0 0 64 72"
                            fill="none"
                        >
                            <path
                                d="M55.4186 13.4293L49.5594 12.9973L45.2505 8.75608L49.5594 13.0045C49.5594 13.0045 55.1639 13.4005 55.4186 13.4293C55.6879 13.4437 56.0009 13.6526 56.0591 14.0126L64 67.1899L41.5094 72L0 64.3168C0 64.3168 5.32787 23.5608 5.53167 22.1206C5.7937 20.2196 5.85921 20.1548 7.89719 19.5284L14.4624 17.5122C15.8744 11.6076 20.358 0 29.7473 0C30.9701 0 32.3894 0.648067 33.5321 2.15302C33.646 2.14506 33.7601 2.14026 33.8742 2.13861C37.9065 2.13861 40.192 5.53735 41.4948 9.23132L43.6711 8.56886C43.9903 8.47935 44.3246 8.45485 44.6537 8.49685L55.4186 13.4293ZM33.8742 25.7282C33.8742 25.7282 32.0036 24.6481 28.2043 24.6481C18.3564 24.6481 13.4798 31.1575 13.4798 37.883C13.4798 45.8758 21.5371 46.0918 21.5371 50.9523C21.5405 51.3268 21.4667 51.6981 21.3202 52.0435C21.1738 52.3888 20.9578 52.7011 20.6853 52.9612C20.4129 53.2212 20.0898 53.4237 19.7357 53.5562C19.3816 53.6887 19.0039 53.7484 18.6257 53.7318C15.4668 53.7318 11.7257 50.5563 11.7257 50.5563L9.81872 56.7921C9.81872 56.7921 13.458 61.1773 20.5909 61.1773C26.5229 61.1773 30.9264 56.7561 30.9264 49.8866C30.9264 41.1521 21.1004 39.7264 21.1004 35.9964C21.1004 35.3123 21.3261 32.6049 25.6932 32.6049C28.6774 32.6049 31.1011 33.8866 31.1011 33.8866L33.8742 25.7282ZM39.2021 9.92259C38.3068 7.23673 36.9239 4.89649 34.8495 4.64446C35.3663 6.10621 35.6866 7.9568 35.6866 10.2538V11.0027L39.2021 9.92259ZM32.2729 5.09811C29.9875 6.07021 27.3672 8.64086 25.9698 13.9766L33.2264 11.7588V11.3555C33.2264 8.58326 32.8479 6.53105 32.2802 5.09091L32.2729 5.09811ZM29.4853 2.48425C22.7454 2.48425 18.9533 11.2403 17.3593 16.6121L23.0947 14.8551C24.4558 7.81278 27.6802 4.28443 30.6862 2.88749C30.3369 2.63488 29.9178 2.49416 29.4853 2.48425Z"
                                fill="#EB3D3D"
                            />
                        </svg>
                    </div>

                    <span>Магазин</span>
                </div>
            </div>
        </footer>
    </section>
</template>
<script>
import telegram from './api/telegram.js'
import api from './api/users.api.js'

export default {
    data() {
        return {
            selectMode: 1,
            range: [],
            user: {}
        }
    },
    methods: {
        submitFilters() {
            const from = window.getClosestRow(0)
            const to = window.getClosestRow(1)

            if (parseFloat(from.dataset.sum) > parseFloat(to.dataset.sum)) {
                telegram.alert('Начальная ставка не должна превышать конечную', true)
                return
            }
            this.range = `${from.innerText} - ${to.innerText}`
            const url = new URL(document.location).searchParams

            if (url.has('coins')) {
                localStorage.setItem('coins', this.range)
                localStorage.setItem('selectMode', '2')
            } else {
                localStorage.setItem('cash', this.range)
                localStorage.setItem('selectMode', '1')
            }

            location.replace('/home')
        },
        searchParamHas(name) {
            return new URL(document.location).searchParams.has(name)
        }
    },
    mounted() {

        let scrollRect = document.querySelector('.vert__scrollblock').getBoundingClientRect()
        let scrollLineRect = document.querySelector('.vert__scrollblock-line').getBoundingClientRect()
        let scrollMidY = (scrollLineRect.top+scrollLineRect.bottom)/2
        let scrollH = scrollRect.bottom-scrollRect.top
        let scrollE = document.querySelectorAll('.vert__scroll')
        let scrollC = [0, 1].map(i=>Array.from(scrollE[i].querySelectorAll('span')))
        let scrollY = [0, 0]
        let scrollSY = [0, 0]

        let scrollTop = [0, 1].map(i=>scrollC[i][0].getBoundingClientRect().top)
        let scrollBottom = [0, 1].map(i=>scrollC[i][scrollC[i].length-1].getBoundingClientRect().bottom)

        function toMiddle(element) {
            let rect = element.getBoundingClientRect()
            return scrollMidY - (rect.top+rect.bottom)/2
        }

        function distanceToMiddle(element) {
            return Math.abs(toMiddle(element))
        }

        function getClosestRow(i) {
            return scrollC[i].reduce((a, b)=>distanceToMiddle(a)<distanceToMiddle(b) ? a : b)
        }

        window.getClosestRow = getClosestRow

        let lt = null

        function update(t) {
            if (lt===null) lt=t
            let dt = t-lt
            lt = t

            if (scroll) scrollY[scrollIndex] = scrollSY[scrollIndex] + ty-tsy

            for (let i=0; i<2; i++) {
                if (!(scroll && scrollIndex===i)) {
                    let closestRow = getClosestRow(i)
                    let tm = toMiddle(closestRow)
                    if (Math.abs(tm) > 2)
                        scrollY[i] += tm * 0.01 * dt
                }
                let st = scrollTop[i] + scrollY[i]
                let sb = scrollBottom[i] + scrollY[i]
                if (st > scrollMidY) scrollY[i] -= st - scrollMidY
                if (sb < scrollMidY) scrollY[i] -= sb - scrollMidY
                scrollE[i].style.transform = `translateY(${scrollY[i]}px)`
            }

            for (let span of scrollC[scrollIndex]) {
                let spanRect = span.getBoundingClientRect()
                let spanMidY = (spanRect.top+spanRect.bottom)/2
                span.style.fontSize = 15 + Math.cos((spanMidY-scrollMidY)/scrollH*4)*5 + 'px'
            }

            requestAnimationFrame(update)

        }

        requestAnimationFrame(update)

        let scroll = false
        let scrollIndex = 0
        let tsy = 0
        let tx = 0
        let ty = 0

        document.addEventListener('touchstart', e=>{

            let t = e.touches[0]

            tsy = t.clientY

            tx = t.clientX
            ty = t.clientY

            if (tx >= scrollRect.left && tx <= scrollRect.right &&
                ty >= scrollRect.top && ty <= scrollRect.bottom)
            {
                telegram.impactFeedback('light')
                scroll = true
                scrollIndex = tx>(scrollRect.left+scrollRect.right)/2 ? 1 : 0
                scrollSY[scrollIndex] = scrollY[scrollIndex]
            }

        })

        document.addEventListener('touchend', e=>{
            scroll = false
            telegram.impactFeedback('light')
        })

        document.addEventListener('touchmove', e=>{
            let t = e.touches[0]
            tx = t.clientX
            ty = t.clientY
        })

    },
    async created() {
        const profile = await telegram.profile()
        this.user = await api.profile(profile.id, profile.username)

        telegram.showBackButton()
        telegram.addOnClickHandlerForBackButton('/home')
        window.Telegram.WebApp.onEvent('viewportChanged', () => window.Telegram.WebApp.expand())
    }
}
</script>
