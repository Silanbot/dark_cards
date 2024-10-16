import { Centrifuge } from "centrifuge";

export default function useWebsocket(token, subscription) {
    const endpoint = `wss://${window.location.host}/connection/websocket`
    let centrifugo = null;
    let listeners = [];

    const disconnect = () => {
        if (centrifugo) {
            centrifugo.disconnect();
            centrifugo = null; // Убеждаемся, что старое подключение удалено
        }
    };

    const connect = () => {
        disconnect(); // Отключаем старое подключение, если оно есть
        centrifugo = new Centrifuge(endpoint, { token });
        centrifugo.connect();
    };

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
