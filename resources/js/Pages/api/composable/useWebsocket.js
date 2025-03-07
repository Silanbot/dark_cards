import {Centrifuge} from "centrifuge";

const isDev = import.meta.env.MODE === 'development';

export default function useWebsocket(token, subscription) {
    const endpoint = isDev ? "ws://127.0.0.1:8888/connection/websocket" : `wss://${window.location.host}/connection/websocket`
    const centrifugo = new Centrifuge(endpoint, { token })
    let listeners = []

    return {
        $websocket: () => centrifugo,
        onConnected: callback => centrifugo.on('connected', callback),
        runListening: sub => {
            sub.on('publication', ({ data }) => {
                const listener = listeners.find(listener => listener.event === data.event);
                if (listener) {
                    listener.handler(data);
                }
            }).subscribe();
        },
        newSubscription: channel => centrifugo.newSubscription(channel),
        addListener: listener => listeners.push(listener),
        connect: connect,
        disconnect: disconnect // Можно вызвать отдельно, если нужно вручную отключить
    };
}
