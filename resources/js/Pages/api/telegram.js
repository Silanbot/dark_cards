export default new class {
	telegram = null;
	user = {};

	constructor() {
		console.log('import.meta.env.VITE_DEV', import.meta.env.VITE_DEV);
		if (import.meta.env.VITE_DEV && !window.Telegram.WebApp.initDataUnsafe.user) {
			window.Telegram.WebApp.initDataUnsafe.user = new Promise(async r =>
				r(
					(await navigator.storage.estimate()).quota < window?.performance?.memory?.jsHeapSizeLimit ??
						1073741824 * 2
						? { id: 5444161847, username: 'Sequencer' }
						: { id: 478515218, username: 'KaptainMidnight' }
				)
			);
		} else window.Telegram.WebApp.initDataUnsafe.user = Promise.resolve(window.Telegram.WebApp.initDataUnsafe.user);

		this.telegram = window.Telegram.WebApp;
		this.user = window.Telegram.WebApp.initDataUnsafe.user;
		(async () => {
			console.log('tg.user', await window.Telegram.WebApp.initDataUnsafe.user);
		})();
	}

	notificationFeedback(style) {
		this.telegram.HapticFeedback.notificationOccurred(style);
	}

	switchSelectFeedback() {
		this.telegram.HapticFeedback.selectionChanged();
	}

	impactFeedback(style) {
		this.telegram.HapticFeedback.impactOccurred(style);
	}

	profile() {
		return this.user;
	}

	hideBackButton() {
		this.telegram.BackButton.hide();
	}

	showBackButton() {
		this.telegram.BackButton.show();
	}

	addOnClickHandlerForBackButton(redirectTo) {
		this.telegram.BackButton.onClick(() => location.replace(redirectTo));
	}

	alert(message, withHaptic, hapticStyle = 'error') {
		this.telegram.showAlert(message);
		if (withHaptic) {
			this.notificationFeedback(hapticStyle);
		}
	}

    confirm(message, callback) {
        this.telegram.showConfirm(message, callback)
    }

    disableVerticalSwipes() {
        window.Telegram.WebApp.disableVerticalSwipes()
    }
}
