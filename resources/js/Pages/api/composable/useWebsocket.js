import {Centrifuge} from "centrifuge";


export default function useWebsocket(token, subscription) {
    const endpoint = `wss://${window.location.host}/connection/websocket`
    const centrifugo = new Centrifuge(endpoint, { token })
    let listeners = []

    return {
        $websocket: centrifugo,
        onConnected: callback => centrifugo.on('connected', callback),
        runListening: sub => {
            sub.on('publication', context => {
                console.log(context)
                // listeners.find(listener => listener.event === context.event).handler(context)
            }).subscribe()
        },
        newSubscription: channel => centrifugo.newSubscription(channel),
        addListener: listener => listeners.push(listener),
        connect: () => centrifugo.connect()
    }
}
