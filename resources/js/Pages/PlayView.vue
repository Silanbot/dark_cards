<script setup>
import modalProfile from './components/modalProfile.vue'
import modalChat from './components/modalChat.vue'
import modalDialog from './components/modalDialog.vue'
</script>

<template>
    <modalProfile @showReport="modalChatShow = true; modalProfileShow = false" @hide="modalProfileShow = false"
                  v-if="modalProfileShow"/>
    <modalChat @hide="modalChatShow = false" v-if="modalChatShow"/>
    <modalDialog @hide="modalDialogShow = false" v-if="modalDialogShow"/>
    <div style="display:none">
        <img data-cardimg="b" src="./sources/cards/back.svg">
        <img data-cardimg="6s" src="./sources/cards/6_of_spades.svg">
        <img data-cardimg="ac" src="./sources/cards/ace_of_clubs.svg">
        <img data-cardimg="kc" src="./sources/cards/king_of_clubs.svg">
        <img data-cardimg="bj" src="./sources/cards/black_joker.svg">
        <img data-cardimg="jh" src="./sources/cards/jack_of_hearts.svg">
        <img data-cardimg="rj" src="./sources/cards/red_joker.svg">
        <img data-cardimg="kh" src="./sources/cards/king_of_hearts.svg">
        <img data-cardimg="qh" src="./sources/cards/queen_of_hearts.svg">
        <img data-cardimg="9h" src="./sources/cards/9_of_hearts.svg">
        <img data-cardimg="4c" src="./sources/cards/4_of_clubs.svg">
        <img data-cardimg="8h" src="./sources/cards/8_of_hearts.svg">
        <img data-cardimg="qc" src="./sources/cards/queen_of_clubs.svg">
        <img data-cardimg="7s" src="./sources/cards/7_of_spades.svg">
        <img data-cardimg="5d" src="./sources/cards/5_of_diamonds.svg">
        <img data-cardimg="ad" src="./sources/cards/ace_of_diamonds.svg">
        <img data-cardimg="2s" src="./sources/cards/2_of_spades.svg">
        <img data-cardimg="qs" src="./sources/cards/queen_of_spades.svg">
        <img data-cardimg="7h" src="./sources/cards/7_of_hearts.svg">
        <img data-cardimg="1d" src="./sources/cards/10_of_diamonds.svg">
        <img data-cardimg="2h" src="./sources/cards/2_of_hearts.svg">
        <img data-cardimg="qd" src="./sources/cards/queen_of_diamonds.svg">
        <img data-cardimg="6h" src="./sources/cards/6_of_hearts.svg">
        <img data-cardimg="2c" src="./sources/cards/2_of_clubs.svg">
        <img data-cardimg="kd" src="./sources/cards/king_of_diamonds.svg">
        <img data-cardimg="ah" src="./sources/cards/ace_of_hearts.svg">
        <img data-cardimg="3d" src="./sources/cards/3_of_diamonds.svg">
        <img data-cardimg="3c" src="./sources/cards/3_of_clubs.svg">
        <img data-cardimg="9s" src="./sources/cards/9_of_spades.svg">
        <img data-cardimg="jc" src="./sources/cards/jack_of_clubs.svg">
        <img data-cardimg="9c" src="./sources/cards/9_of_clubs.svg">
        <img data-cardimg="9d" src="./sources/cards/9_of_diamonds.svg">
        <img data-cardimg="2d" src="./sources/cards/2_of_diamonds.svg">
        <img data-cardimg="8s" src="./sources/cards/8_of_spades.svg">
        <img data-cardimg="5h" src="./sources/cards/5_of_hearts.svg">
        <img data-cardimg="8d" src="./sources/cards/8_of_diamonds.svg">
        <img data-cardimg="js" src="./sources/cards/jack_of_spades.svg">
        <img data-cardimg="1c" src="./sources/cards/10_of_clubs.svg">
        <img data-cardimg="4s" src="./sources/cards/4_of_spades.svg">
        <img data-cardimg="as" src="./sources/cards/ace_of_spades.svg">
        <img data-cardimg="5s" src="./sources/cards/5_of_spades.svg">
        <img data-cardimg="3s" src="./sources/cards/3_of_spades.svg">
        <img data-cardimg="6d" src="./sources/cards/6_of_diamonds.svg">
        <img data-cardimg="7d" src="./sources/cards/7_of_diamonds.svg">
        <img data-cardimg="3h" src="./sources/cards/3_of_hearts.svg">
        <img data-cardimg="4d" src="./sources/cards/4_of_diamonds.svg">
        <img data-cardimg="ks" src="./sources/cards/king_of_spades.svg">
        <img data-cardimg="1h" src="./sources/cards/10_of_hearts.svg">
        <img data-cardimg="5c" src="./sources/cards/5_of_clubs.svg">
        <img data-cardimg="4h" src="./sources/cards/4_of_hearts.svg">
        <img data-cardimg="8c" src="./sources/cards/8_of_clubs.svg">
        <img data-cardimg="1s" src="./sources/cards/10_of_spades.svg">
        <img data-cardimg="6c" src="./sources/cards/6_of_clubs.svg">
        <img data-cardimg="7c" src="./sources/cards/7_of_clubs.svg">
        <img data-cardimg="jd" src="./sources/cards/jack_of_diamonds.svg">
    </div>
    <section class="inter section section-inter">
        <div class="inter__header inter__header_play">
            <div class="inter__monet inter__monet_icon">
                <svg width="75" height="102" viewBox="0 0 75 102" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="gostroke"
                          d="M21.7397 1.5C14.3953 1.5 8.44141 7.45384 8.44141 14.7983L8.44141 86.3537C8.44141 93.6981 14.3953 99.652 21.7397 99.652L59.3046 99.652C66.649 99.652 72.6028 93.6981 72.6028 86.3537L72.6028 14.7983C72.6028 7.45384 66.649 1.5 59.3045 1.5L21.7397 1.5ZM28.208 5.12248C28.208 3.35103 29.644 1.91499 31.4155 1.91499L50.7671 1.91499C52.5385 1.91499 53.9746 3.35103 53.9746 5.12248C53.9746 6.89393 52.5385 8.32997 50.7671 8.32997L31.4155 8.32997C29.644 8.32997 28.208 6.89394 28.208 5.12248Z"
                          fill="#381515" stroke="#834444" stroke-width="3"/>
                    <path class="gofill"
                          d="M34.5114 51.6187L20.6394 65.3912C19.7881 66.2364 18.408 66.2364 17.5567 65.3912C16.7055 64.5461 16.7055 63.1758 17.5567 62.3307L27.7076 52.2526L3.17978 52.2526C1.97592 52.2526 1 51.2837 1 50.0885C1 48.8932 1.97592 47.9243 3.17978 47.9243L27.7076 47.9243L17.5567 37.8463C16.7055 37.0011 16.7055 35.6309 17.5567 34.7857C18.408 33.9406 19.7881 33.9406 20.6394 34.7857L34.5114 48.5582C35.3627 49.4033 35.3627 50.7736 34.5114 51.6187Z"
                          fill="#834444"/>
                    <path
                        d="M34.8637 51.9736L20.9917 65.746C19.9455 66.7848 18.2507 66.7848 17.2045 65.746C16.1562 64.7053 16.1562 63.0165 17.2045 61.9758L26.4944 52.7526L3.17978 52.7526C1.70318 52.7526 0.500001 51.5632 0.500001 50.0885C0.5 48.6137 1.70318 47.4243 3.17978 47.4243L26.4944 47.4243L17.2044 38.2011C16.1562 37.1604 16.1562 35.4716 17.2044 34.4309C18.2507 33.3922 19.9455 33.3922 20.9917 34.4309L34.8637 48.2034C35.9119 49.2441 35.9119 50.9329 34.8637 51.9736Z"
                        stroke="#381515" stroke-opacity="0.5"/>
                </svg>
            </div>
            <div class="inter__monet inter__monet_icon">
                <svg width="119" height="68" viewBox="0 0 119 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="gostroke"
                          d="M9.47656 52.3887C9.47656 59.7332 15.4304 65.687 22.7748 65.687L94.3303 65.687C101.675 65.687 107.629 59.7331 107.629 52.3887L107.629 14.8239C107.629 7.47944 101.675 1.52558 94.3303 1.52558L22.7748 1.52559C15.4304 1.52559 9.47656 7.47945 9.47656 14.8239L9.47656 52.3887Z"
                          fill="#381515" stroke="#834444" stroke-width="3"/>
                    <path class="gofill"
                          d="M34.5114 35.4674L20.6394 49.2398C19.7881 50.085 18.408 50.085 17.5567 49.2398C16.7055 48.3947 16.7055 47.0244 17.5567 46.1793L27.7076 36.1012L3.17978 36.1012C1.97592 36.1012 1 35.1323 1 33.9371C1 32.7419 1.97592 31.773 3.17978 31.773L27.7076 31.773L17.5567 21.6949C16.7055 20.8498 16.7055 19.4795 17.5567 18.6343C18.408 17.7892 19.7881 17.7892 20.6394 18.6343L34.5114 32.4068C35.3627 33.252 35.3627 34.6222 34.5114 35.4674Z"
                          fill="#834444"/>
                    <path
                        d="M34.8637 35.8222L20.9917 49.5947C19.9455 50.6334 18.2507 50.6334 17.2045 49.5947C16.1562 48.554 16.1562 46.8652 17.2045 45.8245L26.4944 36.6012L3.17978 36.6012C1.70318 36.6012 0.500001 35.4118 0.500001 33.9371C0.5 32.4623 1.70318 31.273 3.17978 31.273L26.4944 31.273L17.2044 22.0497C16.1562 21.009 16.1562 19.3202 17.2044 18.2795C18.2507 17.2408 19.9455 17.2408 20.9917 18.2795L34.8637 32.052C35.9119 33.0927 35.9119 34.7815 34.8637 35.8222Z"
                        stroke="#381515" stroke-opacity="0.5"/>
                    <path class="gofill"
                          d="M83.7854 35.4674L97.6575 49.2398C98.5087 50.085 99.8889 50.085 100.74 49.2398C101.591 48.3947 101.591 47.0244 100.74 46.1793L90.5892 36.1012L115.117 36.1012C116.321 36.1012 117.297 35.1323 117.297 33.9371C117.297 32.7419 116.321 31.773 115.117 31.773L90.5892 31.773L100.74 21.6949C101.591 20.8497 101.591 19.4795 100.74 18.6343C99.8889 17.7892 98.5087 17.7892 97.6575 18.6343L83.7854 32.4068C82.9342 33.252 82.9342 34.6222 83.7854 35.4674Z"
                          fill="#834444"/>
                    <path
                        d="M83.4332 35.8222L97.3052 49.5947C98.3514 50.6334 100.046 50.6334 101.092 49.5947C102.141 48.554 102.141 46.8652 101.092 45.8245L91.8025 36.6012L115.117 36.6012C116.594 36.6012 117.797 35.4118 117.797 33.9371C117.797 32.4623 116.594 31.273 115.117 31.273L91.8025 31.273L101.092 22.0497C102.141 21.009 102.141 19.3202 101.092 18.2795C100.046 17.2408 98.3514 17.2408 97.3052 18.2795L83.4332 32.052C82.3849 33.0927 82.3849 34.7815 83.4332 35.8222Z"
                        stroke="#381515" stroke-opacity="0.5"/>
                </svg>
            </div>
            <div class="inter__monet inter__monet_icon">
                <svg width="96" height="50" viewBox="0 0 96 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="gofill"
                          d="M46.074 1.92161C48.3774 2.03123 50.6746 2.23808 53.0103 2.65666C61.458 4.17016 65.9358 6.48959 75.0472 9.3928L81.1156 32.0422C80.0566 33.0375 76.7713 35.756 72.1931 36.0707C72.4883 35.2887 72.5519 34.3876 72.3723 33.4249C72.116 32.0507 71.3549 30.5394 70.0547 29.0883C69.379 28.3347 68.7499 27.8096 68.0007 27.1801L46.8626 9.42602C46.4746 9.10024 46.0634 8.85375 45.6364 8.67768C44.3511 8.1486 42.9958 8.29166 41.7335 8.85042C40.5491 9.37464 39.4436 10.272 38.5735 11.308C36.0947 14.2593 36.0823 18.6554 31.2745 19.9464C30.6646 20.1103 30.1236 20.1306 29.7059 20.0181C29.3952 19.9346 29.1673 19.7747 29.063 19.5473C28.7102 18.779 30.4099 15.7487 30.6261 14.838C30.8575 13.864 30.976 12.8083 30.9698 12.0318C30.9148 5.16433 40.8583 2.23875 46.074 1.92161Z"
                          fill="#834444"/>
                    <path class="gofill"
                          d="M47.5336 48.9639C47.2646 49.3765 46.902 49.6577 46.4855 49.8203C46.0459 49.9921 45.5345 50.0373 44.9964 49.9704C44.2791 49.8812 43.5292 49.5948 42.8374 49.1437L15.14 31.0731L20.9415 9.42092L31.2514 6.45637C29.9863 8.0011 29.2136 9.85411 29.2311 12.0455C29.2362 12.6829 29.1319 13.5794 28.9284 14.4358C28.4726 16.3544 26.5798 18.3071 27.4811 20.2702C27.816 20.999 28.4425 21.4833 29.2559 21.7022C29.9623 21.8924 30.8154 21.8747 31.7245 21.6304C37.4819 20.0846 37.2516 15.5912 39.9098 12.4262C40.6184 11.5824 41.5036 10.8582 42.4357 10.4459C43.2899 10.0678 44.1772 9.95842 44.9749 10.2869C45.2338 10.3934 45.4914 10.55 45.7447 10.7626L62.8759 25.1513C64.6452 26.6373 67.1627 28.466 68.7592 30.2475C69.837 31.4503 70.4606 32.6637 70.661 33.7385C71.0404 35.7726 69.905 36.9116 67.9708 37.0155C67.1096 37.0618 66.066 36.9099 64.8465 36.5101L54.0465 26.8347C53.6888 26.5146 53.1392 26.5452 52.8191 26.9029C52.4991 27.2605 52.5297 27.81 52.8874 28.13L63.5815 37.7109C64.3923 44.5199 58.604 42.992 57.5623 42.6645L47.6731 33.674C47.3175 33.3502 46.7663 33.3761 46.4425 33.732C46.1187 34.0877 46.1447 34.6389 46.5005 34.9627L55.9649 43.5672C56.8384 45.0299 53.6558 49.1373 49.3839 46.7948L41.2761 39.8128C40.9127 39.4984 40.3633 39.538 40.0488 39.9014C39.7346 40.2649 39.7742 40.8143 40.1376 41.1288L47.8322 47.7551C48.1351 48.016 47.7148 48.6861 47.5336 48.9639Z"
                          fill="#834444"/>
                    <path class="gofill"
                          d="M13.3338 31.0795C13.2897 31.1736 13.2638 31.2726 13.2554 31.3723L12.9117 32.6546C12.7053 33.4257 12.2013 34.0427 11.5559 34.4157C11.5353 34.4277 11.5141 34.4387 11.4946 34.452C10.8619 34.7966 10.1005 34.9096 9.352 34.7089L2.15399 32.7802C2.14136 32.7768 2.12874 32.7726 2.11612 32.7698C1.36051 32.5567 0.757035 32.0595 0.391853 31.4266C0.0193621 30.7816 -0.108197 29.9943 0.0990866 29.2207C0.102851 29.2061 0.107502 29.1915 0.110824 29.1767L7.3507 2.1557C7.5571 1.38455 8.06113 0.767539 8.70646 0.394589C8.72705 0.38263 8.74831 0.371779 8.7678 0.358269C9.40073 0.0136667 10.1621 -0.0992819 10.9106 0.101367L18.1091 2.03012C18.88 2.23675 19.4972 2.74081 19.8699 3.38617C19.8821 3.40698 19.8931 3.42802 19.9064 3.44751C20.251 4.08047 20.3637 4.84187 20.1633 5.59043L19.425 8.34614C19.378 8.44337 19.349 8.54967 19.341 8.6593L13.3338 31.0795Z"
                          fill="#834444"/>
                    <path class="gofill"
                          d="M82.9898 32.302C82.9958 32.1313 82.9515 31.9594 82.858 31.8101L76.6792 8.74877C76.684 8.57736 76.6377 8.41081 76.5505 8.26885L75.8323 5.58822C75.6317 4.83966 75.7446 4.07825 76.0892 3.4453C76.1025 3.42603 76.1153 3.40566 76.1273 3.38506C76.5002 2.7397 77.1154 2.23476 77.8865 2.02813L85.085 0.0991528C85.8335 -0.101496 86.5949 0.0114522 87.2278 0.356055C87.2473 0.369564 87.2672 0.382189 87.2881 0.394148C87.9334 0.767099 88.4383 1.38255 88.6449 2.15348L95.901 29.2345C96.1014 29.983 95.9887 30.7444 95.6438 31.3774C95.6306 31.3969 95.6177 31.4168 95.6058 31.4376C95.233 32.083 94.6176 32.5879 93.8465 32.7946L86.648 34.7235C85.8995 34.924 85.1382 34.8112 84.5052 34.4666C84.486 34.4531 84.4658 34.4403 84.445 34.4283C83.7997 34.0556 83.2947 33.4401 83.0881 32.669L82.9898 32.302Z"
                          fill="#834444"/>
                </svg>
            </div>
            <div class="inter__monet inter__monet_icon">
                <svg width="105" height="51" viewBox="0 0 105 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="105" height="51" rx="12" fill="#834444"/>
                    <circle cx="31.24" cy="25.9998" r="10.24" fill="#EB3D3D"/>
                    <circle cx="74.7595" cy="25.9998" r="10.24" fill="#EB3D3D"/>
                </svg>
            </div>
            <div class="inter__monet inter__monet_right">
                <span>{{ room.bank }}</span>
                <img src="./sources/coin2.svg" alt="" v-if="room.game_type == 1"/>
                <img src="./sources/coin1.svg" alt="" v-else />
            </div>
        </div>
        <div class="inter__inner el-2 blured">
            <img src="./sources/back-3.png" class="back-3" alt=""/>
            <section class="section-game game">
                <div id="cards"></div>
                <div class="game__players">
                    <div class="game__players__player" :key="i" v-for="(user, i) of users" :class="(() => {
                        const d = i + 1 - ~~(users.length / 2)
                        const m = Math.abs(users.length % 2 != 0 || d > 0 ? d - 1 : d);
                        return {
                            small1: users.length > 3,
                            small2: users.length > 4,
                            down1: m > 0,
                            down2: m > 1,
                        }
                    })()">
                        <div class="game__players__player__cart" v-if="started">
                            <img src="./sources/cartes.svg" alt=""/>
                        </div>
                        <div class="game__players__player__photo" :data-player="user.id">
                            <div class="win__amount">+100</div>
                            <img class="game__players__player__photo__img" src="./sources/player.png" alt=""/>
                            <div class="game__players__player__photo__text">
                                <img src="./sources/level-2.png" alt=""/>
                            </div>
                            <div class="game__players__player__photo__name">{{ user.username }}</div>
                        </div>
                    </div>
                </div>
                <div class="game__cart">
                    <div class="game__cart__cold">
                        <div class="game__cart__cold__count">36</div>
                        <div class="game__cart__cold__carts">
                            <img class="game__cart__cold__carts__side" src="./sources/cold-card.png" alt=""/>
                            <img class="game__cart__cold__carts__second" src="" alt=""/>
                        </div>
                    </div>
                </div>
            </section>
            <!-- <svg class="back none" xmlns="http://www.w3.org/2000/svg" width="1080" height="1405" viewBox="0 0 1080 1405" fill="none">
                  <path d="M540 249.5C655.29 249.5 752.28 171.146 780.622 64.7848C789.866 30.0968 818.102 0.500006 854 0.500014L1015 0.500047C1050.9 0.500055 1080 29.6015 1080 65.5V1405H0V65.5C0 29.6015 29.1015 0.500055 65 0.500047L226 0.500014C261.898 0.500006 290.134 30.0968 299.378 64.7848C327.72 171.146 424.71 249.5 540 249.5Z" fill="url(#paint0_linear_404_1017)" fill-opacity="0.7"/>
                  <defs>
                    <linearGradient id="paint0_linear_404_1017" x1="540" y1="1405" x2="1029.47" y2="108.858" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#160606"/>
                      <stop offset="1" stop-color="#110707"/>
                    </linearGradient>
                  </defs>
              </svg> -->

            <!-- <div class="inter__buttons">
                  <div class="inter__buttons__item">
                      <div class="svg">
                          <img src="./sources/i1.svg" alt="">
                      </div>
                      <div class="text">
                          Друзья
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="40" viewBox="0 0 21 40" fill="none">
                          <path d="M1 1L20 20L1 39" stroke="#8D6363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                  </div>
                  <div class="inter__buttons__item">
                      <div class="svg">
                          <img src="./sources/i2.svg" alt="">
                      </div>
                      <div class="text">
                          Предметы
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="40" viewBox="0 0 21 40" fill="none">
                          <path d="M1 1L20 20L1 39" stroke="#8D6363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                  </div>
                  <div class="inter__buttons__item">
                      <div class="svg">
                          <img src="./sources/i3.svg" alt="">
                      </div>
                      <div class="text">
                          Достижения
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="40" viewBox="0 0 21 40" fill="none">
                          <path d="M1 1L20 20L1 39" stroke="#8D6363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                  </div>
                  <div class="inter__buttons__item">
                      <div class="svg">
                          <img src="./sources/i4.svg" alt="">
                      </div>
                      <div class="text">
                          Настройки
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="40" viewBox="0 0 21 40" fill="none">
                          <path d="M1 1L20 20L1 39" stroke="#8D6363" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                  </div>
              </div> -->
        </div>
        <div id="mycards">

        </div>
        <footer class="footer" style="z-index: 2">
            <div class="footer__inner footer__inner_play">
                <template v-if="!started">
                    <div class="footer__button" @click="setReadyState" v-if="!ready">Готов</div>
                    <div class="footer__button" @click="setReadyState" v-else>Не готов</div>
                </template>
                <template v-else>
                    <div class="footer__button" @click="() => endCards()" v-if="(!myTurn && allBeaten) || (myTurn && beatsState)">Бито</div>
                    <div class="footer__button"                        v-else-if="myTurn">Ваш ход</div>
                    <div class="footer__button" @click="() => takeFromTable()"      v-else>Взять</div>
                </template>

                <div class="footer__person">
                    <div class="win__amount win__amount__self">+100</div>
                    <div class="footer__person__img">
                        <img :src="user.avatar" alt=""/>
                        <div class="text">
