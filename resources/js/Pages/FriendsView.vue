<template>
    <section class="inter section section-inter">
        <div class="friends__wrapper">
            <div class="friends__header">
                <div class="friends__title">
                    Друзья
                    <span id="invite__id__wrapper">Твой ID для друзей: <span id="invite__id">823838</span></span>
                </div>
                <div class="friends__header__actions">
                    <div class="input">
                        <input type="text" name="" id="" placeholder="Начните вводить.." @input="e => this.isTyping = Boolean(e.target.value.length)">
                        <img src="./sources/friends/lens-icon.svg" alt="🔍">
                    </div>
                    <a href="/profile" class="friends__button"><img src="./sources/achievements/cross-sign.svg" alt="x"></a>
                </div>
            </div>
            <div class="unfriend__popup__dialog__wrapper">
                <div class="unfriend__popup__dialog">
                    <div class="dialog__question">Вы действительно хотите удалить ‘Никита’ из друзей?</div>
                    <div class="dialog__answer__buttons">
                        <div class="n">Нет</div>
                        <div class="y">Да</div>
                    </div>
                </div>
            </div>
            <div class="friends__list">
                <div class="friends__list__row" v-for="n in 6" :key="n">
                    <div class="friends__avatar__wrapper">
                        <img :src="imgs[n%imgs.length]" alt="">
                    </div>
                    <div>
                        <div class="friends__name">Никита Криповин</div>
                        <div class="friends__description">Валера Адидас</div>
                    </div>
                    <div class="friends__actions">
                        <div v-if="!isTyping"><img src="./sources/friends/action-invite-decline.svg" alt=""></div>
                        <div v-if="!isTyping"><img src="./sources/friends/action-invite-accept.svg" alt=""></div>
                        <div v-if="isTyping"><img src="./sources/friends/action-message.svg" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="friends__pagination">
                <div class="arrow"><img src="./sources/friends/arrow-next.svg" alt=""></div>
                <div class="arrow active"><img src="./sources/friends/arrow-next.svg" alt=""></div>
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
    import avatar1 from './sources/friends/avatar-sample-1.jpg'
    import avatar2 from './sources/friends/avatar-sample-2.jpg'
    import avatar3 from './sources/friends/avatar-sample-3.jpg'

    export default {
        data() {
            return {
                isTyping: false,
                imgs: [avatar1, avatar2, avatar3]
            }
        }
    }
</script>
<style lang="scss" scoped>
    .friends__wrapper {
        background: #280A0A;
        color: #fff;
        font-family: 'SF Pro Display', sans-serif;
        font-weight: 500;
        font-size: 20px;

        position: relative;
        width: calc(100vw - 8px * 2);
        height: 100vh;
        left: -7px;
        margin-top: auto;
        padding: 16px 8px 0 16px;
        overflow-y: scroll;

        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    .friends__header {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;

        .friends__counter__wrapper {
            background: #622D2D;
            padding: 6px 12px;
            border-radius: 100vmax;
        }
        .friends__title {
            margin: 0 auto;
            font-size: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;

            #invite__id__wrapper {
                font-weight: normal;
                font-size: 16px;

                color: #724F4F;
                #invite__id {
                    color: #fff;
                }
            }
        }
        .friends__header__actions {
            width: 100%;
            display: flex;
            justify-content: space-between;

            .input {
                border-radius: 100vw;
                padding: 10px 16px;
                display: flex;
                align-items: center;
                gap: 8px;
                &, input {
                    background: #622D2D;
                }
                input {
                    font-size: 15px;
                    color: #fff;
                    outline: none;
                    border: none;
                    padding: 0;
                    &::placeholder {
                        color: #C2A3A3;
                    }
                }
                img {
                    width: 20px;
                    height: 20px;
                }
            }
        }
        .friends__button {
            background: #622D2D;
            padding: 9px;
            border-radius: 100vmax;

            &, img {
                width: 20px;
                height: 20px;
            }
        }
    }
    .unfriend__popup__dialog__wrapper.visible {
        visibility: visible;
    }
    .unfriend__popup__dialog__wrapper {
        // visibility: hidden;
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;

        .unfriend__popup__dialog {
            margin: 0 24px;
        }
        .dialog__question {
            font-size: 16px;
            font-weight: normal;
            padding: 12px 24px;
            background: #381515;
            border: 1px solid #643434;
            border-radius: 20px 20px 0 0;
        }
        .dialog__answer__buttons {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 24px;
            padding: 12px;
            background: #2E1010;
            border: 1px solid #643434;
            border-top: none;
            border-radius: 0 0 20px 20px;

            * {
                font-size: 14px;
                padding: 8px 48px;
                border-radius: calc(100vmax / 2);
                color: #fff;
            }
            .y {
                background: #EB3D3D;
            }
            .n {
                background: #411414;
                border: 1px solid #EB3D3D;
            }
        }
    }
    .friends__list__row {
        border-top: 1px solid #5F2C2C;
        padding: 8px 0;
        display: flex;
        align-items: center;
        gap: 16px;

        .friends__avatar__wrapper {
            &, img {
                border-radius: 12px;
                width: 84px;
                min-width: 84px;
                height: 84px;
            }
        }
        .friends__name {
            font-weight: normal;
        }
        .friends__description {
            color: #C2A3A3;
            font-size: 16px;
        }
        .friends__actions {
            display: flex;
            gap: 4px;
            margin-left: auto;
            div:has(img) {
                background: #622D2D;
                padding: 10px;
                border-radius: 100vw;

                &, img {
                    width: 20px;
                    min-width: 20px;
                    height: 20px;
                }
            }
        }
    }
    .friends__pagination {
        display: flex;
        margin-top: auto;
        margin: -10px auto 48px auto;
        gap: 16px;

        > * {
            padding: 10px;
            border-radius: 100vw;

            border: 1px solid #fff;
            filter: invert(33%) sepia(8%) saturate(3209%) hue-rotate(314deg) brightness(89%) contrast(85%);;
            &.active {
                filter: invert(41%) sepia(723%) saturate(5017%) hue-rotate(332deg) brightness(90%) contrast(106%);
            }
            &, img {
                width: 24px;
                min-width: 24px;
                height: 24px;
            }
        }
        > :first-child img {
            transform: rotate(-180deg);
            position: relative;
            right: 2px;
        }
        > :not(:first-child) img {
            position: relative;
            left: 2px;
        }
    }
</style>
