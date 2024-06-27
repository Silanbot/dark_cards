<template>
    <div class="friends__wrapper">
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
</style>
