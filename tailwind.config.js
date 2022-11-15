/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'greenIndigo': {
                    DEFAULT: '#19b05d',
                    100: '#10b05d',
                    200: '#07783d',
                    300: '#04562c',
                    400: '#096839',
                    500: '#026232'
                },
                'green' : {
                    DEFAULT: '#1aab5c'
                },
                'purple': {
                    DEFAULT: '#9f0cd5',
                    200: '#850eb1',
                    300: '#660f87',
                },
            }
        },
    },
    plugins: [
    ],
}
