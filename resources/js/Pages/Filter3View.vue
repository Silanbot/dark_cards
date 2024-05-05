<script setup></script>

<template>
    <section class="inter section section-inter">
        <div class="inter__header">
            <div class="inter__monet">
                <img src="./sources/coin1.svg" alt=""/>
                <span>44 719</span>
            </div>
            <div class="inter__monet">
                <span>153 028</span>
                <img src="./sources/coin2.svg" alt=""/>
            </div>
        </div>
        <div class="inter__inner el-2" style="margin-top: 0">
            <section class="section-vert vert section">
                <!-- <div class="test" style="">
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>
                  <div>12332131</div>

                </div> -->
                <div class="vert__inner">
                    <div class="vert__title">Диапазон ставки</div>
                    <div class="vert__block">
                        <div class="vert__scrollblock">
                            <div class="vert__scroll">
                                <span func="plus" fz="10">100</span>
                                <span func="plus" fz="12">1к</span>
                                <span func="plus" fz="14">10к</span>
                                <span func="plus" fz="16">100к</span>
                                <span func="minus" fz="18">1м</span>
                                <span func="minus" fz="16">10м</span>
                                <span func="minus" fz="14">100м</span>
                                <span func="plus" fz="10">100</span>
                                <span func="plus" fz="12">1к</span>
                                <span func="plus" fz="14">10к</span>
                                <span func="plus" fz="16">100к</span>
                                <span func="minus" fz="18">1м</span>
                                <span func="minus" fz="16">10м</span>
                                <span func="minus" fz="14">100м</span>
                                <span func="plus" fz="10">100</span>
                                <span func="plus" fz="12">1к</span>
                                <span func="plus" fz="14">10к</span>
                                <span func="plus" fz="16">100к</span>
                                <span func="minus" fz="18">1м</span>
                                <span func="minus" fz="16">10м</span>
                                <span func="minus" fz="14">100м</span>
                                <!-- <span func="minus" fz="10">1</span> -->
                            </div>
                            <div class="vert__scroll">
                                <span func="plus" fz="10">100</span>
                                <span func="plus" fz="12">1к</span>
                                <span func="plus" fz="14">10к</span>
                                <span func="plus" fz="16">100к</span>
                                <span func="minus" fz="18">1м</span>
                                <span func="minus" fz="16">10м</span>
                                <span func="minus" fz="14">100м</span>

                                <!-- <span func="minus" fz="10">1</span> -->
                            </div>
                        </div>
                        <div class="vert__button">Применить</div>
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
                <a href="/play/1" class="footer__play">
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
let back = window.Telegram.WebApp.BackButton
back.show()
back.onClick(() => {
    location.replace('/home')
})
export default {
    data() {
        return {
            selectMode: 1,
            dc_coins: 0,
            dollars: 0,
        }
    },
    methods() {
    },
    mounted() {
        setTimeout(() => {
            touchstart(document.querySelector('.vert__scroll:first-child'))
            touchstart(document.querySelector('.vert__scroll:last-child'))
        }, 1)
    },
    created() {
        fetch(`/api/profile?id=${telegram.initDataUnsafe.user.id}&username=${telegram.initDataUnsafe.user.username}`)
            .then(response => response.json())
            .then(data => {
                this.dc_coins = data.balance
            })
        let back = window.Telegram.WebApp.BackButton
        back.show()
        back.onClick(() => {
            location.replace('/home')
        })

    }
}
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[fz]').forEach((e) => {
        e.style.fontSize = `${parseInt(e.getAttribute('fz'))}px`
    })
})

