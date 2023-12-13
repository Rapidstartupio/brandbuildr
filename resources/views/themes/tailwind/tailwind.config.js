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
                    50: "#E9F6FF",
                    100: "#E9F6FF",
                    200: "#E9F6FF",
                    300: "#E9F6FF",
                    400: "#E9F6FF",
                    500: "#570AFF",
                    600: "#570AFF",
                    700: "#4E09E6",
                    800: "#4E09E6",
                    900: "#04041B",
                },
                brand: {
                    500: "#1A134B",
                    600: "#4d4d68",
                    700: "#393957",
                    800: "#202043",
                    900: "#07072D",
                },
                card:{
                    'completed':'#271B5D',
                }
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("flowbite/plugin"),
    ],
};
