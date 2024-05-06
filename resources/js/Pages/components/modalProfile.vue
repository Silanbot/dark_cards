<script setup>
import modalChat from './modalChat.vue'
</script>

<template>
    <modalChat @hide="modalChatShow = false" v-if="modalChatShow" />
    <div class="background-modal">
        <div class="modal">
            <div class="modal__inner">
                <div class="modal__photo">
                    <img src="../sources/mell.png" alt=""/>
                </div>
                <div class="modal__header">
                    <div class="modal__header__close" @click="$emit('hide')">
                        <img src="../sources/close-modal.png" alt=""/>
                    </div>
                </div>
                <div class="modal__name">Константин</div>
                <div class="modal__medal">
                    <img src="../sources/m1.png" alt=""/>
                    <img src="../sources/m2.png" alt=""/>
                    <img src="../sources/m3.png" alt=""/>
                </div>
                <div class="modal__prize">
                    <div class="modal__prize__title">Всего</div>
                    <div class="modal__prize__col">
                        <div class="modal__prize__row">
                            <img src="../sources/cube.png" alt=""/>
                            <span>{{ total_wins }}</span>
                        </div>
                        <div class="modal__prize__row">
                            <img src="../sources/dollar.png" alt=""/>
                            <span>{{ total_dollars }}</span>
                        </div>
                        <div class="modal__prize__row">
                            <img src="../sources/dc_small.png" alt=""/>
                            <span>{{ total_coins }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal__btns">
                <div class="modal__btns__item" @click="modalChatShow = true">
                    <span>Жалоба</span>
                </div>
                <div class="modal__btns__item second">
                    <span>В друзья</span>
                    <svg
                        width="47"
                        height="49"
                        viewBox="0 0 47 49"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M0 24.0596C0 24.8406 0.619975 25.4738 1.38475 25.4738H11.0576C17.1646 25.4738 22.1152 30.5298 22.1152 36.7667L22.1152 46.6454C22.1152 47.4264 22.7352 48.0596 23.5 48.0596C24.2648 48.0596 24.8848 47.4264 24.8848 46.6454V36.7667C24.8848 30.5298 29.8354 25.4738 35.9424 25.4738H45.6152C46.38 25.4738 47 24.8406 47 24.0596C47 23.2785 46.38 22.6454 45.6152 22.6454H35.9424C29.8354 22.6454 24.8848 17.5894 24.8848 11.3525V1.47378C24.8848 0.692736 24.2648 0.0595699 23.5 0.0595703C22.7352 0.0595707 22.1152 0.692738 22.1152 1.47379L22.1152 11.3525C22.1152 17.5894 17.1646 22.6454 11.0576 22.6454H1.38475C0.619974 22.6454 0 23.2785 0 24.0596Z"
                            fill="white"
                        />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            total_wins: 0,
            total_coins: 0,
            total_dollars: 0,
            modalChatShow: false,
        }
    }
}
</script>

<style lang="scss" scoped>
.background-modal {
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    -webkit-backdrop-filter: brightness(0.5);
    backdrop-filter: brightness(0.5);
    width: 100dvw;
    height: 100dvh;
    z-index: 10;
}

.modal {
    border: 1px solid #643434;
    border-radius: 30px;
    width: 80%;
    background: #2e1010;
    align-self: center;
    position: relative;

    .modal__btns {
        margin-top: 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        width: 90%;
        margin: 0 auto;
        padding: 10px 0;

        .modal__btns__item {
            border-radius: 20px;
            color: #eb3d3d;
            border: 1px solid #eb3d3d;
            background-color: #411414;
            font-family: 'SF Pro Display';
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            gap: 5px;
            height: 40px;
            font-size: 15px;

            &.second {
                color: white;
                background: #eb3d3d;
            }

            svg {
                width: 15px;
                height: 15px;
            }
        }
    }

    .modal__inner {
        border-radius: 30px;
        background: #381515;
    }

    .modal__photo {
        position: absolute;
        flex-shrink: 0;
        width: 100%;
        justify-content: center;
        align-items: center;
        display: flex;

        img {
            position: relative;
            top: -65px;
            width: 35%;
            aspect-ratio: 1/1;
            object-fit: cover;
        }
    }

    position: relative;

    .modal__prize {
        padding: 10px 0;
        width: 60%;
        margin: 0 auto;

        .modal__prize__title {
            font-family: 'SF Pro Display';
            text-align: center;
            color: #7a3c3c;
            font-size: 15px;
        }

        .modal__prize__col {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 14px;

            .modal__prize__row {
                display: flex;
                gap: 10px;
                padding-bottom: 8px;
                border-bottom: 1px solid #5f2c2c;
                justify-content: center;
                align-items: center;
            }

            img {
                height: 20px;
            }

            span {
                font-family: 'SF Pro Display';
                color: white;
                font-size: 15px;
                font-weight: 500;
            }
        }
    }

    .modal__medal {
        padding: 7px 0;
        justify-content: center;
        display: flex;
        gap: 15px;
        background-color: #482020;
        border-top: 1px solid #643434;
        border-bottom: 1px solid #643434;

        img {
            width: 20px;
            flex-shrink: 0;
            align-self: center;
        }
    }

    .modal__name {
        padding: 10px 0;
        font-family: 'SF Pro Display';
        font-weight: 700;
        color: white;
        text-align: center;
        font-size: 20px;
    }

    .modal__header {
        width: 95%;
        display: flex;
        justify-content: flex-end;
        padding: 20px 0 0 0;
        position: relative;

        .modal__header__close {
            img {
                width: 30px;
                height: 30px;
            }
        }
    }
}
</style>
