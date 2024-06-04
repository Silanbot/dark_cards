export default new class {
    telegram = null
    user = {}

    constructor() {
        if (import.meta.env.VITE_DEV) {
            window.Telegram.WebApp.initDataUnsafe.user = {id: 1, username: 'KaptainMidnight'}
        }

        this.telegram = window.Telegram.WebApp
        this.user = window.Telegram.WebApp.initDataUnsafe.user
    }

    notificationFeedback(style) {
        this.telegram.HapticFeedback.notificationOccurred(style)
    }

    switchSelectFeedback() {
        this.telegram.HapticFeedback.selectionChanged()
    }

    impactFeedback(style) {
        this.telegram.HapticFeedback.impactOccurred(style)
    }

    profile() {
        return this.user
    }

    hideBackButton() {
        this.telegram.BackButton.hide()
    }

    showBackButton() {
        this.telegram.BackButton.show()
    }

    addOnClickHandlerForBackButton(redirectTo) {
        this.telegram.BackButton.onClick(() => location.replace(redirectTo))
    }

    alert(message, withHaptic, hapticStyle = 'error') {
        this.telegram.showAlert(message)
        if (withHaptic) {
            this.notificationFeedback(hapticStyle)
        }
    }
}
