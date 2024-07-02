<script setup></script>
<template>
    <div class="achievements__wrapper">
        <div class="achievements__header">
            <div class="achievements__counter__wrapper"><span>14/28</span></div>
            <div class="achievements__title">Достижения</div>
            <div class="achievements__close__button"><img src="./sources/achievements/cross-sign.svg" alt="x"></div>
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
        <div class="achievements__list">
            <div class="achievements__list__item">
                <div><img src="./sources/achievements/rank-1.svg" alt=""></div>
                <span>Победить в 10 матчах</span>
            </div>
            <div class="achievements__list__item">
                <div><img src="./sources/achievements/rank-1.svg" alt=""></div>
                <span>Выслуга лет, 2 года с нами</span>
            </div>
            <div class="achievements__list__item">
                <div><img src="./sources/achievements/rank-1.svg" alt=""></div>
                <span>Победить в 20 матчах</span>
            </div>
            <div class="achievements__list__item">
                <div><img src="./sources/achievements/rank-1.svg" alt=""></div>
                <span>Выслуга лет, 2 года с нами</span>
            </div>
            <div class="achievements__list__item">
                <div><img src="./sources/achievements/rank-1.svg" alt=""></div>
                <span>Победить в 20 матчах</span>
            </div>
            <div class="achievements__list__item">
                <div><img src="./sources/achievements/rank-1.svg" alt=""></div>
                <span>Победить в 10 матчах</span>
            </div>
            <div class="achievements__list__item">
                <div><img src="./sources/achievements/rank-1.svg" alt=""></div>
                <span>Победить в 20 матчах</span>
            </div>
            <div class="achievements__list__item">
                <div><img src="./sources/achievements/rank-1.svg" alt=""></div>
                <span>Выслуга лет, 2 года с нами</span>
            </div>
            <div class="achievements__list__item">
                <div><img src="./sources/achievements/rank-1.svg" alt=""></div>
                <span>Победить в 10 матчах</span>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                active: 1
            }
        }
    }
</script>
<style lang="scss" scoped>
    .achievements__wrapper {
        color: #fff;
        font-family: 'SF Pro Display', sans-serif;
        font-weight: 500;
        font-size: 20px;

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
            padding: 15px 30px;
            border: 1px solid #714242;
            border-radius: 10px;

            &, img {
                width: 40px;
                height: 40px;
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
            width: calc(100vw - 16px);
            border-top: 1px solid #5F2C2C;
            padding: 13px 0;
            display: flex;
            gap: 16px;

            span {
                display: flex;
                align-items: center;
            }
            > div:has(img) img {
                width: 32px;
                min-width: 32px;
                height: 32px;
                padding: 12px;
                background: #eb3d3d4b;
                border-radius: 100vw;
            }
        }
    }
</style>
