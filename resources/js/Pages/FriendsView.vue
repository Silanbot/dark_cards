<template>
    <div class="friends__wrapper">
        <div class="friends__header">
            <div class="friends__button"><img src="./sources/friends/lens-icon.svg" alt="🔍"></div>
            <div class="friends__title">
                Друзья
                <span id="invite__id__wrapper">Твой ID для друзей: <span id="invite__id">823838</span></span>
            </div>
            <div class="friends__button"><img src="./sources/achievements/cross-sign.svg" alt="x"></div>
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
            <div class="friends__list__row">
                <div class="friends__avatar__wrapper">
                    <img src="./sources/friends/avatar-sample-1.jpg" alt="">
                </div>
                <div>
                    <div class="friends__name">Никита Криповин</div>
                    <div class="friends__description">Валера Адидас</div>
                </div>
                <div class="friends__actions">
                    <div>
                        <img src="./sources/friends/action-message.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="friends__list__row">
                <div class="friends__avatar__wrapper">
                    <img src="./sources/friends/avatar-sample-2.jpg" alt="">
                </div>
                <div>
                    <div class="friends__name">Никита Криповин</div>
                    <div class="friends__description">Валера Адидас</div>
                </div>
                <div class="friends__actions">
                    <div>
                        <img src="./sources/friends/action-message.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="friends__list__row">
                <div class="friends__avatar__wrapper">
                    <img src="./sources/friends/avatar-sample-3.jpg" alt="">
                </div>
                <div>
                    <div class="friends__name">Никита Криповин</div>
                    <div class="friends__description">Валера Адидас</div>
                </div>
                <div class="friends__actions">
                    <div>
                        <img src="./sources/friends/action-message.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="friends__list__row">
                <div class="friends__avatar__wrapper">
                    <img src="./sources/friends/avatar-sample-1.jpg" alt="">
                </div>
                <div>
                    <div class="friends__name">Никита Криповин</div>
                    <div class="friends__description">Валера Адидас</div>
                </div>
                <div class="friends__actions">
                    <div>
                        <img src="./sources/friends/action-message.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="friends__list__row">
                <div class="friends__avatar__wrapper">
                    <img src="./sources/friends/avatar-sample-2.jpg" alt="">
                </div>
                <div>
                    <div class="friends__name">Никита Криповин</div>
                    <div class="friends__description">Валера Адидас</div>
                </div>
                <div class="friends__actions">
                    <div>
                        <img src="./sources/friends/action-message.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="friends__list__row">
                <div class="friends__avatar__wrapper">
                    <img src="./sources/friends/avatar-sample-3.jpg" alt="">
                </div>
                <div>
                    <div class="friends__name">Никита Криповин</div>
                    <div class="friends__description">Валера Адидас</div>
                </div>
                <div class="friends__actions">
                    <div>
                        <img src="./sources/friends/action-message.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="friends__pagination">
            <div class="arrow"><img src="./sources/friends/arrow-next.svg" alt=""></div>
            <div class="arrow active"><img src="./sources/friends/arrow-next.svg" alt=""></div>
        </div>
    </div>
</template>
<script>
    //
</script>
<style lang="scss" scoped>
    .friends__wrapper {
        color: #fff;
        font-family: 'SF Pro Display', sans-serif;
        font-weight: 500;
        font-size: 20px;

        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    .friends__header {
        max-width: calc(100vw - 16px);
        display: flex;
        align-items: center;

        .friends__counter__wrapper {
            background: #622D2D;
            padding: 6px 12px;
            border-radius: 100vmax;
        }
        .friends__title {
            margin: 0 auto;
            font-size: 32px;
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
        width: calc(100vw - 16px);
        border-top: 1px solid #5F2C2C;
        padding: 8px 0;
        display: flex;
        align-items: center;
        gap: 16px;

        .friends__avatar__wrapper {
            &, img {
                border-radius: 12px;
                width: 92px;
                min-width: 92px;
                height: 92px;
            }
        }
        .friends__name {
            font-weight: normal;
        }
        .friends__description {
            color: #C2A3A3;
            font-size: 16px;
        }
        :last-child, .friends__actions {
            margin-left: auto;
            > div:has(img) {
                background: #622D2D;
                padding: 10px;
                border-radius: 100vw;

                &, img {
                    width: 24px;
                    min-width: 24px;
                    height: 24px;
                }
            }
        }
    }
    .friends__pagination {
        display: flex;
        margin: 0 auto;
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