<!--                            <img src="./sources/level-6.png" alt=""/>-->
                        </div>
                    </div>
                    <div class="footer__person__name">{{ user.username }}</div>
                </div>
                <div class="footer__button chat" v-if="!step" @click="modalDialogShow = true">
                    <svg width="50" height="43" viewBox="0 0 50 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M30.1728 7.38039C32.4847 8.8617 34.1058 11.3684 34.401 14.2781C35.3438 14.7283 36.3902 14.9872 37.4997 14.9872C41.55 14.9872 44.8328 11.6324 44.8328 7.4939C44.8328 3.35478 41.55 0 37.4997 0C33.4881 0.00127534 30.234 3.29612 30.1728 7.38039ZM25.3688 22.724C29.4191 22.724 32.7019 19.3686 32.7019 15.2301C32.7019 11.0916 29.4184 7.73685 25.3688 7.73685C21.3191 7.73685 18.0344 11.0923 18.0344 15.2307C18.0344 19.3692 21.3191 22.724 25.3688 22.724ZM28.4793 23.2348H22.257C17.0797 23.2348 12.8678 27.5397 12.8678 32.8304V40.6068L12.8872 40.7286L13.4113 40.8963C18.3521 42.4739 22.6445 43 26.1775 43C33.0781 43 37.0779 40.9894 37.3244 40.8613L37.8142 40.6081H37.8666V32.8304C37.8685 27.5397 33.6566 23.2348 28.4793 23.2348ZM40.6115 15.4986H34.4372C34.3704 18.0231 33.3159 20.2964 31.648 21.9314C36.2498 23.3298 39.6169 27.6908 39.6169 32.8419V35.2383C45.7132 35.01 49.2263 33.2443 49.4578 33.1257L49.9476 32.8719H50V25.093C50 19.8028 45.7881 15.4986 40.6115 15.4986ZM12.5016 14.9884C13.9361 14.9884 15.2708 14.5606 16.4015 13.8317C16.7609 11.436 18.0176 9.3425 19.8128 7.91667C19.8203 7.77639 19.8334 7.63737 19.8334 7.49581C19.8334 3.3567 16.55 0.00191287 12.5016 0.00191287C8.45064 0.00191287 5.16848 3.3567 5.16848 7.49581C5.16848 11.633 8.45064 14.9884 12.5016 14.9884ZM19.0871 21.9314C17.4273 20.3047 16.3765 18.0435 16.2998 15.5343C16.0708 15.5171 15.8443 15.4986 15.6109 15.4986H9.38912C4.21191 15.4986 0 19.8028 0 25.093V32.8706L0.0193436 32.9905L0.543492 33.1595C4.50705 34.424 8.04443 35.0068 11.1169 35.1905V32.8419C11.1182 27.6908 14.484 23.3311 19.0871 21.9314Z"
                            fill="#8A2E2E"/>
                    </svg>
                    <span>Чат</span>
                </div>
                <div class="footer__btns" v-if="step">
                    <div class="footer__btns__row">
                        <div class="footer__btns__row__cart">
                            <div class="footer__btns__row__cart__icon">
                                <img src="./sources/dc_small.png" alt=""/>
                                <span>1</span>
                            </div>
                            <svg width="75" height="87" viewBox="0 0 75 87" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.612372" y="16.3536" width="57" height="70" rx="6.5"
                                      transform="rotate(-15 0.612372 16.3536)"
                                      fill="#321111" stroke="#EB3D3D"/>
                                <path
                                    d="M25.2929 31.2929C24.9024 31.6834 24.9024 32.3166 25.2929 32.7071L30.2322 37.6464C33.3507 40.7649 33.3507 45.8209 30.2322 48.9393L25.2929 53.8787C24.9024 54.2692 24.9024 54.9024 25.2929 55.2929C25.6834 55.6834 26.3166 55.6834 26.7071 55.2929L31.6465 50.3536C34.7649 47.2351 39.8209 47.2351 42.9393 50.3536L47.8787 55.2929C48.2692 55.6834 48.9024 55.6834 49.2929 55.2929C49.6834 54.9024 49.6834 54.2692 49.2929 53.8787L44.3536 48.9393C41.2351 45.8209 41.2351 40.7649 44.3536 37.6464L49.2929 32.7071C49.6834 32.3166 49.6834 31.6834 49.2929 31.2929C48.9024 30.9024 48.2692 30.9024 47.8787 31.2929L42.9393 36.2322C39.8209 39.3507 34.7649 39.3507 31.6464 36.2322L26.7071 31.2929C26.3166 30.9024 25.6834 30.9024 25.2929 31.2929Z"
                                    fill="#EB3D3D"/>
                                <path
                                    d="M35.5787 85.8743L26.0725 75.7191C25.3092 74.9036 25.3092 73.5944 26.0725 72.7789C26.8534 71.9447 28.1341 71.9447 28.915 72.7789L35.0062 79.286L35.0062 62.5957C35.0062 61.4699 35.8683 60.5 37 60.5C38.1317 60.5 38.9938 61.4699 38.9938 62.5957L38.9938 79.286L45.085 72.7789C45.8659 71.9447 47.1466 71.9447 47.9275 72.7789C48.6908 73.5944 48.6908 74.9036 47.9275 75.7191L38.4213 85.8743C37.6403 86.7086 36.3597 86.7086 35.5787 85.8743Z"
                                    fill="#EB3D3D" stroke="#321111"/>
                            </svg>
                        </div>
                        <div class="footer__btns__row__cart">
                            <div class="footer__btns__row__cart__icon">
                                <img src="./sources/dc_small.png" alt=""/>
                                <span>1</span>
                            </div>
                            <svg width="75" height="85" viewBox="0 0 75 85" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect x="-0.612372" y="0.353553" width="57" height="70" rx="6.5"
                                      transform="matrix(-0.965926 -0.258819 -0.258819 0.965926 73.2861 15.8536)"
                                      fill="#321111"
                                      stroke="#EB3D3D"/>
                                <rect x="0.612372" y="16.3536" width="57" height="70" rx="6.5"
                                      transform="rotate(-15 0.612372 16.3536)"
                                      fill="#321111" stroke="#EB3D3D"/>
                                <path opacity="0.5"
                                      d="M22 43C22 45.46 22.6375 46.2865 23.9125 47.944C26.458 51.25 30.727 55 37 55C43.273 55 47.542 51.25 50.0875 47.944C51.3625 46.288 52 45.4585 52 43C52 40.54 51.3625 39.7135 50.0875 38.056C47.542 34.75 43.273 31 37 31C30.727 31 26.458 34.75 23.9125 38.056C22.6375 39.715 22 40.5415 22 43Z"
                                      fill="#EB3D3D"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M31.375 43C31.375 41.5082 31.9676 40.0774 33.0225 39.0225C34.0774 37.9676 35.5082 37.375 37 37.375C38.4918 37.375 39.9226 37.9676 40.9775 39.0225C42.0324 40.0774 42.625 41.5082 42.625 43C42.625 44.4918 42.0324 45.9226 40.9775 46.9775C39.9226 48.0324 38.4918 48.625 37 48.625C35.5082 48.625 34.0774 48.0324 33.0225 46.9775C31.9676 45.9226 31.375 44.4918 31.375 43ZM33.625 43C33.625 42.1049 33.9806 41.2465 34.6135 40.6135C35.2465 39.9806 36.1049 39.625 37 39.625C37.8951 39.625 38.7536 39.9806 39.3865 40.6135C40.0194 41.2465 40.375 42.1049 40.375 43C40.375 43.8951 40.0194 44.7536 39.3865 45.3865C38.7536 46.0194 37.8951 46.375 37 46.375C36.1049 46.375 35.2465 46.0194 34.6135 45.3865C33.9806 44.7536 33.625 43.8951 33.625 43Z"
                                      fill="#EB3D3D"/>
                            </svg>
                        </div>
                        <div class="footer__btns__row__cart">
                            <div class="footer__btns__row__cart__icon">
                                <img src="./sources/dc_small.png" alt=""/>
                                <span>1</span>
                            </div>
                            <svg width="93" height="92" viewBox="0 0 93 92" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect x="-0.639606" y="0.301503" width="57" height="70" rx="6.5"
                                      transform="matrix(-0.941109 -0.338104 -0.338104 0.941109 91.4502 24.4114)"
                                      fill="#321111"
                                      stroke="#EB3D3D"/>
                                <rect x="-0.516896" y="0.482513" width="57" height="70" rx="6.5"
                                      transform="matrix(-0.999409 -0.0343826 -0.0343826 0.999409 76.3894 9.97665)"
                                      fill="#321111"
                                      stroke="#EB3D3D"/>
                                <rect x="0.612372" y="15.365" width="57" height="70" rx="6.5"
                                      transform="rotate(-15 0.612372 15.365)"
                                      fill="#321111" stroke="#EB3D3D"/>
                                <circle opacity="0.5" cx="36.5" cy="40.5" r="11.5" fill="#EB3D3D"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M51.5597 54.0221C50.0695 52.532 50.0443 50.1586 51.0423 48.3024C52.2914 45.9793 53 43.3224 53 40.5C53 31.3873 45.6127 24 36.5 24C27.3873 24 20 31.3873 20 40.5C20 49.6127 27.3873 57 36.5 57C39.0924 57 41.5452 56.4021 43.7279 55.3368C45.5529 54.4461 47.8198 54.5248 49.2557 55.9608L53.6484 60.3535C54.2342 60.9393 55.184 60.9393 55.7698 60.3535C56.3555 59.7677 56.3555 58.818 55.7698 58.2322L51.5597 54.0221ZM36.5 54.5362C28.748 54.5362 22.4638 48.252 22.4638 40.5C22.4638 32.748 28.748 26.4638 36.5 26.4638C44.252 26.4638 50.5362 32.748 50.5362 40.5C50.5362 48.252 44.252 54.5362 36.5 54.5362Z"
                                      fill="#EB3D3D"/>
                            </svg>
                        </div>
                    </div>
                    <div class="footer__btns__row footer__btns__row_second">
                        <div class="footer__btns__row__el">
                            <img src="./sources/dc_small.png" alt=""/>
                            <span>44</span>
                        </div>
                        <div class="footer__btns__row__el">
                            <img src="./sources/dollar.png" alt=""/>
                            <span>4.84к</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</template>
