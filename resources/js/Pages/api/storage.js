class CloudStorage {
    storage = localStorage

    setItem(name, value) {
        this.storage.setItem(name, value)
    }

    getItem(key) {
        // if (this.storage === window.Telegram.WebApp.CloudStorage) {
        //     return this.storage.getItem(key, (err, value) => {
        //         if (err) {
        //             return console.error('Произошла ошибка с получением данных из облака: ', err)
        //         }
        //
        //         return value
        //     })
        // }

        return this.storage.getItem(key)
    }
}

export default function useStorage() {
    return {
        storage: new CloudStorage()
    }
}
