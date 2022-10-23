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
                    500: '#026232'
                },
            }
        },
    },
    plugins: [],
}
