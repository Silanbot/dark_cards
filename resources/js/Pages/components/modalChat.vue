<template>
    <div class="background-modal">
        <div class="modal">
            <div class="modal__header">
                <div class="modal__none"></div>
                <div class="modal__header__title">Выберите причину</div>
                <div class="modal__header__close" @click="$emit('hide')">
                    <img src="../sources/close-modal.png" alt=""/>
                </div>
            </div>
            <div class="modal__colbtns">
                <div class="modal__colbtns__item">Затягивание игры</div>
                <div class="modal__colbtns__item active">Затягивание игры</div>
                <div class="modal__colbtns__item">Затягивание игры</div>
                <div class="modal__colbtns__item">Затягивание игры</div>
            </div>
            <div class="modal__finish">
                <div class="modal__finish__button">Отмена</div>
                <div class="modal__finish__button second">Отправить</div>
            </div>
        </div>
    </div>
</template>
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
    padding-bottom: 20px;

    .modal__finish {
        margin-top: 13px;
        display: grid;
        grid-template-columns: 5fr 8fr;
        gap: 9px;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;

        .modal__finish__button {
            padding: 13px 0;
            font-family: 'SF Pro Display';
            color: #eb3d3d;
            border-radius: 20px;
            background: #4a1919;
            border: 1px solid #eb3d3d;

            &.second {
                background: #eb3d3d;
                color: white;
                border-color: #eb3d3d;
            }
        }
    }

    .modal__colbtns {
        display: flex;
        flex-direction: column;
        color: white;
        font-family: 'SF Pro Display';
        font-size: 13px;
        gap: 12px;
        margin-top: 10px;

        .modal__colbtns__item {
            width: 90%;
            border-radius: 20px;
            margin: 0 auto;
            text-align: center;
            padding: 13px 0;
            border: 1px solid #643434;

            &.active {
                border-color: #eb3d3d;
                background: #eb3d3d;
            }
        }
    }

    .modal__header {
        align-items: center;
        width: 95%;
        display: flex;
        justify-content: space-between;
        padding: 20px 0 0 0;
        position: relative;

        .modal__header__title {
            color: white;
            font-family: 'SF Pro Display';
            text-align: center;
            font-size: 20px;
            font-weight: 500;
        }

        .modal__header__close {
            img {
                width: 30px;
                height: 30px;
            }
        }
    }
}
</style>