function touchstart(element) {
    const cursor = {x: 0, y: 0}
    let drag = false

    element.addEventListener('touchstart', (event) => {
        cursor.y = event.changedTouches[0].clientY * -1
        drag = true
    })
    element.addEventListener('touchend', () => {
        staticOffsetY = 0
        drag = false
    })
    let staticOffsetY = 0
    let countOffset = 0
    let arrayOffset = [0, -20, -50, 20, 43]
    let fontPlus = [0, -2, -4, 2, 4]
    element.addEventListener('touchmove', (event) => {
        if (!drag) return
        const offsetY = cursor.y - event.changedTouches[0].clientY * -1
        cursor.y = event.changedTouches[0].clientY * -1
        const nanoOffset = offsetY / 5
        staticOffsetY += nanoOffset
        console.log(staticOffsetY)
        console.log(nanoOffset)
        if (staticOffsetY > 70000) {
            move(true, 9)
        }
            // else if (staticOffsetY > 30) {
            //   countOffset = 4;
            //   move(true, 2);
            // }
            // else if (staticOffsetY > 10) {
            //   countOffset = 3;
            //   move(true);

            // }
            // else if (staticOffsetY < -30) {
            //   countOffset = 2;
            //   move(false, 2);
        // }
        else if (staticOffsetY < -10) {
            countOffset = 1
            move(false)
        }

        element.querySelectorAll('span').forEach((span) => {
            span.style.fontSize = 'inherit'
            setTimeout(() => {
                let fontSize = parseInt(span.getAttribute('fz'))
                if (span.getAttribute('func') == 'minus') {
                    span.style.fontSize = `${parseInt(fontSize) - fontPlus[countOffset]}px`
                } else if (span.getAttribute('func') == 'plus') {
                    span.style.fontSize = `${parseInt(fontSize) + fontPlus[countOffset]}px`
                } else if (span.getAttribute('func') == 'neut') {
                    if (countOffset < 3) {
                        fontPlus * -1
                    }
                    span.style.fontSize = `${parseInt(fontSize) + fontPlus[countOffset]}px`
                }
            }, 1)
        })
        element.querySelectorAll('span').forEach((span) => {
            span.style.transform = `translateY(${arrayOffset[countOffset]}px)`
        })
        // if (offsetY/2 > 30) {
        //   staticOffsetY = 50;
        // }
        // if (offsetY/2 > 50) {
        //   staticOffsetY = 80;
        // }
    })

    let moveTimer = null

    function move(up = false, count = 1) {
        clearTimeout(moveTimer)
        moveTimer = setTimeout(() => {
            for (let i = 0; i < count; i++) {
                if (up) {
                    let lastChild = element.lastElementChild
                    element.removeChild(lastChild)
                    element.insertBefore(lastChild, element.firstElementChild)
                } else {
                    let firstChild = element.firstElementChild
                    element.removeChild(firstChild)
                    element.appendChild(firstChild)
                }
            }

            document.body.classList.add('anim-none')
            const spans = [...element.querySelectorAll('span')]

            let num = 1
            for (let span of spans) {
                span.style.transform = `translateY(0px)`
                switch (num) {
                    case 1: {
                        span.setAttribute('fz', '10')
                        span.setAttribute('func', 'plus')
                        break
                    }
                    case 2: {
                        span.setAttribute('fz', '12')
                        span.setAttribute('func', 'plus')
                        break
                    }
                    case 3: {
                        span.setAttribute('fz', '14')
                        span.setAttribute('func', 'plus')
                        break
                    }
                    case 4: {
                        span.setAttribute('fz', '16')
                        span.setAttribute('func', 'plus')
                        break
                    }
                    case 5: {
                        span.setAttribute('fz', '18')
                        span.setAttribute('func', 'neut')
                        break
                    }
                    case 6: {
                        span.setAttribute('fz', '16')
                        span.setAttribute('func', 'minus')
                        break
                    }
                    case 7: {
                        span.setAttribute('fz', '14')
                        span.setAttribute('func', 'minus')
                        break
                    }
                }
                setTimeout(() => {
                    const fz = parseInt(span.getAttribute('fz'))
                    span.style.fontSize = `${fz}px`
                })
                num++
                if (num > 7) {
                    num = 1
                }
                console.log(span.style.fontSize)
            }
            setTimeout(() => {
                document.body.classList.remove('anim-none')
            }, 1)
        }, 1)
    }
}
</script>
