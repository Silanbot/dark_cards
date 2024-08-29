class Storage {
    storage = localStorage

    constructor() {
        if (window.Telegram.WebApp.initDataUnsafe.user && import.meta.env.VITE_STORAGE === 'cloud') {
            this.storage = window.Telegram.WebApp.CloudStorage
        }
    }

    setItem(name, value) {
        this.storage.setItem(name, value)
    }

    getItem(key) {
        return this.storage.getItem(key)
    }
}

export default function useStorage() {
    return {
        storage: new Storage()
    }
}
