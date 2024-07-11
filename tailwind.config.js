/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                inter: ["Inter", "sans-serif"],
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
    plugins: [],
};
