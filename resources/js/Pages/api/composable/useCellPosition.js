export default function useCellPosition() {
    const [x ,y] = [window.innerWidth / 2, window.innerHeight / 2];

    return [
        [
            x * 0.6,
            y * 0.9,
        ],
        [
            x,
            y * 0.9,
        ],
        [
            x * 1.4,
            y * 0.9,
        ],
        [
            x * 0.8,
            y * 1.14,
        ],
        [
            x * 1.2,
            y * 1.14
        ]
    ];
}
