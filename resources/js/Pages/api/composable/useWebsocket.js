import {Centrifuge} from "centrifuge";


export default function useWebsocket(token, subscription) {
    const endpoint = `wss://${window.location.host}/connection/websocket`
    const centrifugo = new Centrifuge(endpoint, { token })
    let listeners = []

    return {
        $websocket: centrifugo,
        onConnected: callback => centrifugo.on('connected', callback),
        runListening: () => {
            centrifugo.getSubscription(subscription).on('publication', ({ context }) => {
                listeners.find(listener => listener.event === context.event).handler(context.data)
            }).subscribe()

            centrifugo.connect()
        },
        addListener: listener => listeners.push(listener),
        subscribe: channel => centrifugo.newSubscription(channel),
    }
}
