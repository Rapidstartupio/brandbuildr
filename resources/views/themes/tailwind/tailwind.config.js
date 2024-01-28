module.exports = {
    darkMode: "class",
    content: [
        "./**/*.php",
        "./*.php",
        "./assets/**/*.scss",
        "./assets/**/*.js",
        "./node_modules/flowbite/**/*.js",
        "./assets/js/components/*.vue",
        "./assets/js/components/**/*.vue",
    ],
    theme: {
        extend: {
            rotate: {
                "-1": "-1deg",
                "-2": "-2deg",
                "-3": "-3deg",
                1: "1",
                2: "2deg",
                3: "3deg",
            },
            borderRadius: {
                xl: "0.8rem",
                xxl: "1rem",
            },
            height: {
                "1/2": "0.125rem",
                "2/3": "0.1875rem",
            },
            maxHeight: {
                16: "16rem",
                20: "20rem",
                24: "24rem",
                32: "32rem",
            },
            inset: {
                "1/2": "50%",
            },
            width: {
                96: "24rem",
                104: "26rem",
                128: "32rem",
            },
            transitionDelay: {
                450: "450ms",
            },
            colors: {
                wave: {
                    50: "var(--color-wave-50-400)",
                    100: "var(--color-wave-50-400)",
                    200: "var(--color-wave-50-400)",
                    300: "var(--color-wave-50-400)",
                    400: "var(--color-wave-50-400)",
                    500: "var(--color-wave-500-600)",
                    600: "var(--color-wave-500-600)",
                    700: "var(--color-wave-700-800)",
                    800: "var(--color-wave-700-800)",
                    850: "var(--color-wave-850)",
                    900: "var(--color-wave-900)",
                },
                brand: {
                    500: "var(--color-brand-500)",
                    600: "var(--color-brand-600)",
                    700: "var(--color-brand-700)",
                    750: "var(--color-brand-750)",
                    800: "var(--color-brand-800)",
                    900: "var(--color-brand-900)",
                    950: "var(--color-brand-950)",
                },
                card:{
                    'completed':'var(--color-card-completed)',
                },
                gradient:{
                    from:"var(--color-brand-gradient-from)",
                    via:"var(--color-brand-gradient-via)",
                    to:"var(--color-brand-gradient-to)",
                },
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("flowbite/plugin"),
    ],
};
