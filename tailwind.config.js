/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            keyframes: {
                balance: {
                    "0%": { transform: "rotate(-3deg)" },
                    "50%": { transform: "rotate(3deg)" },
                    "100%": { transform: "rotate(-3deg)" },
                },
            },
            animation: {
                balance: "balance 1s infinite",
            },
            fontFamily: {
                inter: ["Inter", "sans-serif"],
                outfit: ["Outfit", "sans-serif"],
            },
            fontSize: {
                text8: "8px",
                text9: "9px",
                text10: "10px",
                text12: "12px",
                text13: "13px",
                text14: "14px",
                text15: "15px",
                text16: "16px",
                text18: "18px",
                text20: "20px",
                text22: "22px",
                text24: "24px",
                text28: "28px",
                text30: "30px",
                text32: "32px",
                text36: "36px",
                text40: "40px",
                text44: "44px",
                text48: "48px",
                text52: "52px",
                text56: "56px",
                text60: "60px",
                text64: "64px",
                text68: "68px",
                text72: "72px",
                text76: "76px",
                text80: "80px",
                text84: "84px",
            },
            backgroundImage: {
                "select-arrow":
                    'url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTExLjk5OTcgMTMuMTcxNEwxNi45NDk1IDguMjIxNjhMMTguMzYzNyA5LjYzNTg5TDExLjk5OTcgMTUuOTk5OUw1LjYzNTc0IDkuNjM1ODlMNy4wNDk5NiA4LjIyMTY4TDExLjk5OTcgMTMuMTcxNFoiIGZpbGw9InJnYmEoMTU2LDE2MywxNzUsMSkiPjwvcGF0aD48L3N2Zz4=")',
            },
            screens: {
                xs: "320px",
                "2xs": "370px",
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1280px",
                "2xl": "1536px",
            },
        },
    },
    plugins: [require("tailwind-scrollbar")],
};
