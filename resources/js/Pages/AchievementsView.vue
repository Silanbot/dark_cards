<script setup></script>
<template>
    <section class="inter section section-inter">
        <div class="achievements__wrapper">
            <div class="achievements__header">
                <div class="achievements__counter__wrapper"><span>0/27</span></div>
                <div class="achievements__title">Достижения</div>
<!--                <a href="/profile" class="achievements__close__button"><img src="./sources/achievements/cross-sign.svg" alt="x"></a>-->
            </div>
            <div class="achievement__categories">
                <div class="achievement__category__switch"
                    :class="{'active': this.active == 1}"
                    @click="this.active = 1">
                    <img src="./sources/achievements/category-1.svg" alt="">
                </div>
                <div class="achievement__category__switch"
                    :class="{'active': this.active == 2}"
                    @click="this.active = 2">
                    <img src="./sources/achievements/category-2.svg" alt="">
                </div>
                <div class="achievement__category__switch"
                    :class="{'active': this.active == 3}"
                    @click="this.active = 3">
                    <img src="./sources/achievements/category-3.svg" alt="">
                </div>
            </div>
            <div class="achievements__list" v-if="active == 1">
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/medal-1.svg" alt="">
                    <span>Достичь 20 кубков</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/medal-2.svg" alt="">
                    <span>Достичь 50 кубков</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/medal-3.svg" alt="">
                    <span>Достичь 100 кубков</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/medal-4.svg" alt="">
                    <span>Достичь 200 кубков</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/medal-5.svg" alt="">
                    <span>Достичь 500 кубков</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/medal-6.svg" alt="">
                    <span>Достичь 1000 кубков</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/medal-7.svg" alt="">
                    <span>Достичь 10к кубков</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/medal-8.svg" alt="">
                    <span>Достичь 50к кубков</span>
                </div>
                <div class="achievements__list__item unachieved__inactive" style="padding-bottom: 40px">
                    <img src="./sources/achievements/medal-9.svg" alt="">
                    <span>Достичь 100к кубков</span>
                </div>
            </div>
            <div class="achievements__list" v-if="active == 2">
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/rank-1.svg" alt="">
                    <span>Заработать $2</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/rank-2.svg" alt="">
                    <span>Заработать $20</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/rank-6.svg" alt="">
                    <span>Заработать $100</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/rank-7.svg" alt="">
                    <span>Заработать $1000</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/rank-3.svg" alt="">
                    <span>Заработать $10к</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/rank-4.svg" alt="">
                    <span>Заработать $50к</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/rank-5.svg" alt="">
                    <span>Заработать $100к</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/rank-8.svg" alt="">
                    <span>Заработать $500к</span>
                </div>
                <div class="achievements__list__item unachieved__inactive" style="padding-bottom: 40px">
                    <img src="./sources/achievements/rank-9.svg" alt="">
                    <span>Заработать $1М</span>
                </div>
            </div>
            <div class="achievements__list" v-if="active == 3">
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/achievement-1.svg" alt="">
                    <span>Заработать 2000 DC</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/achievement-2.svg" alt="">
                    <span>Заработать 10к DC</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/achievement-3.svg" alt="">
                    <span>Заработать 50к DC</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/achievement-4.svg" alt="">
                    <span>Заработать 200к DC</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/achievement-5.svg" alt="">
                    <span>Заработать 500к DC</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/achievement-6.svg" alt="">
                    <span>Заработать 1М DC</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/achievement-7.svg" alt="">
                    <span>Заработать 10М DC</span>
                </div>
                <div class="achievements__list__item unachieved__inactive">
                    <img src="./sources/achievements/achievement-8.svg" alt="">
                    <span>Заработать 50М DC</span>
                </div>
                <div class="achievements__list__item unachieved__inactive" style="padding-bottom: 40px">
                    <img src="./sources/achievements/achievement-9.svg" alt="">
                    <span>Заработать 100М DC</span>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="footer__inner">
                <a class="footer__item">
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
    import telegram from "./api/telegram.js";

    export default {
        data() {
            return {
                active: 1
            }
        },
        created() {
            telegram.showBackButton()
            telegram.addOnClickHandlerForBackButton('/profile')
        }
    }
</script>
<style lang="scss" scoped>
    .achievements__wrapper {
        color: #fff;
        font-family: 'SF Pro Display', sans-serif;
        font-weight: 500;
        font-size: 20px;

        position: relative;
        background: #280A0A;
        padding: 20px 16px 0 10px;

        display: flex;
        flex-direction: column;
        gap: 24px;

        height: calc(100vh - 20px);
        overflow-y: scroll;
    }
    .achievements__header {
        display: flex;
        align-items: center;

        .achievements__counter__wrapper {
            font-size: 16px;
            background: #622D2D;
            padding: 6px 12px;
            border-radius: 100vmax;
        }
        .achievements__title {
            margin: 0 auto;
            font-size: 32px;
        }
        .achievements__close__button {
            background: #622D2D;
            padding: 9px;
            border-radius: 100vmax;

            &, img {
                width: 20px;
                height: 20px;
            }
        }
    }
    .achievement__categories {
        display: flex;
        justify-content: center;
        gap: 14px;

        .achievement__category__switch {
            background: #250E0EA6;
            padding: 12px 22px;
            border: 1px solid #714242;
            border-radius: 8px;

            &, img {
                width: 28px;
                height: 28px;
            }
            &.active {
                background: #EB3D3DA6;
            }
        }
    }
    .achievements__list {
        display: flex;
        flex-direction: column;

        .achievements__list__item {
            font-size: 16px;
            width: calc(100vw - 16px);
            border-top: 1px solid #5F2C2C;
            padding: 6px 0;
            margin: auto 0;
            display: flex;
            gap: 16px;

            &.unachieved__inactive {
                filter: brightness(calc(2 / 3));
            }
            span {
                display: flex;
                align-items: center;
            }
            > img {
                width: 32px;
                min-width: 32px;
                height: 32px;
                padding: 8px;
                background: #eb3d3d4b;
                border-radius: 100vw;
            }
        }
    }
</style>