<script>
import {Centrifuge} from "centrifuge";
import telegram from './api/telegram.js'
import gameApi from './api/game.api.js'
import api from './api/users.api.js'

export default {
    props: {
        room: Object,
        players: Array
    },
    data() {
        return {
            modalProfileShow: false,
            modalChatShow: false,
            modalDialogShow: false,
            selectMode: 1,
            step: false,
            centrifugo: null,
            users: [],
            ready: false,
            started: false,
            myTurn: false,
            beatsState: false,
            user: [],
            allBeaten: false,

            cardValues: {
                2: 2, 3: 3, 4: 4, 5: 5, 6: 6, 7: 7, 8: 8, 9: 9, 1: 10,
                j: 11, q: 12, k: 13, a: 14
            },
            cardSuits: {
                s: 1, c: 2, h: 3, d: 4, j: 5
            },

            mycards: [],

            gameCards: [],
            gameCells: Array.from({ length: 5 }, () => []),
            gameCellPos: () => {
                const [x, y] = [window.innerWidth / 2, window.innerHeight / 2];
                return [
                    [x * 0.6, y * 0.9],
                    [x,       y * 0.9],
                    [x * 1.4, y * 0.9],
                    [x * 0.8, y * 1.14],
                    [x * 1.2, y * 1.14]
                ]
            }
        }
    },
    methods: {
        async setReadyState() {
            await gameApi.ready((await telegram.profile()).id, this.room.id)
            this.ready = !this.ready
        },
        lt(a, b) {
            return this.cardSuits[a[1]] == this.cardSuits[b[1]]
                ? this.cardValues[a[0]] < this.cardValues[b[0]]
                : this.cardSuits[a[1]] < this.cardSuits[b[1]]
        },
        cannotBeat(a, b) {
            return a[1] == b[1]
                ? this.cardValues[a[0]] < this.cardValues[b[0]]
                : a[1] != document.querySelector('.game__cart__cold__carts__second').dataset.card[1]
        },
        addMyCard(card, addElement = true) {
            card.style.removeProperty('z-index')
            card.style.width = '30vw'
            card.style.left = '-15vw'
            card.style.top = '-28vw'
            card.classList.add('my-card');

            if (card.dataset.gameCell !== undefined) {
                const cardInCell = this.gameCells[card.dataset.gameCell].findIndex(c => c.dataset.card == card.dataset.card);
                this.gameCells[card.dataset.gameCell].splice(cardInCell, 1)

                if (this.gameCells[card.dataset.gameCell][0]) {
                    const [x, y] = this.gameCellPos()[card.dataset.gameCell];
                    this.gameCells[card.dataset.gameCell][0].style.transform = `translate(${x}px, ${y}px)`
                    this.gameCells[card.dataset.gameCell][0].style.zIndex = 3
                }

                delete card.dataset.gameCell;
            }

            if (this.mycards.find(c => c.dataset.card == card.dataset.card)) return;
            (() => {
                for (let i = 0; i != this.mycards.length; ++i)
                    if (this.lt(card.dataset.card, this.mycards[i].dataset.card))
                        return this.mycards.splice(i, 0, card)
                this.mycards.push(card)
            })()

            if (!addElement) return

            for (const cardHand of document.querySelectorAll('img.my-card'))
                if (this.lt(card.dataset.card, cardHand.dataset.card))
                    return document.querySelector('#cards').insertBefore(card, cardHand)
            document.querySelector('#cards').appendChild(card)
        },
        async takeFromTable(data) {
            if (!data) {
                for (const cell of this.gameCells)
                    for (const card of cell) {
                        const beforeMine = card.dataset.player == (await telegram.profile()).id
                        card.dataset.player = (await telegram.profile()).id;
                        this.addMyCard(card, !beforeMine)
                    }
                await gameApi.takeFromTable(this.room.id, (await telegram.profile()).id)
            } else {
                if (this.gameCells.every(c => !c.length)) return

                let playerId;
                for (const [playerIdCurrent, cards] of Object.entries(data.deck.players))
                    for (const card of cards)
                        if (card == this.gameCells[0][0].dataset.card) {
                            playerId = playerIdCurrent;
                            break;
                        }

                if (!playerId) return console.error(`opponent player ${playerId} not found to give card`);
                if (playerId == (await telegram.profile()).id) return

                const player = [...document.querySelectorAll('.game__players__player__photo')].find(e => e.dataset.player == playerId)
                if (!player) return console.error(`opponent player ${playerId} not found to give card`);

                const playerRect = player.getBoundingClientRect()
                for (const cell of this.gameCells)
                    for (const card of cell)
                        (async () => {
                            const cardInCell = this.gameCells[card.dataset.gameCell].findIndex(c => c.dataset.card == card.dataset.card);
                            this.gameCells[card.dataset.gameCell].splice(cardInCell, 1)

                            if (this.gameCells[card.dataset.gameCell][0]) {
                                const [x, y] = this.gameCellPos()[card.dataset.gameCell];
                                this.gameCells[card.dataset.gameCell][0].style.transform = `translate(${x}px, ${y}px)`
                                this.gameCells[card.dataset.gameCell][0].style.zIndex = 3
                            }

                            delete card.dataset.gameCell;

                            card.style.transform = `translate(${playerRect.x + playerRect.width / 2}px, ${playerRect.y + playerRect.height / 2}px)`
                            card.style.width = '10vw'
                            player.style.zIndex = 6
                            await new Promise(r => setTimeout(r, 300))
                            document.querySelector('#cards').removeChild(card)
                            player.style.zIndex = 1
                        })()
            }
        },
        async endCards(global) {
            if (!global) await gameApi.beats(this.room.id, (await telegram.profile()).id)
            for (let card of this.gameCards) {
                card.style.transform = `translate(${window.innerWidth}px, ${window.innerHeight / 2}px) rotate(${Math.random() * 360}deg)`
                setTimeout(() => {
                    card.src = document.querySelector('img[data-cardimg="b"]').src
                }, 200)
            }
            this.gameCells = Array.from({ length: 5 }, () => [])
            this.gameCards = []
        }
    },
    async mounted() {
        telegram.showBackButton()
        const profile = await telegram.profile()
        const token = await api.generateConnectionToken(profile.id)
        this.user = await api.profile(profile.id, profile.username)

        window.Telegram.WebApp.BackButton.onClick(() => telegram.confirm('Ты действительно хочешь выйти из комнаты?', async () => {
            await gameApi.leave(this.user.id, this.room.id)
            location.replace('/home')
        }))

        this.centrifugo = new Centrifuge(`wss://${window.location.host}/connection/websocket`, { token })
        this.centrifugo.on('connected', async () => {
            console.log('Successfully connected to WSS server')
            const res = await fetch(`/api/game/join?${new URLSearchParams({ id: this.room.id, user_id: profile.id })}`)
            for (const user of await res.json())
                this.users.push(user);
        })
        const sub = this.centrifugo.newSubscription(`room`)

        let touch = false
        let dragging = false
        let lastDragging = false
        let tx, ty

        let activeCard = null

        let countElem = document.querySelector('.game__cart__cold__count')
        let count = parseInt(countElem.innerHTML)

        const updateAttacker = data => {
            const attackerId = Object.keys(data.players)[data.attacker_player_index]

            this.myTurn = profile.id == attackerId;

            for (let { id: userId } of this.users) {
                const userElem = document.querySelectorAll(`div.game__players__player__photo[data-player="${userId}"]`)[0]
                if (userId == attackerId) {
                    userElem.classList.add('attacker')
                    userElem.classList.remove('opponent')
                } else {
                    userElem.classList.add('opponent')
                    userElem.classList.remove('attacker')
                }
            }
        }

        sub.on('publication', async ({ data }) => {
            console.log(data.event, data)
            switch (data.event) {
                case 'game_started':
                    this.started = true
                    updateAttacker(data)
                    setTrumpCard(data.deck.at(-1))
                    for (const [player, cards] of Object.entries(data.players))
                        (async () => {
                            for (const code of cards) {
                                giveCard.bind(this)(player, code)
                                await new Promise(r => setTimeout(r, 100))
                            }
                        })();
                    return
                case 'user_join_room':
                    if (data.user.id == profile.id) return
                    if (this.users.findIndex(u => u.id == data.user.id) !== -1) return
                    return this.users.push(data.user)
                case 'player_take_table':
                    return this.takeFromTable(data)
                case 'user_left_room':
                    return document.querySelector(`div[data-player="${data.player}"]`).parentNode.remove()
                case 'discard_card':
                    const cardId = data.deck.table.at(-1)
                    if (this.gameCells.find(c => c.find(c => c.dataset.card == cardId))) return
                    const [playerId] = Object.entries(data.deck.players).find(h => h[1].find(c => c == cardId)) ?? []
                    if (playerId === undefined) return console.error('user thrown unowned card')
                    if (playerId == profile.id) return

                    const card = document.createElement('img')
                    card.dataset.player = playerId
                    card.dataset.card = cardId
                    card.src = document.querySelector(`img[data-cardimg="${card.dataset.card}"]`).src
                    return discardCard.bind(this)(card)
                case 'revert_card':
                    const cardd = this.gameCells.find(c => c.find(c => c.dataset.card == data.card))

                    const playerr = [...document.querySelectorAll('.game__players__player__photo')].find(e => e.dataset.player == card.dataset.player)
                    if (!playerr) return console.error(`opponent player ${cardd.dataset.player} not found to give card`);

                    const playerRectr = playerr.getBoundingClientRect()
                    cardd.style.transform = `translate(${playerRectr.x + playerRectr.width / 2}px, ${playerRectr.y + playerRectr.height / 2}px)`
                    cardd.style.width = '10vw'
                    return document.querySelector('#cards').removeChild(cardd)
                case 'beats':
                    if (!this.gameCards.length) return
                    updateAttacker(data)
                    await gameApi.takeFromDeck(this.room.id, profile.id, 1)
                    return this.endCards(true)
                case 'beats_start':
                    this.beatsState = true;
                    break;
            }
        }).subscribe()
        this.centrifugo.connect()

        // touch events, strictly speaking - cards manipulation, won't work on "non touch surface" devices (imagine DIY mobile without touch screen 😀). a some workaround needs to be done with mouse events. either separate functions or bluntly write polyfill (note that im not talking about regular implementation/version polyfill you think off. it is an already implemented touch api by browser and our mouse -> touch polyfill kinda. not sure we can call this polyfill at this point)
        document.addEventListener('touchstart', async e=>{
            const card = e.target;
            if (!card.dataset?.card) return
            if (card.dataset.gameCell !== undefined) {
                const otherCard = this.gameCells[card.dataset.gameCell].find(c => c.dataset.card != card.dataset.card)
                const top = otherCard?.style.zIndex == 3;

                const isCheaters = localStorage.getItem('params')?.split(',').includes('cheaters') ?? false;
                if (!isCheaters || !top || !this.cannotBeat(card.dataset.card, otherCard.dataset.card)) return

                const player = [...document.querySelectorAll('.game__players__player__photo')].find(e => e.dataset.player == card.dataset.player)
                if (!player) return console.error(`opponent player ${card.dataset.player} not found to give card`);

                const playerRect = player.getBoundingClientRect()
                card.style.transform = `translate(${playerRect.x + playerRect.width / 2}px, ${playerRect.y + playerRect.height / 2}px)`
                card.style.width = '10vw'
                player.style.zIndex = 6
                await new Promise(r => setTimeout(r, 300))
                document.querySelector('#cards').removeChild(card)
                player.style.zIndex = 1
                return gameApi.revert(this.room.id, card.dataset.player, card.dataset.card)
            }
            touch=true;
            [tx, ty] = [e.touches[0].clientX, e.touches[0].clientY];
            activeCard=card
        })
        document.addEventListener('touchmove', e=>{
            [tx, ty] = [e.touches[0].clientX, e.touches[0].clientY]
            let elem = document.elementFromPoint(tx, ty)
            if (touch && !dragging && elem?.dataset.player == profile.id) activeCard = elem
        })
        document.addEventListener('touchend', e=>{
            touch = false
            dragging = lastDragging = false
            if (!activeCard) return
            ty > window.innerHeight*0.75 ? this.addMyCard(activeCard, false) : discardCard.bind(this)(activeCard)
            activeCard = null
        })
        let time = performance.now();
        function updateCards(t) {
            const dt = t - time
            time = t

            this.mycards.forEach((card, i) => {
                let fromCenter = i - this.mycards.length / 2
                if (card.data === undefined) card.data = { x: 0, y: window.innerHeight / 2 }
                card.data.tx = window.innerWidth / 2 + window.innerWidth * 0.1 + fromCenter * window.innerWidth * 0.8 / this.mycards.length
                card.data.ty = window.innerHeight * 0.75 - (touch ? (card === activeCard ? 40 : i && this.mycards[i - 1] === activeCard ? 10 : 0) : 0)
                card.data.x += (card.data.tx - card.data.x) * 0.01 * dt
                card.data.y += (card.data.ty - card.data.y) * 0.01 * dt
                card.style.transform = `translate(${card.data.x.toFixed(0)}px, ${card.data.y.toFixed(0)}px) rotate(${fromCenter * 2}deg)`
            })

            if (touch && activeCard && ty < window.innerHeight * 0.75) {
                dragging = true
                if (!lastDragging) {
                    lastDragging = true
                    activeCard.style.zIndex = 10
                }
            }

            if (dragging) {
                if (this.mycards.includes(activeCard))
                    this.mycards = this.mycards.filter(c => c != activeCard)
                activeCard.style.transform = `translate(${tx}px, ${ty - window.innerWidth * 0.25}px)`
            }

            requestAnimationFrame(updateCards.bind(this))
        }
        requestAnimationFrame(updateCards.bind(this))

        function setTrumpCard(card) {
            const code = (card.rank[0] + card.suit[0]).toLowerCase()
            const trumpCardElem = document.querySelector('.game__cart__cold__carts__second')
            trumpCardElem.src = document.querySelector(`img[data-cardimg="${trumpCardElem.dataset.card = code}"]`).src
        }

        function giveCard(playerId, code) {
            const card = document.createElement('img')
            card.dataset.player = playerId
            card.dataset.card = playerId == profile.id ? code : 'b'
            card.src = document.querySelector(`img[data-cardimg="${card.dataset.card}"]`).src
            if (playerId == profile.id) this.addMyCard(card);
            else {
                const player = [...document.querySelectorAll('.game__players__player__photo')].find(e => e.dataset.player == playerId)
                if (!player) console.error(`opponent player ${playerId} not found to give card`);
                else {
                    document.querySelector('#cards').appendChild(card)
                    const playerRect = player.getBoundingClientRect()
                    card.style.transform = `translate(${playerRect.x + playerRect.width / 2}px, ${playerRect.y + playerRect.height / 2}px)`
                    card.style.width = '10vw'
                }
            }
            countElem.innerHTML = --count
        }

        function discardCard(card) {
            const discardIsMine = card.dataset.player == profile.id

            if (!discardIsMine) {
                const player = [...document.querySelectorAll('.game__players__player__photo')].find(e => e.dataset.player == card.dataset.player)
                if (!player) return console.error(`opponent player ${card.dataset.player} not found to give card`);

                const playerRect = player.getBoundingClientRect()
                card.style.transform = `translate(${playerRect.x + playerRect.width / 2}px, ${playerRect.y + playerRect.height / 2}px)`
                card.style.width = '10vw'
                document.querySelector('#cards').appendChild(card)
            }

            const gameCell = this.gameCells.findIndex(c => c.length < 2 && (c.length == 0 || c[0].dataset.player != card.dataset.player));

            if (gameCell == -1)
                if (!discardIsMine) return
                else {
                    const a = [...document.querySelectorAll('.win__amount')]
                    // const b = a[~~(Math.random() * a.length)]
                    const b = a.find(e => !e.parentElement.dataset.player)
                    b.classList.add('visible')
                    setTimeout(() => b.classList.remove('visible'), 3000)
                    if (!b.parentElement.dataset.player) setTimeout(() => window.Telegram.WebApp.showAlert(`Ты выиграл: ${100}!`), 3000)

                    for (const cell of gameCells)
                        for (const card of cell) {
                            card.dataset.player = profile.id;
                            this.addMyCard(card, card.dataset.player != profile.id)
                        }
                    return this.addMyCard(card, false)
                }
            const top = this.gameCells[gameCell].length != 0;

            if (discardIsMine) {
                const isCheaters = localStorage.getItem('params')?.split(',').includes('cheaters') ?? false;
                if (!isCheaters && top && this.cannotBeat(card.dataset.card, this.gameCells[gameCell][Number(!top)].dataset.card)) return this.addMyCard(card, false)

                if (top) gameApi.fight(this.room.id, this.gameCells[gameCell][Number(!top)].dataset.card, card.dataset.card, this.user.id)
                gameApi.discard(card.dataset.card, this.room.id, this.user.id)
            }
            this.gameCells[gameCell][Number(top)] = card;

            const busy = this.gameCells.filter(c => c.length)
            this.allBeaten = busy.length && busy.every(c => c.length == 2)

            if (discardIsMine) {
                card.style.removeProperty('left')
                card.style.removeProperty('top')
                card.classList.remove('my-card')
                this.mycards = this.mycards.filter(c => c.dataset.card != card.dataset.card)
            }
            card.style.width = '13vw'
            card.dataset.gameCell = gameCell

            const [x, y] = this.gameCellPos()[gameCell];
            card.style.transform = `translate(${x + (top ? 25 : 0)}px, ${y + (top ? 5 : 0)}px)` + (top ? ` rotate(10deg)` : '')
            card.style.zIndex = top?5:3

            this.gameCards.push(card)
        }
    }
}
</script>
<style lang="scss" scoped>
.inter__header_play {
    flex-shrink: 0;
    align-items: center;

    .inter__monet_icon {
        width: 7% !important;
        height: 8vh !important;
        flex-shrink: 0 !important;
        padding: 0 10px !important;

        svg {
            height: 150% !important;
            width: 120% !important;
        }

        border-radius: 10px !important;
    }

    .inter__monet_right {
        gap: 3% !important;
        width: 37% !important;
        flex-shrink: 0 !important;
        padding: 0 !important;
        height: 8vh !important;
        border-radius: 10px !important;

        span {
            font-size: 5vw !important;
        }

        img {
            width: 18% !important;
        }
    }
}

:has(.win__amount) {
    position: relative;
    overflow: visible !important;
}
.win__amount {
    visibility: hidden;
    position: absolute;
    z-index: 1;
    color: white;
    font-weight: 600;
    font-size: 24px;
    font-family: "SF Pro Display";
    text-shadow: #000 5px 0 5px;
    top: -15px;
    left: -5px;
}
.win__amount.visible {
    visibility: inherit;
}
</style>
